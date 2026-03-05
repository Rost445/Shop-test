@extends('admin.layouts.app')
@section('style')
    <style>
        .table thead th,
        .table td {
            margin: auto !important;
            vertical-align: middle;
            text-align: center;

        }
        
    </style>
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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('color.list') }}
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
                        @include('admin.layouts._message')

                        <div class="card">
                            <div class="card-header">
                                <a href="{{ url('admin/color/add') }}" class="btn btn-primary btn-flat my-2"> <i
                                        class="fas fa-plus"></i> Додати Колір</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ім'я</th>
                                                <th>Код</th>
                                                <th>Хто створив</th>
                                                <th>Статус</th>
                                                <th>Дата створення</th>
                                                <th><i class="fas fa-edit"></i></th>
                                                <th><i class="fas fa-trash-alt"></i></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>
    <div style="display:flex; align-items:center; justify-content:center; gap:10px;">
        
        <div style="
            width:25px;
            height:25px;
            border-radius:4px;
            border:1px solid #ccc;
            border-radius:50%;
            background:{{ $value->code }};
        "></div>

        <span>{{ $value->code }}</span>

    </div>
</td>
                                                    <td>{{ $value->created_by_name }}</td>
                                                    <td>{!! $value->status == 0 ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-minus-circle text-secondary"></i>' !!}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                    <td><a href="{{ url('admin/color/edit/' . $value->id) }}"
                                                            class="btn btn-primary btn-flat "><i class="fas fa-edit"></i></a></td>
                                                    <td><a href="{{ url('admin/color/delete/' . $value->id) }}"
                                                            class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></a></td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
