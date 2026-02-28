<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    // List color
   public function list()
   {
    $data['getRecord'] = ColorModel::getRecord();
    $data['header_title'] = 'Колір';
    return view('admin.color.list', $data);
   }

////////////////////////////////////////////////////////
// Add color
public function add()
{
  $data['header_title'] = 'Додати новий колір';
  return view('admin.color.add', $data);
}
////////////////////////////////////////////////////////
// Insert color
public function insert(Request $request)
{

  $color = new ColorModel;
  $color->name = trim($request->name);
  $color->code = trim($request->code);
  $color->status = trim($request->status);
  $color->created_by = Auth::user()->id;
  $color->save();

  return redirect('admin/color/list')->with('success', 'Колір успішно створено!');
}
////////////////////////////////////////////////////////
// Edit Category
public function edit($id)
{
  $data['getRecord'] = ColorModel::getSingle($id);
  $data['header_title'] = 'Редагувати Колір';
  return view('admin.color.edit', $data);
}
////////////////////////////////////////////////////////
// Update Category
public function update(Request $request, $id){

  $request->validate([
   
    'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1
]);
    $color = ColorModel::getSingle($id);
    $color->name = trim($request->name);
    $color->code = trim($request->code);
    $color->status = (int)$request->status;
    $color->created_by = Auth::user()->id;
    $color->save();

    return redirect('admin/color/list')->with('success', 'Колір успішно оновлено!');
  }
////////////////////////////////////////////////////////
  // Delete Category
  public function delete($id)
  {
     $category = ColorModel::getSingle($id);
     $category->is_delete = 0;
     $category->save();

     return redirect()->back()->with('success', 'Колір успішно видалений!');
  }
}
