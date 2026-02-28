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
            <h1>{{ $header_title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mx-2">
                <li class="breadcrumb-item"> {{ Breadcrumbs::render('review.list') }}
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
                        <h3 class="card-title">Пошук відгуків</h3>
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
                                    <label for="">№	Замовлення</label>
                                    <input type="text" name="order_id" class="form-control"
                                        value="{{ Request::get('order_id') }}" placeholder="Замовлення">
                                </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                  <label for="">ID Замовника</label>
                                  <input type="text" name="user_id" class="form-control"
                                      value="{{ Request::get('user_id') }}" placeholder="ID Замовника">
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
                                <button class="btn btn-primary btn-flat"><i class="fas fa-search"></i> Пошук </button>
                                <a name="" id="" class="btn btn-danger btn-flat"
                                    href="{{ url('admin/review/list') }}"role="button"><i class="fas fa-redo-alt"></i> Скинути</a>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Відгуки</h3>
              </div>
              <div class="card-body p-0">
               <div class="table-responsive">
                <table class="table table-striped table-bordered">
                {{-- <table class="table table-striped table-valign-middle"> --}}
                  <thead>
                    <tr>
                      <th>#</th>
                      <th width="150">№ Замовлення</th>
                      <th >Замовник</th>
                      <th width="150">ID Замовника</th>
                      <th>Відгук</th>
                      <th >Рейтинг</th>
                      <th  width="150">Дата створення</th>
                      <th >Дія</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{ $value->id}}</td>
                      <td>{{ $value->order_id}}</td>
                     <td>@foreach($reviews as $review)
                      {{$review->user_name}}
                      @php break; @endphp
                      @endforeach
                     </td>
                     <td>{{ $value->user_id}}</td>
                     <td>{{ $value->review}}</td>
                      <td>{{ $value->rating}}</td>
                      <td> {{ date('d-m-Y G:i:s', strtotime($value->created_at)) }}</td>
                      <td>
                   
                      <a href="{{ url('admin/review_delete/'.$value->id) }}" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></a>
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
