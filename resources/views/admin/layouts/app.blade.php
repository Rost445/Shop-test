@php
$getSettingHeader = App\Models\SystemSettingModel::getSingle();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title : ''}} - {{  $getSettingHeader->website_name}}</title>
  <link rel="shortcut icon" href="{{ $getSettingHeader->getFavicon()}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
     <!-- summernote -->
     <link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">
     <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
   <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

  @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('admin.layouts.header')
  @yield('content')
  @include('admin.layouts.footer')
</div>

<script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ url('public/assets/dist/js/adminlte.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ url('public/assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
 <!-- overlayScrollbars -->
 <script src="{{ url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<script>
  $(function () {
    $('.editor').summernote({
      height: 300,
    })

  })
</script>
<script>

document.querySelectorAll('.custom-file-input').forEach(function(input){

    input.addEventListener('change', function(e){

        let file = e.target.files[0];

        if(file){

            e.target.nextElementSibling.innerText = file.name;

            let reader = new FileReader();

            reader.onload = function(ev){

                let preview = e.target.closest('.form-group').querySelector('.previewImage');

                preview.src = ev.target.result;
                preview.style.display = "block";

            }

            reader.readAsDataURL(file);

        }

    });

});

</script>

@yield('script')

</body>
</html>
