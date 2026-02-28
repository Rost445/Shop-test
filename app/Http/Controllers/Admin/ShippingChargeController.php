<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingChargeModel;


class ShippingChargeController extends Controller
{
    // List shippingcharge
    public function list()
    {
        $data['getRecord'] = ShippingChargeModel::getRecord();
        $data['header_title'] = 'Доставка';
        return view('admin.shippingcharge.list', $data);
    }

    ////////////////////////////////////////////////////////
    // Add shippingcharge
    public function add()
    {
        $data['header_title'] = 'Додати доставку';
        return view('admin.shippingcharge.add', $data);
    }
    ////////////////////////////////////////////////////////
    // Insert shippingcharge
    public function insert(Request $request)
    {

        $Shippingcharge = new ShippingChargeModel;
        $Shippingcharge->name = trim($request->name);
        $Shippingcharge->price = trim($request->price);
        $Shippingcharge->status = trim($request->status);

        $Shippingcharge->save();

        return redirect('admin/shipping_charge/list')->with('success', 'Доставку успішно створено!');
    }
    ////////////////////////////////////////////////////////
    // Edit Category
    public function edit($id)
    {
        $data['getRecord'] = ShippingChargeModel::getSingle($id);
        $data['header_title'] = 'Редагувати доставку';
        return view('admin.shippingcharge.edit', $data);
    }
    ////////////////////////////////////////////////////////
    // Update Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1
        ]);

        $shippingcharge = ShippingChargeModel::getSingle($id);
        $shippingcharge->name = trim($request->name);
        $shippingcharge->price = trim($request->price);
        $shippingcharge->status = (int)$request->status;
        $shippingcharge->save();

        return redirect('admin/shipping_charge/list')->with('success', 'Доставку успішно оновлено!');
    }
    ////////////////////////////////////////////////////////
    // Delete Category
    public function delete($id)
    {
        $shippingcharge = ShippingChargeModel::getSingle($id);
        $shippingcharge->is_delete = 1;
        $shippingcharge->save();

        return redirect()->back()->with('success', 'Доставку успішно видалено!');
    }
}
