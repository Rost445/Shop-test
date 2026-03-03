<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\DiscountCodeModel;
use App\Models\ShippingChargeModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ColorModel;
use App\Models\NotificationModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Cart;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;



class PaymentController extends Controller
{

    public function apply_discount_code(Request $request)
    {
        $getDiscount = DiscountCodeModel::CheckDiscount($request->discount_code);
        if (!empty($getDiscount)) {

            $total = Cart::getSubTotal();
            if ($getDiscount->type == 'Сума') {
                $discount_amount = $getDiscount->percent_amount;
                $payable_total = $total - $getDiscount->percent_amount;
            } else {
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total =  $total - $discount_amount;
            }
            $json['status'] = true;
            $json['discount_amount'] =  number_format($discount_amount, 2);
            $json['payable_total'] =  $payable_total;
            $json['message'] = "Код знижки прийнято";
        } else {
            $json['status'] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] =  Cart::getSubTotal();
            $json['message'] = "Невірний код знижки";
        }

        echo json_encode($json);
    }

    public function checkout(Request $request)
    {
        $data['meta_title'] = 'Оплата';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';
        $data['getShipping'] = ShippingChargeModel::getRecordActive();
        return view('payment.checkout', $data);
    }


    public function cart(Request $request)
    {
        $data['meta_title'] = 'Кошик ';
        $data['meta_keywords'] = '';
        $data['meta_description'] = '';

        return view('payment.cart', $data);
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function add_to_cart(Request $request)
    {
        $getProduct = ProductModel::getSingle($request->product_id);

        $total = $getProduct->price;

        // SIZE
        $size_id = 0;
        $size_name = '';
        $size_price = 0;

        if (!empty($request->size_id)) {
            $size = ProductSizeModel::getSingle($request->size_id);
            if ($size) {
                $size_id = $size->id;
                $size_name = $size->name;
                $size_price = !empty($size->price) ? $size->price : 0;
                $total += $size_price;
            }
        }

        // COLOR
        $color_id = 0;
        $color_name = '';

        if (!empty($request->color_id)) {
            $color = ColorModel::getSingle($request->color_id);
            if ($color) {
                $color_id = $color->id;
                $color_name = $color->name;
            }
        }

        // 🔥 УНІКАЛЬНИЙ ID ДЛЯ КОМБІНАЦІЇ
        $cart_id = $getProduct->id . '_' . $size_id . '_' . $color_id;

        Cart::add([
            'id' => $cart_id, // <-- ГОЛОВНА ЗМІНА
            'name' => $getProduct->title,
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => [
                'product_id' => $getProduct->id,
                'size_id' => $size_id,
                'size_name' => $size_name,
                'size_price' => $size_price,
                'color_id' => $color_id,
                'color_name' => $color_name,
            ]
        ]);

        return redirect()->back()->with('success', "Товар успішно додано до кошика!");
    }


    public function update_cart(Request $request)
    {

        foreach ($request->cart as $cart) {
            Cart::update($cart['id'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $cart['qty']
                ),
            ));
        }
        return redirect()->back();
    }

    public function place_order(Request $request)
    {
        $validate = 0;
        $message = '';
       if (Auth::check()) {
            $user_id = Auth::user()->id;
        } else {
            if (!empty($request->is_create)) {
                $checkEmail = User::checkEmail($request->email);
                if (!empty($checkEmail)) {
                    $message = "Така ел. адреса вже існує. Будь ласка введіть іншу.";
                    $validate = 1;
                } else {
                    $save = new User;
                    $save->name = trim($request->first_name);
                    $save->email = trim($request->email);
                    $save->password = Hash::make($request->password);
                    $save->save();

                    Auth::login($save);

                    try {
                        Mail::to($save->email)
                        ->bcc('e-mail@fts.ua')
                        ->send(new RegisterMail($save));
                        sleep(3);

                    } catch (\Exception $e) {
                    }

                    $user_id = $save->id;
                    $json['status'] = true;
                    $json['message'] = "Ваш акаунт створено успішно! Лист з активацією вислано на вказану вами електронну адресу.";
                }
            } else {
                $user_id = '';
            }
        }


        if (empty($validate)) {
            $getShipping = ShippingChargeModel::getSingle($request->shipping);
            $payable_total = Cart::getSubTotal();
            $discount_amount = 0;
            $discount_code = '';

            if (!empty($request->discount_code)) {

                $getDiscount = DiscountCodeModel::CheckDiscount($request->discount_code);
                if (!empty($getDiscount)) {
                    $discount_code = $request->discount_code;
                    if ($getDiscount->type == 'Сума') {
                        $discount_amount = $getDiscount->percent_amount;
                        $payable_total = $payable_total - $getDiscount->percent_amount;
                    } else {
                        $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                        $payable_total =  $payable_total - $discount_amount;
                    }
                }
            }


            $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
            $total_amount = $payable_total + $shipping_amount;

            $order = new OrderModel;
            if (!empty($user_id)) {
                $order->user_id = trim($user_id);
            }
            $order->order_number = mt_rand(100000000, 999999999);
            $order->first_name = trim($request->first_name);
            $order->last_name = trim($request->last_name);
            $order->company_name = trim($request->company_name);
            $order->phone = trim($request->phone);
            $order->email = trim($request->email);
            $order->delivery_address = trim($request->delivery_address);
            $order->note = trim($request->notes);
            $order->discount_amount = trim($discount_amount);
            $order->discount_code = $discount_code;
            $order->shipping_id = $request->shipping;
            $order->shipping_amount = $shipping_amount;
            $order->total_amount = $total_amount;
            $order->payment_method = $request->payment_method;
            $order->save();

            foreach (Cart::getContent() as $key => $cart) {

                $order_item = new OrderItemModel;
                $order_item->order_id = $order->id;
             
                $order_item->product_id = $cart->attributes->product_id;
                $order_item->quantity = $cart->quantity;
                $order_item->price = $cart->price;

                $color_id = $cart->attributes->color_id;


                if (!empty($color_id)) {
                    $getColor = ColorModel::getSingle($color_id);
                    $order_item->color_name = $getColor->name;
                }

                $size_id = $cart->attributes->size_id;


                if (!empty($size_id)) {
                    $getSize = ProductSizeModel::getSingle($size_id);
                    $order_item->size_name = $getSize->name;
                    $order_item->size_amount = $getSize->price;
                }

                $order_item->total_price = $cart->price * $cart->quantity;
                $order_item->save();
            }

            $json['status'] = true;
            $json['message'] = "success";
            $json['redirect'] = url('checkout/payment?order_id=' . base64_encode($order->id));
        } else {
            $json['status'] = false;
            $json['message'] = $message;
        }
        echo json_encode($json);
    }

   public function checkout_payment(Request $request)
{
    
    if (!empty($request->order_id)) {

        $order_id = base64_decode($request->order_id);
        $getOrder = OrderModel::getSingle($order_id);

        if (!empty($getOrder)) {

            if ($getOrder->payment_method) {

                $getOrder->is_payment = 1;
                $getOrder->save();
try {
    Mail::to($getOrder->email)
       ->bcc('e-mail@fts.ua')
    ->send(new OrderInvoiceMail($getOrder));
} catch (\Exception $e) {
    dd($e->getMessage());
}
                $user_id = 1;
                $url = url('admin/orders/detail/' . $getOrder->id);
                $message = "Нове замовлення №" . $getOrder->order_number;

                NotificationModel::insertRecord($user_id, $message, $url);

                Cart::clear();

                return redirect('cart')->with('success', "Замовлення успішно оформлено");
            }
        }
    }

    abort(404);
}
}
