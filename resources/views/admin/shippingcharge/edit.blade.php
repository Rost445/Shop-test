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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('shipping_charge.edit') }}
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
                            <div class="card-body">
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Назва Доставки<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву оплати за доставку" required
                                            value="{{ old('name', $getRecord->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Вартість доставки<span class="text-danger">*</span></label>
                                        <input type="text" name="price" class="form-control"
                                            placeholder="Введіть Вартість доставки" required
                                            value="{{ old('price', $getRecord->price) }}">
                                    </div>






                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status"
                                            required>
                                            <option {{ old('status', $getRecord->status) == 0 ? 'selected' : '' }}
                                                value="0">Активний
                                            </option>
                                            <option {{ old('status', $getRecord->status) == 1 ? 'selected' : '' }}value="1">
                                                Неактивний
                                            </option>
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-flat">Оновити</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@section('script')
@endsection
