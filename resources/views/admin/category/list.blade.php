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
                        <ol class="breadcrumb float-sm-right mx-2">
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('blog.list') }}
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
                                <a href="{{ url('admin/category/add') }}" class="btn btn-primary btn-flat my-2"><i
                                        class="fas fa-plus"></i> Додати Категорію</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Зображення</th>
                                                <th>Ім'я</th>
                                                <th>Слаг</th>
                                                <th>Мета заголовок</th>
                                                <th>Мета опис</th>
                                                <th>Ключові слова</th>
                                                <th>Хто створив</th>
                                                <th>Головний екран</th>
                                                <th>Меню</th>
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

                                                    <td class="align-middle">
                                                        @if (!@empty($value->getImage()))
                                                            <img src="{{ $value->getImage() }}" alt="{{ $value->title }}"
                                                                style="height:100px; margin-top:10px" class="img-thumbnail">
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->slug }}</td>
                                                    <td>{{ $value->meta_title }}</td>
                                                    <td>{{ $value->meta_description }}</td>
                                                    <td>{{ $value->meta_keywords }}</td>
                                                    <td>{{ $value->created_by_name }}</td>
                                                    <td>{!! $value->is_home == 1 ? '<i class="fas fa-eye text-primary"></i>' : '<i class="fas fa-eye-slash text-secondary"></i>' !!}</td>
                                                    <td>{!! $value->is_menu == 1 ? '<i class="fas fa-eye text-primary"></i>' : '<i class="fas fa-eye-slash text-secondary"></i>' !!}</td>
                                                    <td>{!! $value->status == 0 ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-minus-circle text-secondary"></i>' !!}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                    <td><a href="{{ url('admin/category/edit/' . $value->id) }}"
                                                            class="btn  btn-primary btn-flat"><i
                                                                class="fas fa-edit"></i></a></td>
                                                    <td><a href="{{ url('admin/category/delete/' . $value->id) }}"
                                                            class="btn btn-danger btn-flat"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>

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
