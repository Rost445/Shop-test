@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $header_title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mx-2">
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('blog.edit') }}
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
                                        <label for="exampleInputName">Заголовок<span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Введіть заголовок блогу" required value="{{ $getRecord->title }}">
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Категорія<span class="text-red">*</span></label>
                                        <select class="form-control" name="blog_category_id" required>
                                            <option value="">Вибрати...</option>
                                            @foreach ($getCategory as $category)
                                           <option {{ ($getRecord->blog_category_id == $category->id ) ? 'selected' : '' }} 
                                            value="{{ $category->id }}">{{ $category->name }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Слаг<span class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Назва блогу латиницею, через дефіс" required
                                            value="{{ $getRecord->slug }}">
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Зображення</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image_name" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                    файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Завантажити</span>
                                            </div>
                                        </div>
                                        @if(!empty($getRecord->getImage()))
                                            <img src="{{ $getRecord->getImage() }}" alt="" class="img-thumbnail my-2" style="height: 200px">
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Короткий опис<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="short_description">{{ $getRecord->short_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Опис<span class="text-danger">*</span></label>
                                        <textarea class="form-control editor" name="description">{{ $getRecord->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status"
                                            required>
                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Активний
                                            </option>
                                            <option {{ ($getRecord->status) == 1 ? 'selected' : '' }}value="1">Неактивний
                                            </option>
                                        </select>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label for="exampleInputName">Мета назва блогу<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву  блогу" required
                                            value="{{ $getRecord->meta_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис блогу</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Введіть мета опис блогу">{{ $getRecord->meta_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Ключові слова блогу</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            placeholder="Введіть ключові слова  блогу" required
                                            value="{{ $getRecord->meta_keywords}}">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-flat btn-primary">Підтвердити</button>
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
