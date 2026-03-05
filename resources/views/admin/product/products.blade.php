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
                        <li class="breadcrumb-item"> {{ Breadcrumbs::render('product.index') }}
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
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                               
                                    <div class="form-group">
                                        <label for="exampleInputFile">Імпорт файла .xlsx</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input"
                                                    id="exampleInputFile" required>
                                                <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                    файл</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-success btn-flat mx-2"> Імпорт <i class="fas fa-file-import"></i></button>
                                            </div>
                                        </div>
                                    </div>
                              
                            </form>
                            <div class="my-4">
                             <div class="border border-bottom-0 p-2 rounded">
                               <a class="btn btn-warning btn-flat text-dark"
                                    href="{{ route('products.export') }}"><i class="fas fa-file-export"></i> Експорт</a><span class="text-dark font-weight-bold mx-2">Експорт файла .xlsx</span></div></div>
                           
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Назва</th>
                                            <th>Слаг</th>
                                            <th>Sku</th>
                                            <th>Стара ціна</th>
                                            <th>Ціна</th>
                                            <th>Короткий опис</th>
                                            <th>Опис</th>
                                            <th>Додаткова інформація</th>
                                            <th>Повернення</th>
                                            <th>Статус</th>
                                            <th>Видалено</th>
                                            <th>Створено</th>
                                            <th>Дата створення</th>
                                            <th>Дата оновлення</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($getRecord->isNotEmpty())
                                            @foreach ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->title }}</td>
                                                    <td>{{ $value->slug }}</td>
                                                    <td>{{ $value->sku }}</td>
                                                    <td>{{ $value->old_price }}</td>
                                                    <td>{{ $value->price }}</td>
                                                    <td>{{ Str::limit($value->short_description, 50, '...') }}</td>
                                                    <td>{{ Str::limit($value->description, 50, '...') }}</td>
                                                    <td>{{ Str::limit($value->additional_information, 50, '...') }}</td>
                                                    <td>{{ Str::limit($value->shipping_returns, 50, '...') }}</td>
                                                    <td>{{ $value->status }}</td>
                                                    <td>{{ $value->is_delete }}</td>
                                                    <td>{{ $value->created_by_name }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>

                                                </tr>
                                            @endforeach
                                        @endif
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
@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const fileInput = document.querySelector('.custom-file-input');
    const label = document.querySelector('.custom-file-label');
    const form = fileInput.closest('form');

    // показати назву файлу + іконку Excel
    fileInput.addEventListener('change', function (e) {
        if (e.target.files.length > 0) {
            const fileName = e.target.files[0].name;
            const ext = fileName.split('.').pop().toLowerCase();

            if (ext === 'xlsx' || ext === 'xls') {
                label.innerHTML = '<i class="fas fa-file-excel text-success"></i> ' + fileName;
            } else {
                label.innerHTML = '<i class="fas fa-file"></i> ' + fileName;
            }
        }
    });

    // очистити після відправки форми
    form.addEventListener('submit', function () {
        setTimeout(function(){
            fileInput.value = "";
            label.innerText = "Виберіть файл";
        }, 500);
    });

});
</script>
@endsection
@endsection

