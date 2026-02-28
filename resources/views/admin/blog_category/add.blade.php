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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('blog_category.add') }}
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
                                        <label for="exampleInputName">Назва категорії блогу<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву категорії блогу" required value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Слаг категорії блогу<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Назва категорії блогу латиницею, через дефіс" required
                                            value="{{ old('slug') }}">
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status"
                                            required>
                                            <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Активна
                                            </option>
                                            <option {{ old('status') == 1 ? 'selected' : '' }}value="1">Неактивна
                                            </option>
                                        </select>
                                    </div>
                                    <hr>
                              
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета назва категорії блогу<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву категорії блогу" required
                                            value="{{ old('meta_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис категорії блогу</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Введіть мета опис категорії блогу">{{ old('meta_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Ключові слова категорії блогу</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            placeholder="Введіть ключові слова категорії блогу" required
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
