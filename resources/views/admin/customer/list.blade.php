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
            <h1>{{ $header_title}} (Всього : {{ $getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mx-2">
              <li class="breadcrumb-item"> {{ Breadcrumbs::render('admin.customer_list') }} </li>
             
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
                        <h3 class="card-title">Пошук кліентів</h3>
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
                                    <label for="">По даті (від)</label>
                                    <input style="padding: 6px" type="date" name="from_date"
                                        class="form-control" value="{{ Request::get('from_date') }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">По даті (до)</label>
                                    <input style="padding: 6px" type="date" name="to_date"
                                        class="form-control" value="{{ Request::get('to_date') }}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-flat" title="Пошук"><i class="fas fa-search"></i> Пошук</button>
                                <a name="" id="" class="btn btn-danger btn-flat"
                                    href="{{ url('admin/customer/list') }}"role="button" title="Скинути"><i class="fas fa-redo-alt"></i> Скинути</a>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список замовників</h3>
              </div>
              <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Ім'я</th>
                      <th>
                        Електронна пошта
                      <th>Статус</th>
                      <th>Дата створення</th>
                      <th>Дія</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id}}</td>
                      <td>{{ $value->name}}</td>
                      <td>{{ $value->email}}</td>
                      <td>{!! ($value->status == 0) ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-minus-circle text-secondary"></i>'!!}</td>
                      <td> {{ date('d-m-Y G:i:s', strtotime($value->created_at)) }}</td>
                      <td>
                   
                      <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn  btn-danger btn-flat" title="Видалити"><i class="fas fa-trash-alt"></i></a>
                      </td>
  
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
                <div style="padding: 10px; float: right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
