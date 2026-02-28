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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('sub_category.edit') }}
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

                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group ">
                                        <label for="exampleInputName">Назва категорії <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="category_id">
                                            <option value="">Вибрати</option>
                                            @foreach ($getCategory as $value)
                                                <option {{ ($value->id == $getRecord->category_id) ?  'selected' :  '' }} 
                                                    value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Назва підкатегорії <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву підкатегорії" required value="{{ old('name',$getRecord->name) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Слаг підкатегорії<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Назва підкатегорії латиницею, через дефіс" required
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
                                        <label for="exampleInputName">Мета назва підкатегорії<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву підкатегорії" required
                                            value="{{ old('meta_title',$getRecord->meta_title) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис підкатегорії</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Введіть мета опис підкатегорії">{{ old('meta_description',$getRecord->meta_description) }}</textarea>
                                    </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputName">Ключові слова підкатегорії</label>
                                    <input type="text" name="meta_keywords" class="form-control"
                                        placeholder="Введіть мета назву підкатегорії" required
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
