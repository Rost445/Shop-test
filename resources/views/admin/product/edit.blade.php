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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('product.edit') }}
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
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Назва <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="Введіть назву продукції" required
                                                    value="{{ old('title', $product->title) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Код товару <span class="text-danger">*</span></label>
                                                <input type="text" name="sku" class="form-control"
                                                    placeholder="Введіть код продукції" required
                                                    value="{{ old('sku', $product->sku) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Категорія <span class="text-danger">*</span></label>
                                                <select
                                                    name="category_id"class="form-control border border-primary text-primary"
                                                    id="ChangeCategory" required>
                                                    <option value="">Вибрати</option>
                                                    @foreach ($getCategory as $category)
                                                        <option
                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Підкатегорія <span class="text-danger">*</span></label>
                                                <select
                                                    name="sub_category_id"class="form-control  border border-primary text-primary"
                                                    id="getSubCategory" required>
                                                    <option value="">Вибрати</option>
                                                    @foreach ($getSubCategory as $subcategory)
                                                        <option
                                                            {{ $product->sub_category_id == $subcategory->id ? 'selected' : '' }}
                                                            value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Бренд <span class="text-danger">*</span></label>
                                                <select
                                                    name="brand_id"class="form-control  border border-primary text-primary"
                                                    required>
                                                    <option value="">Вибрати</option>
                                                    @foreach ($getBrand as $brand)
                                                        <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                                            value="{{ $brand->id }}" required>{{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check" style="padding-top:40px">
                                                <input {{ !empty($product->is_trendy) ? 'checked' : '' }}
                                                    class="form-check-input" type="checkbox" name="is_trendy">
                                                <label>
                                                    Трендова продукція
                                                </label>
                                            </div>

                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div>
                                                    <label>Колір <span class="text-danger">*</span></label>
                                                </div>
                                                @foreach ($getColor as $color)
                                                    @php
                                                        $checked = '';
                                                    @endphp

                                                    @foreach ($product->getColor as $pcolor)
                                                        @if ($pcolor->color_id == $color->id)
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label font-weight-bold">
                                                            <input {{ $checked }} class="form-check-input"
                                                                type="checkbox" name="color_id[]"
                                                                value="{{ $color->id }}"> {{ $color->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ціна (грн) <span class="text-danger">*</span></label>
                                                <input type="text" name="price" class="form-control"
                                                    placeholder="Введіть вартість продукції" required
                                                    value="{{ !empty($product->price) ? $product->price : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Стара ціна (грн) </label>
                                                <input type="text" name="old_price" class="form-control"
                                                    placeholder="Введіть стару вартість продукції" 
                                                    value="{{ !empty($product->old_price) ? $product->old_price : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" id = "">
                                                <label>Розмір <span class="text-danger">*</span></label>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <th>Назва</th>
                                                        <th> Ціна (грн)</th>
                                                        <th>Дія </th>
                                                    </thead>
                                                    <tbody id="AppendSize">
                                                        @php
                                                            $i_s = 1;
                                                        @endphp
                                                        @foreach ($product->getSize as $size)
                                                            <tr id="DeleteSize{{ $i_s }}">
                                                                <td>
                                                                    <input type="text" value="{{ $size->name }}"
                                                                        name="size[{{ $i_s }}][name]"
                                                                        class="form-control" placeholder="Назва">
                                                                </td>
                                                                <td>
                                                                    <input type="text" value="{{ $size->price }}"
                                                                        name="size[{{ $i_s }}][price]"
                                                                        class="form-control" placeholder="Ціна">
                                                                </td>
                                                                <td style="width: 200px;">
                                                                    <button type="button" id="{{ $i_s }}"
                                                                        class="btn btn-flat btn-danger DeleteSize">Видалити</button>

                                                                </td>
                                                            </tr>
                                                            @php
                                                                $i_s++;
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="size[100][name]"
                                                                    class="form-control" placeholder="Назва">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="size[100][price]"
                                                                    class="form-control" placeholder="Ціна">
                                                            </td>
                                                            <td style="width: 200px;">
                                                                <button type="button"
                                                                    class="btn btn-flat btn-primary AddSize">Додати</button>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="exampleInputFile">Зображення<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image[]" class="custom-file-input"
                                                            id="exampleInputFile" style="padding: 5px;" multiple
                                                            accept="image/*">
                                                        <label class="custom-file-label" for="exampleInputFile">Виберіть
                                                            файл</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Завантажити</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @if (!empty($product->getImage->count()))
                                        <div class="row" id="sortable">
                                            @foreach ($product->getImage as $image)
                                                @if (!empty($image->getLogo()))
                                                    <div class="col-md-2 sortable_image" id="{{ $image->id }}">
                                                        <img class="img-thumbnail" src="{{ $image->getLogo() }}">
                                                        <a onclick="return confirm('Чи дійсно ви хочете видалити це зображення?')"
                                                            href="{{ url('admin/product/image_delete/' . $image->id) }}"
                                                            class="btn btn-flat btn-danger mt-1">Видалити</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Короткий опис продукції <span class="text-danger">*</span></label>
                                                <textarea name="short_description" class="form-control" rows="5" placeholder="Короткий опис продукції">{{ $product->short_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Повний опис продукції <span class="text-danger">*</span></label>
                                                <textarea name="description" class="form-control editor" rows="7" placeholder="Повний опис продукції">{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Додаткова інформація <span class="text-danger">*</span></label>
                                                <textarea name="additional_information" class="form-control editor" rows="5"
                                                    placeholder="Додаткова інформація">{{ $product->additional_information }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Повернення доставки товару <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="shipping_returns" class="form-control editor" rows="7"
                                                    placeholder="Повернення  доставки товару">{{ $product->shipping_returns }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>Статус <span class="text-danger ">*</span></label>
                                                <select name="status"
                                                    class="form-control border border-primary text-primary" required>
                                                    <option {{ $product->status == 0 ? 'selected' : '' }} value="0">
                                                        Активний</option>
                                                    <option {{ $product->status == 1 ? 'selected' : '' }} value="1">
                                                        Неактивний</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-flat btn-primary">Оновити</button>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    var photo_id = new Array();
                    $('.sortable_image').each(function() {
                        var id = $(this).attr('id');
                        photo_id.push(id);
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/product_image_sortable') }}",
                        data: {
                            "photo_id": photo_id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {

                        },
                        error: function(data) {

                        }
                    });
                }
            });
        });



        var i = 101;
        $('body').delegate('.AddSize', 'click', function() {
            var html = '<tr id="DeleteSize' + i + '">\n\
                                                                                        <td>\n\
                                                                                        <input type="text" name="size[' +
                i + '][name]" class="form-control" placeholder="Назва">\n\
                                                                                        </td>\n\
                                                                                        <td>\n\
                                                                                        <input type="text" name="size[' +
                i + '][size]" class="form-control" placeholder="Ціна">\n\
                                                                                        </td>\n\
                                                                                        <td>\n\
                                                                                        <button type="button" id="' + i + '" class="btn btn-danger DeleteSize">Видалити</button>\n\
                                                                                        </td>\n\
                                                                                        </tr>';
            i++;
            $('#AppendSize').append(html);
        });

        $('body').delegate('.DeleteSize', 'click', function() {
            var id = $(this).attr('id');
            $('#DeleteSize' + id).remove();
        });
        $('body').delegate('#ChangeCategory', 'change', function(e) {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/get_sub_category') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#getSubCategory').html(data.html)
                },
                error: function(data) {

                }
            });

        });
    </script>
@endsection
