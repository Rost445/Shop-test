@php
$getSettingFooter = App\Models\SystemSettingModel::getSingle();
@endphp
  <aside class="control-sidebar control-sidebar-dark">

  </aside>

<footer class="main-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <strong>Copyright &copy; {{ date('Y')}} {{  $getSettingFooter->website_name}}</strong> | All rights reserved.  
      </div>
      <div class="col-md-6">
        <p class="text-right">Сьогодні: <strong><span id="current-time"></span></strong></p>

        </div>
    </div>
  </div>
   
  </footer>
  <script>
    function updateTime() {
        const now = new Date();
        const formattedTime = now.toLocaleDateString('ru-RU', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
    minute: '2-digit',
    second: '2-digit'
        });
        document.getElementById('current-time').textContent = formattedTime;
    }

    // Обновляем время сразу и запускаем интервал
    updateTime();
    setInterval(updateTime, 1000);
</script>