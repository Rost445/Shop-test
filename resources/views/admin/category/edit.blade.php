@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $header_title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2">
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('category.edit') }}
                            </li>
                          </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">

                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Назва категорії <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву категорії" required value="{{ old('name',$getRecord->name) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Слаг категорії<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Слаг категорії" required
                                            value="{{ old('slug', $getRecord->slug) }}">
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status" required>
                                            <option {{ old('status',$getRecord->status) == 0 ? 'selected' : '' }} value="0">Активна
                                            </option>
                                            <option {{ old('status',$getRecord->status) == 1 ? 'selected' : '' }}value="1">Неактивна
                                            </option>
                                        </select>
                                    </div>

                                    <hr>

                
                                    <div class="form-group">
                                        <label for="exampleInputFile">Зображення</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" name="image_name" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
                                          </div>
                                          <div class="input-group-append">
                                            <span class="input-group-text">Завантажити</span>
                                          </div>
                                        </div>
                                      </div>
                                      @if(!empty($getRecord->getImage()))
                                      <img src="{{ $getRecord->getImage() }}" alt="" srcset="" class="img-thumbnail" style="height: 100px;">
                                      @endif
                                    <div class="form-group">
                                        <label for="exampleInputName">Назва кнопки</label>
                                        <input type="text" name="button_name" class="form-control"
                                            value="{{ old('button_name',$getRecord->button_name) }}">
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <div class="form-check mr-3">
                                        <input type="checkbox" {{ !empty($getRecord->is_home) ? 'checked' : '' }} name="is_home" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Головний екран</label>
                                      </div>
                                      <div class="form-check">
                                        <input type="checkbox" {{ !empty($getRecord->is_menu) ? 'checked' : '' }} name="is_menu" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Меню</label>
                                      </div>
                                    </div>
                                    <hr>


                                    <div class="form-group">
                                        <label for="exampleInputName">Мета назва категорії <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву категорії" required
                                            value="{{ old('meta_title',$getRecord->meta_title) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис категорії</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Введіть мета опис категорії">{{ old('meta_description',$getRecord->meta_description) }}</textarea>
                                    </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputName">Ключові слова категорії</label>
                                    <input type="text" name="meta_keywords" class="form-control"
                                        placeholder="Введіть ключові слова категорії" required
                                        value="{{ old('meta_keywords',$getRecord->meta_description) }}">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-flat">Оновити</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@section('script')
@endsection
