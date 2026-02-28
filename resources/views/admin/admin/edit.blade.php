@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагувати адміна</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mx-2 mx-2mx-2">
                      <li class="breadcrumb-item">{{ Breadcrumbs::render('edit') }}</li>
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
                        @include('admin.layouts._message')
                        <form action="" method="post" >
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Ім'я</label>
                                    <input type="text" value="{{ old('name', $getRecord->name) }}" name="name" class="form-control"  placeholder="Введіть ім'я" required >
                                </div>
                                <div class="form-group">
                                    <label>Емейл</label>
                                    <input type="email" name="email"

                                        class="form-control" value="{{ old('name', $getRecord->email) }}" placeholder="Введіть емейл" required >
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input type="text" name="password" class="form-control" placeholder="Введіть пароль">
<p>Ви хочете змінити пароль, тож додайте його.</p>
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                  <select class="form-control text-primary border border-primary" name="status" required>
                                    <option {{ ($getRecord->status == 0) ? 'selected' : '' }}" value="0">Активний</option>
                                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }}" value="1">Неактивний</option>
                                  </select>
                                </div>
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