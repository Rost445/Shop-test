@extends('layouts.app')
@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Замовлення</h1>
            </div>
        </div>


        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <br />

                    <div class="row">
                        @include('user._sidebar')
                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table class="table table-striped text-start">

                                        <tbody>
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td style=" padding: 10px;">
                                                        <a style="color: #6c757d; {{ empty($value->is_read) ? 'font-weight:bold; color: #000' : '' }}"
                                                            href="{{ $value->url }}?noti_id={{ $value->id }}">
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
        </div>
    </main>
@endsection

@section('script')
@endsection
