@extends('admin.layouts.app')
@section('style')
<style>   
    .table thead th,.table td{
        margin: auto !important;
        vertical-align: middle;
       /* text-align: center;*/
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
                                <h3 class="card-title">{{ $header_title }}</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td>
                                                        <a style="color: #6c757d; {{ empty($value->is_read) ? 'font-weight:bold; color: #000' : '' }}" href="{{ $value->url }}?noti_id={{ $value->id }}">
                                                            <i class="fas fa-bell mr-2"></i> {{ $value->title }}
                                                            {{ strip_tags($value->message) }}
                                                        </a>
                                                        <div class=" text-muted text-sm"> {{ \Carbon\Carbon::parse($value->created_at)->locale('uk')->translatedFormat('d F Y H:i') }}
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
