<div class="form-group">

<label>{{ $label }}</label>

<div class="input-group">
    <div class="custom-file">
        <input type="file" name="{{ $name }}" class="custom-file-input imageInput">
        <label class="custom-file-label">Виберіть файл</label>
    </div>
    <div class="input-group-append">
        <span class="input-group-text">Завантажити</span>
    </div>
</div>

<img class="previewImage img-thumbnail mt-2" style="max-width:200px; display:none;">

@if(!empty($image))
<img src="{{ $image }}" class="img-thumbnail mt-2" style="max-width:200px">
@endif

</div>