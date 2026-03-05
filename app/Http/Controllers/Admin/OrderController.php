<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\NotificationModel;
use \Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;

class OrderController extends Controller
{
    public function list()
    {
        $data['getRecord'] = OrderModel::getRecord();
        $data['header_title'] = 'Замовлення';
        return view('admin.order.list', $data);
    }

    public function order_detail($id, Request $request)
    {
        if (!empty($request->noti_id)) {
            NotificationModel::updateReadNoti($request->noti_id);
        }
        $data['getRecord'] = OrderModel::getSingle($id);
        $data['header_title'] = 'Деталі замовлення';
        return view('admin.order.detail', $data);
    }

   public function order_status(Request $request)
{
    $getOrder = OrderModel::getSingle($request->order_id);
    $getOrder->status = $request->status;
    $getOrder->save();

    $message = "Замовлення №".$getOrder->order_number."<br> Статус оновлено";

    /* користувач */
    if(!empty($getOrder->user_id)){
        NotificationModel::insertRecord(
            $getOrder->user_id,
            $message,
            url('user/orders')
        );
    }

    /* адмін */
    NotificationModel::insertRecord(
        1,
        $message,
        url('admin/orders/detail/'.$getOrder->id)
    );

    try {
        Mail::to($getOrder->email)
            ->bcc('e-mail@fts.ua')
            ->send(new OrderStatusMail($getOrder));
    } catch (\Exception $e) {}

    return response()->json([
        'message' => "Статус успішно оновлено!"
    ]);
}
}
