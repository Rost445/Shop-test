<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\BlogCategoryModel;




class BlogCategoryController extends Controller
{

  // List Category
  public function list()
  {
    $data['getRecord'] = BlogCategoryModel::getRecord();
    $data['header_title'] = 'Категорії блогу';
    return view('admin.blog_category.list', $data);
  }
  ////////////////////////////////////////////////////////
  // Add Category
  public function add()
  {

    $data['header_title'] = 'Додати нову категорію блогу';
    return view('admin.blog_category.add', $data);
  }
  ////////////////////////////////////////////////////////
  // Insert Category
  public function insert(Request $request)
  {

    request()->validate([
      'slug' => 'required|unique:category'

    ]);
   $blog_category = new BlogCategoryModel;
   $blog_category->name = trim($request->name);
   $blog_category->slug = trim($request->slug);
   $blog_category->status = trim($request->status);
   $blog_category->meta_title = trim($request->meta_title);

   $blog_category->meta_description = trim($request->meta_description);
   $blog_category->meta_keywords = trim($request->meta_keywords);
   $blog_category->save();

    return redirect('admin/blog_category/list')->with('success', 'Категорія блогу успішно створена!');
  }
  ////////////////////////////////////////////////////////
  // Edit Category
  public function edit($id)
  {
    $data['getRecord'] = BlogCategoryModel::getSingle($id);
    $data['header_title'] = 'Редагувати категорію';
    return view('admin.blog_category.edit', $data);
  }
  ////////////////////////////////////////////////////////
  // Update Category
  public function update(Request $request, $id)
  {
      // Валидация входных данных
      $request->validate([
          'slug' => "required|unique:blog_category,slug,{$id}",
          'status' => 'required|in:0,1',  // Убедитесь, что статус - это либо 0, либо 1
      ]);
  
      // Получаем модель категории блога по ID
      $blog_category = BlogCategoryModel::find($id);
  
      // Если категория не найдена, можно вернуть ошибку
      if (!$blog_category) {
          return redirect()->back()->with('error', 'Категорія не знайдена!');
      }
  
      // Обновление данных категории блога
      $blog_category->name = trim($request->name);
      $blog_category->slug = trim($request->slug);
      $blog_category->status = (int) $request->status; // Приводим к числу
      $blog_category->meta_title = trim($request->meta_title);
      $blog_category->meta_description = trim($request->meta_description);
      $blog_category->meta_keywords = trim($request->meta_keywords);
  
      // Сохраняем изменения в базе данных
      $blog_category->save();
  
      // Перенаправление с сообщением об успешном обновлении
      return redirect('admin/blog_category/list')->with('success', 'Категорія блогу успішно оновлена!');
  }
  
  /////////////////////////////////////////////
  // Delete Category
  public function delete($id)
  {
   $blog_category = BlogCategoryModel::getSingle($id);
   $blog_category->is_delete = 1;
   $blog_category->save();

    return redirect()->back()->with('success', 'Категорія блогу успішно видалена!');
  }
}
