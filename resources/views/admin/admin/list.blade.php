@extends('admin.layouts.app')
@section('style')
<style>
    
    .table thead th,.table td{
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
                        <ol class="breadcrumb float-sm-right mx-2 mx-2mx-2">
                            <li class="breadcrumb-item">{{ Breadcrumbs::render('list') }}</li>
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
                            <div class="card-header ">
                                <h3 class="card-title my-2"> <a href="{{ url('admin/admin/add') }}"
                                        class="btn btn-primary btn-flat"><i class="fas fa-plus"></i> Додати Адміна</a></h3>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ім'я</th>
                                            <th>Емейл</th>
                                            <th>Статус</th>
                                            <th><i class="fas fa-edit"></i></th>
                                            <th><i class="fas fa-trash-alt"></i></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{!! $value->status == 0 ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-minus-circle text-secondary"></i>' !!}</td>
                                                <td>
                                                    <a href="{{ url('admin/admin/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-flat" title="Змінити"><i
                                                            class="fas fa-edit"></i></a>

                                                </td>
                                                <td> <a href="{{ url('admin/admin/delete/' . $value->id) }}"
                                                        class="btn   btn-danger btn-flat" title="Видалити"><i
                                                            class="fas fa-trash-alt"></i></a></td>
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
