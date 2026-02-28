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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('blog.add') }}
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
                                            placeholder="Введіть заголовок блогу" required value="{{ old('title') }}">
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Категорія<span class="text-red">*</span></label>
                                        <select class="form-control" name="blog_category_id" required>
                                            <option value="">Вибрати...</option>
                                            @foreach ($getCategory as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Слаг<span class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Назва блогу латиницею, через дефіс" required
                                            value="{{ old('slug') }}">
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
                                    </div>
                                    <div class="form-group">
                                        <label>Короткий Опис<span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="short_description">{{ old('short_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Опис<span class="text-danger">*</span></label>
                                        <textarea class="form-control editor" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status"
                                            required>
                                            <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Активний
                                            </option>
                                            <option {{ old('status') == 1 ? 'selected' : '' }}value="1">Неактивний
                                            </option>
                                        </select>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label for="exampleInputName">Мета назва блогу<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву  блогу" required
                                            value="{{ old('meta_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис блогу</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Введіть мета опис блогу">{{ old('meta_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Ключові слова блогу</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            placeholder="Введіть ключові слова  блогу" required
                                            value="{{ old('meta_keywords') }}">
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
