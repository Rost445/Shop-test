<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
   // List Brand
   public function list()
   {
    $data['getRecord'] = BrandModel::getRecord();
    $data['header_title'] = 'Бренд';
    return view('admin.brand.list', $data);
   }

////////////////////////////////////////////////////////
// Add Brand
public function add()
{

  $data['header_title'] = 'Додати новий бренд';
  return view('admin.brand.add', $data);
}
////////////////////////////////////////////////////////
// Insert Brand
public function insert(Request $request)
{

  request()->validate([
    'slug' => 'required|unique:brand'

  ]);
  $brand = new BrandModel;
  $brand->name = trim($request->name);
  $brand->slug = trim($request->slug);
  $brand->status = trim($request->status);
  $brand->meta_title = trim($request->meta_title);
  
  $brand->meta_description = trim($request->meta_description);
  $brand->meta_keywords = trim($request->meta_keywords);
  $brand->created_by = Auth::user()->id;
  $brand->save();

  return redirect('admin/brand/list')->with('success', 'Бренд успішно створено!');
}
////////////////////////////////////////////////////////
// Edit Category
public function edit($id)
{
  $data['getRecord'] = BrandModel::getSingle($id);
  $data['header_title'] = 'Редагувати бренд';
  return view('admin.brand.edit', $data);
}
////////////////////////////////////////////////////////
// Update Category
public function update(Request $request, $id){

    request()->validate([
      'slug' => 'required|unique:brand,slug,'.$id,
      'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1

    ]);
    $brand = BrandModel::getSingle($id);
    $brand->name = trim($request->name);
    $brand->slug = trim($request->slug);
    $brand->status = trim($request->status);
    $brand->meta_title = trim($request->meta_title);
    $brand->meta_description = trim($request->meta_description);
    //$category->meta_description = Str::limit($request->meta_description,10);
    $brand->meta_keywords = trim($request->meta_keywords);
    //$category->meta_keywords = Str::limit($request->meta_keywords,10);
    $brand->created_by = Auth::user()->id;
    $brand->save();

    return redirect('admin/brand/list')->with('success', 'Бренд успішно оновлено!');
  }
////////////////////////////////////////////////////////
  // Delete Category
  public function delete($id)
  {
     $brand = BrandModel::getSingle($id);
     $brand->is_delete = 1;
     $brand->save();

     return redirect()->back()->with('success', 'Бренд успішно видалений!');
  }
}
