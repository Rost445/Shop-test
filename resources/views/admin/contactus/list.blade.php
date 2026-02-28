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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.contactus') }}
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

                        <form action="" method="get">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Пошук повідомлень</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">ID</label>
                                                <input type="text" name="id" class="form-control"
                                                    value="{{ Request::get('id') }}" placeholder="ID">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Ім'я</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ Request::get('name') }}" placeholder="Ім'я">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Електронна пошта</label>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ Request::get('email') }}" placeholder="Електронна пошта">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Телефон</label>
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ Request::get('phone') }}" placeholder="Телефон">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Тема</label>
                                                <input type="text" name="subject" class="form-control"
                                                    value="{{ Request::get('subject') }}" placeholder="Тема">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Повідомлення</label>
                                                <input type="text" name="message" class="form-control"
                                                    value="{{ Request::get('message') }}" placeholder="Повідомлення">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-flat"><i class="fas fa-search"></i> Пошук</button>
                                            <a name="" id="" class="btn btn-danger btn-flat"
                                                href="{{ url('admin/contactus') }}"role="button"><i class="fas fa-redo-alt"></i> Скинути</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Повідомлення</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Логін</th>
                                                <th>Ім'я</th>
                                                <th>Електорнна адреса</th>
                                                <th>Телефон</th>
                                                <th>Тема</th>
                                                <th>Повідомлення</th>
                                                <th>Дата створення</th>
                                                <th>Дія</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ !empty($value->getUser) ? $value->getUser->name : '' }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->phone }}</td>
                                                    <td>{{ $value->subject }}</td>
                                                    <td>{{ $value->message }}</td>
                                                    <td>{{ $value->created_at }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/contactus/delete/' . $value->id) }}"
                                                            class="btn  btn-danger btn-flat my-1"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px; float: right;">
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                    </div>
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
