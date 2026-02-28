<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\BlogModel;
use  App\Models\BlogCategoryModel;
use Illuminate\Support\Str;





class BlogController extends Controller
{

  // List Blog
  public function list()
  {
    $data['getRecord'] = BlogModel::getRecord();
    $data['header_title'] = 'Блог';
    return view('admin.blog.list', $data);
  }
  ////////////////////////////////////////////////////////
  // Add Blog
  public function add()
  {
    $data['getCategory'] = BlogCategoryModel::getRecordActive();
    $data['header_title'] = 'Додати блог';
    return view('admin.blog.add', $data);
  }
  ////////////////////////////////////////////////////////
  // Insert Blog
  public function insert(Request $request)
  {

    $blog = new BlogModel;
 
    $blog->title = trim($request->title);
    $blog->blog_category_id =(int)$request->blog_category_id;
    $blog->short_description = trim($request->short_description);
    $blog->description = trim($request->description);
    $blog->status = trim($request->status);
    $blog->meta_title = trim($request->meta_title);
    $blog->meta_description = trim($request->meta_description);
    $blog->meta_keywords = trim($request->meta_keywords);
  
    $blog->save();


    if (!empty($request->file('image_name'))) {
      $file = $request->file('image_name');
      $ext = $file->getClientOriginalExtension();
      $randomStr = Str::random(20);
      $filename = strtolower($randomStr) . '.' . $ext;
      $file->move('upload/blog/', $filename);
      $blog->image_name = trim($filename);
    }
    $slug = Str::slug($request->title);
    $count =  BlogModel::where('slug', '=', $slug)->count();
    if (!empty($count)) {
      $blog->slug = $slug . '-' . $blog->id;
    } else {
      $blog->slug = trim($slug);
    }

    // Сохраняем изменения в базе данных
  
    $blog->save();
 

    return redirect('admin/blog/list')->with('success', 'Блог успішно створений!');
  }
  ////////////////////////////////////////////////////////
  // Edit Blog
  public function edit($id)
  {
    $data['getCategory'] = BlogCategoryModel::getRecordActive();
    $data['getRecord'] = BlogModel::getSingle($id);
    $data['header_title'] = 'Редагувати блог';
    return view('admin.blog.edit', $data);
  }
  ////////////////////////////////////////////////////////
  // Update Blog
  public function update(Request $request, $id)
  {
      $request->validate([
          'status' => 'required|in:0,1',
          'image_name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
  
      $blog = BlogModel::find($id);
  
      if (!$blog) {
          return redirect()->back()->with('error', 'Блог не знайдено!');
      }
  
      $blog->title = trim($request->title);
      $blog->blog_category_id = (int)$request->blog_category_id;
      $blog->slug = trim($request->slug);
      $blog->short_description = trim($request->short_description);
      $blog->description = trim($request->description);
      $blog->meta_keywords = trim($request->meta_keywords);
      $blog->status = (int)$request->status;
      $blog->meta_title = trim($request->meta_title);
      $blog->meta_description = trim($request->meta_description);
  
      if (!empty($request->file('image_name'))) {
          if (!empty($blog->image_name) && file_exists('upload/blog/' . $blog->image_name)) {
              unlink('upload/blog/' . $blog->image_name);
          }
          $file = $request->file('image_name');
          $ext = $file->getClientOriginalExtension();
          $randomStr = Str::random(20);
          $filename = strtolower($randomStr) . '.' . $ext;
          $file->move('upload/blog/', $filename);
          $blog->image_name = trim($filename);
      }
  
      $blog->save();
  
      return redirect('admin/blog/list')->with('success', 'Блог успішно оновлений!');
  }
  

  /////////////////////////////////////////////
  // Delete Blog
  public function delete($id)
  {
    $blog = BlogModel::getSingle($id);
    $blog->is_delete = 1;
    $blog->save();

    return redirect()->back()->with('success', 'Блог успішно видалений!');
  }
}
