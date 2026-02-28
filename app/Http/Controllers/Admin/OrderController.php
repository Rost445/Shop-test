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

        $user_id =  1;
        $url = url('user/orders');
        $message = "Замовлення №" . $getOrder->order_number . "<br> Статус оновлено";
        NotificationModel::insertRecord($user_id, $message, $url);

        try {
            Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));
        } catch (\Exception $e) {
        }

        $json['message'] = "Статус успішно оновлено!";
        echo json_encode($json);
    }
}
