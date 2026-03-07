@extends('admin.layouts.app')
@section('style')
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
                            <li class="breadcrumb-item"> {{ Breadcrumbs::render('category.add') }}
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
                        <div class="card card-primary">

                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Назва категорії <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Введіть назву категорії" required value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName">Слаг категорії <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Назва категорії латиницею, через дефіс" required
                                            value="{{ old('slug') }}">
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Статус <span class="text-danger">*</span></label>
                                        <select class="form-control text-primary border border-primary" name="status"
                                            required>
                                            <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Активна
                                            </option>
                                            <option {{ old('status') == 1 ? 'selected' : '' }}value="1">Неактивна
                                            </option>
                                        </select>
                                    </div>
                                    <hr>
                                  <div class="form-group">
<label for="exampleInputFile">Зображення</label>

<div class="input-group">
<div class="custom-file">
<input type="file" name="image_name" class="custom-file-input" id="imageInput">
<label class="custom-file-label">Виберіть файл</label>
</div>
<div class="input-group-append">
<span class="input-group-text">Завантажити</span>
</div>
</div>

<br>

<img id="previewImage" src="#" style="max-height:150px; display:none; border-radius:5px;">
</div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Назва кнопки</label>
                                        <input type="text" name="button_name" class="form-control">
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <div class="form-check mr-3">
                                        <input type="checkbox"
                                            name="is_home" class="form-check-input" id="is_home">
                                        <label class="form-check-label" for="exampleCheck1">Головний екран</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox"
                                            name="is_menu" class="form-check-input" id="is_menu">
                                        <label class="form-check-label" for="exampleCheck1">Меню</label>
                                    </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета назва категорії <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Введіть мета назву категорії" required
                                            value="{{ old('meta_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Мета опис категорії</label>
                                        <textarea name="meta_description" class="form-control" placeholder="Введіть мета опис категорії">{{ old('meta_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName">Ключові слова категорії</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            placeholder="Введіть ключові слова категорії" required
                                            value="{{ old('meta_keywords') }}">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-flat btn-primary">Підтвердити</button>
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
<script>
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    let fileName = e.target.files[0].name;
    let nextSibling = e.target.nextElementSibling;
    nextSibling.innerText = fileName;
});
</script>
<script>

document.getElementById("imageInput").addEventListener("change", function(event){

    let file = event.target.files[0];

    if(file){
        document.querySelector(".custom-file-label").innerText = file.name;

        let reader = new FileReader();

        reader.onload = function(e){
            let img = document.getElementById("previewImage");
            img.src = e.target.result;
            img.style.display = "block";
        }

        reader.readAsDataURL(file);
    }

});

</script>
@endsection
