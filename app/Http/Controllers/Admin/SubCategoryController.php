<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;





class SubCategoryController extends Controller
{
  public function list()
  {
    $data['getRecord'] = SubCategoryModel::getRecord();
    $data['header_title'] = 'Підкатегорії';
    return view('admin.subcategory.list', $data);
  }

  ////////////////////////////////////////////////////////
  // Add SubCategory
  public function add()
  {
    $data['getCategory'] = CategoryModel::getRecord();
    $data['header_title'] = 'Додати нову підкатегорію';
    return view('admin.subcategory.add', $data);
  }

  ////////////////////////////////////////////////////////
  // Insert Category
  public function insert(Request $request)
  {

    request()->validate([
      'slug' => 'required|unique:sub_category',
      'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1

    ]);
    $sub_category = new SubCategoryModel;
    $sub_category->category_id = trim($request->category_id);
    $sub_category->name = trim($request->name);
    $sub_category->slug = trim($request->slug);
    $sub_category->status =(int)$request->status;
    $sub_category->meta_title = trim($request->meta_title);
    $sub_category->meta_description = trim($request->meta_description);
    $sub_category->meta_keywords = trim($request->meta_keywords);
    $sub_category->created_by = Auth::user()->id;
    $sub_category->save();

    return redirect('admin/sub_category/list')->with('success', 'Підатегорія успішно створена!');
  }

  public function edit($id)
  {
    $data['getCategory'] = CategoryModel::getRecord();
    $data['getRecord'] = SubCategoryModel::getSingle($id);
    $data['header_title'] = 'Редагувати підкатегорію';
    return view('admin.subcategory.edit', $data);
  }
  ///////////////////////////////////////////////////////
  // Update SubCategory
  public function update(Request $request, $id)
  {
    request()->validate([
      'slug' => 'required|unique:sub_category,slug,' . $id,
      'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1


    ]);
    $sub_category = SubCategoryModel::getSingle($id);
    $sub_category->category_id = trim($request->category_id);
    $sub_category->name = trim($request->name);
    $sub_category->slug = trim($request->slug);
    $sub_category->status = (int)$request->status;
    $sub_category->meta_title = trim($request->meta_title);
    $sub_category->meta_description = trim($request->meta_description);
    $sub_category->meta_keywords = trim($request->meta_keywords);
    $sub_category->save();

    return redirect('admin/sub_category/list')->with('success', 'Підкатегорія успішно оновлена!');
  }

  /////////////////////////////////////////////
  // Delete SubCategory
  public function delete($id)
  {
    $category = SubCategoryModel::getSingle($id);
    $category->is_delete = 1;
    $category->save();

    return redirect()->back()->with('success', 'Підкатегорія успішно видалена!');
  }

  public function get_sub_category(Request $request)
  {
    $category_id =$request->id;
    $get_sub_category = SubCategoryModel::getRecordSubCategory($category_id);
    $html = '';
    $html .= '<option value="">Select</option>';
    foreach ($get_sub_category as $value)
    {
      $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
    }
      $json['html'] = $html;
      echo json_encode($json);
  }
}
    