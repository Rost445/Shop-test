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
                        <ol class="breadcrumb float-sm-right mx-2 mx-2mx-2">
                          <li class="breadcrumb-item">{{ Breadcrumbs::render('page.edit') }}</li>
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
                                        <label for="exampleInputName">Назва<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву" value="{{ $getRecord->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Заголовок<span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Введіть заголовок" value="{{ $getRecord->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Зображення<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" value="{{ $getRecord->image_name }}">
                                                <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                    зображення</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @if(!empty($getRecord->getImage()))
                                        <img class="img-thumbnail mt-3 mb-3" src="{{ $getRecord->getImage() }}" alt="" style="width: 200px; ">
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <label>Опис<span class="text-danger">*</span></label>
                                        <textarea class="form-control editor" name="description">{{ $getRecord->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета назва<span class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву" required value="{{ $getRecord->meta_title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис </label>
                                        <textarea rows="7" name="meta_description" class="form-control" placeholder="Введіть мета опис ">{{ $getRecord->meta_description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Ключові слова</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            placeholder="Введіть ключові слова" required
                                            value="{{ $getRecord->meta_description }}">
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
