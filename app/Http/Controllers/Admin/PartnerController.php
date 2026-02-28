<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerModel;
use Illuminate\Support\Str;


class PartnerController extends Controller
{
    // List partner
    public function list()
    {
        $data['getRecord'] = PartnerModel::getRecord();
        $data['header_title'] = 'Логотипи ';
        return view('admin.partner.list', $data);
    }

    ////////////////////////////////////////////////////////
    // Add partner
    public function add()
    {
        $data['header_title'] = 'Додати лого';
        return view('admin.partner.add', $data);
    }
    ////////////////////////////////////////////////////////
    // Insert partner
    public function insert(Request $request)
    {

        $partner = new PartnerModel;

        $partner->button_link = trim($request->button_link);

        $file = $request->file('image_name');

        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/partner/', $filename);

        $partner->image_name = trim($filename);
        $partner->status = trim($request->status);

        $partner->save();

        return redirect('admin/partner/list')->with('success', 'Лого успішно додано!');
    }
    ////////////////////////////////////////////////////////
    // Edit Category
    public function edit($id)
    {
        $data['getRecord'] = PartnerModel::getSingle($id);
        $data['header_title'] = 'Редагувати логотип';
        return view('admin.partner.edit', $data);
    }
    ////////////////////////////////////////////////////////
    // Update Category
    public function update(Request $request, $id)
    {
        request()->validate([
            'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1
          ]);

        $partner = PartnerModel::getSingle($id);
        $partner->button_link = trim($request->button_link);
        if (!empty($request->file('image_name'))) {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/partner/', $filename);
            $partner->image_name = trim($filename);
        }
        $partner->status = (int)$request->status;
        $partner->save();


        return redirect('admin/partner/list')->with('success', 'Лого успішно оновлено!');
    }
    ////////////////////////////////////////////////////////
    // Delete Category
    public function delete($id)
    {
        $partner = PartnerModel::getSingle($id);
        $partner->is_delete = 1;
        $partner->save();

        return redirect()->back()->with('success', 'Лого успішно видалено!');
    }
}
