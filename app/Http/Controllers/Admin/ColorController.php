<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{

    // список
    public function list()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = 'Колір';

        return view('admin.color.list',$data);
    }

    // форма додавання
    public function add()
    {
        $data['header_title'] = 'Додати новий колір';

        return view('admin.color.add',$data);
    }

    // створення
    public function insert(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        ColorModel::create([
            'name' => trim($request->name),
            'code' => trim($request->code),
            'status' => $request->status,
            'created_by' => Auth::id(),
            'is_delete' => 0
        ]);

        return redirect('admin/color/list')->with('success','Колір успішно створено!');
    }

    // редагування
    public function edit($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        $data['header_title'] = 'Редагувати колір';

        return view('admin.color.edit',$data);
    }

    // оновлення
    public function update(Request $request,$id)
    {

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:0,1'
        ]);

        $color = ColorModel::getSingle($id);

        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = $request->status;

        $color->save();

        return redirect('admin/color/list')->with('success','Колір успішно оновлено!');
    }

    // видалення
    public function delete($id)
    {
        $color = ColorModel::getSingle($id);

        if($color)
        {
            $color->is_delete = 1;
            $color->save();
        }

        return redirect()->back()->with('success','Колір успішно видалений!');
    }

}