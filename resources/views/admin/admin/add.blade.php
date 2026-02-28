@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Додати нового адміна</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mx-2 mx-2mx-2">
                      <li class="breadcrumb-item">{{ Breadcrumbs::render('add') }}</li>
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

                        <form action="" method="post" >
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Ім'я</label>
                                    <input type="text" name="name" class="form-control" placeholder="Введіть ім'я" required value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label>Емейл</label>
                                    <input type="email" name="email" class="form-control" placeholder="Введіть емейл" required value="{{old('email')}}">
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input type="password" name="password" class="form-control" placeholder="Введіть пароль" required>
                                </div>
                                <div class="form-group ">
                                    <label>Статус</label>
                                  <select class="form-control text-primary border border-primary" name="status" required>
                                    <option {{ (old('status') == 0 ) ? 'selected' : '' }} value="0">Активний</option>
                                    <option {{ (old('status') == 1 ) ? 'selected' : '' }}value="1">Неактивний</option>
                                  </select>
                                </div>
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