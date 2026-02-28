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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('slider.edit') }}
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
                                        <label>Назва слайдера</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Введіть назву слайдера" value="{{ $getRecord->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Зображення слайдера</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file"  name="image_name" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
                                          </div>
                                          <div class="input-group-append">
                                            <span class="input-group-text">Завантажити</span>
                                          </div>
                                        </div>
                                        @if(!@empty($getRecord->getImage()))
                                        <img src="{{ $getRecord->getImage() }}" alt="{{ $getRecord->title }}"
                                            style="height:100px; margin-top:10px" class="img-thumbnail">
                                    @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Назва кнопки</label>
                                        <input type="text" name="button_name" class="form-control"
                                            placeholder="Введіть назву кнопки" value="{{ $getRecord->button_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Посилання кнопки</label>
                                        <input type="text" name="button_link" class="form-control"
                                            placeholder="Введіть посилання на кнопку" value="{{ $getRecord->button_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status"
                                            required>
                                            <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Активний
                                            </option>
                                            <option {{ $getRecord->status == 1 ? 'selected' : '' }}value="1">Неактивний
                                            </option>
                                        </select>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-flat">Підтвердити</button>
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
