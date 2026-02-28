<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCodeModel;


class DiscountCodeController extends Controller
{
    // List DiscountCode
   public function list()
   {
    $data['getRecord'] = DiscountCodeModel::getRecord();
    $data['header_title'] = 'Знижки';
    return view('admin.discountcode.list', $data);
   }

////////////////////////////////////////////////////////
// Add DiscountCode
public function add()
{
  $data['header_title'] = 'Додати знижку';
  return view('admin.discountcode.add', $data);
}
////////////////////////////////////////////////////////
// Insert DiscountCode
public function insert(Request $request)
{

  $DiscountCode = new DiscountCodeModel;
  $DiscountCode->name = trim($request->name);
  $DiscountCode->type = trim($request->type);
  $DiscountCode->percent_amount = trim($request->percent_amount);
  $DiscountCode->expire_date = trim($request->expire_date);
  $DiscountCode->status = trim($request->status);

  $DiscountCode->save();

  return redirect('admin/discount_code/list')->with('success', 'Знижка успішно створена!');
}
////////////////////////////////////////////////////////
// Edit Category
public function edit($id)
{
  $data['getRecord'] = DiscountCodeModel::getSingle($id);
  $data['header_title'] = 'Редагувати Знижку';
  return view('admin.discountcode.edit', $data);
}
////////////////////////////////////////////////////////
// Update Category
public function update(Request $request, $id){
  $request->validate([
    'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1
]);

    $DiscountCode = DiscountCodeModel::getSingle($id);
    $DiscountCode->name = trim($request->name);
    $DiscountCode->type = trim($request->type);
    $DiscountCode->percent_amount = trim($request->percent_amount);
    $DiscountCode->expire_date = trim($request->expire_date);
    $DiscountCode->status = (int)$request->status;
    $DiscountCode->save();

    return redirect('admin/discount_code/list')->with('success', 'Знижку успішно оновлено!');
  }
////////////////////////////////////////////////////////
  // Delete Category
  public function delete($id)
  {
     $category = DiscountCodeModel::getSingle($id);
     $category->is_delete = 1;
     $category->save();

     return redirect()->back()->with('success', 'Знижка успішно видалена!');
  }
}
