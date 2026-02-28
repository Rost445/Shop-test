<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class CategoryController extends Controller
{

  // List Category
  public function list()
  {
    $data['getRecord'] = CategoryModel::getRecord();
    $data['header_title'] = 'Категорії';
    return view('admin.category.list', $data);
  }
  ////////////////////////////////////////////////////////
  // Add Category
  public function add()
  {

    $data['header_title'] = 'Додати нову категорію';
    return view('admin.category.add', $data);
  }
  ////////////////////////////////////////////////////////
  // Insert Category
  public function insert(Request $request)
  {

    request()->validate([
      'slug' => 'required|unique:category'

    ]);
    $category = new CategoryModel;
    $category->name = trim($request->name);
    $category->slug = trim($request->slug);
    $category->status = trim($request->status);
    $category->meta_title = trim($request->meta_title);

    $category->meta_description = trim($request->meta_description);
    $category->meta_keywords = trim($request->meta_keywords);
    $category->created_by = Auth::user()->id;
    $category->button_name = trim($request->button_name);
    $category->is_home = !empty($request->is_home) ? 1 : 0;
    $category->is_menu = !empty($request->is_menu) ? 1 : 0;

    if (!empty($request->file('image_name'))) {
      $file = $request->file('image_name');
      $ext = $file->getClientOriginalExtension();
      $randomStr = Str::random(20);
      $filename = strtolower($randomStr) . '.' . $ext;
      $file->move('upload/category/', $filename);
      $category->image_name = trim($filename);
    }
    $category->save();

    return redirect('admin/category/list')->with('success', 'Категорія успішно створена!');
  }
  ////////////////////////////////////////////////////////
  // Edit Category
  public function edit($id)
  {
    $data['getRecord'] = CategoryModel::getSingle($id);
    $data['header_title'] = 'Редагувати категорію';
    return view('admin.category.edit', $data);
  }
  ////////////////////////////////////////////////////////
  // Update Category
  public function update(Request $request, $id)
  {

    request()->validate([
      'slug' => "required|unique:category,slug,{$id}",
      'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1

    ]);
    $category = CategoryModel::getSingle($id);
    $category->name = trim($request->name);
    $category->slug = trim($request->slug);
    $category->status = (int)$request->status;
    $category->meta_title = trim($request->meta_title);
    $category->meta_description = trim($request->meta_description);
    $category->meta_keywords = trim($request->meta_keywords);


    $category->button_name = trim($request->button_name);
    $category->is_home = !empty($request->is_home) ? 1 : 0;
    $category->is_menu = !empty($request->is_menu) ? 1 : 0;

    if (!empty($request->file('image_name'))) {
      $file = $request->file('image_name');
      $ext = $file->getClientOriginalExtension();
      $randomStr = Str::random(20);
      $filename = strtolower($randomStr) . '.' . $ext;
      $file->move('upload/category/', $filename);
      $category->image_name = trim($filename);
    }

    $category->created_by = Auth::user()->id;
    $category->save();

    return redirect('admin/category/list')->with('success', 'Категорія успішно оновлена!');
  }
  /////////////////////////////////////////////
  // Delete Category
  public function delete($id)
  {
    $category = CategoryModel::getSingle($id);
    $category->is_delete = 1;
    $category->save();

    return redirect()->back()->with('success', 'Категорія успішно видалена!');
  }
}
