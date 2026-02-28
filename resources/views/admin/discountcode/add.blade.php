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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('discount_code.add') }}
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
                                    <div class="form-group">
                                        <label>Назва коду знижки<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву коду знижки" required value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Тип <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="type"
                                            required>

                                            <option {{ old('type') == 'Процент' ? 'selected' : '' }}value="Процент">Процент
                                            </option>
                                            <option {{ old('type') == 'Сума' ? 'selected' : '' }} value="Сума">Сума
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Процент / Сума<span class="text-danger">*</span></label>
                                        <input type="text" name="percent_amount" class="form-control"
                                            placeholder="Процент / Сума" required value="{{ old('percent_amount') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Термін Дії<span class="text-danger">*</span></label>
                                        <input type="date" name="expire_date" class="form-control" required
                                            value="{{ old('percent_amount') }}">
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
