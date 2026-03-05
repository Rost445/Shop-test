<!DOCTYPE html>
<html lang="uk">
<head>

<meta charset="UTF-8">
<title>404 - Сторінку не знайдено</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#f8fafc;
    font-family:sans-serif;
}

.error-container{
    text-align:center;
}

.error-code{
    font-size:140px;
    font-weight:800;
    color:#0d6efd;
    animation: float 3s ease-in-out infinite;
}

@keyframes float{
    0%{transform:translateY(0)}
    50%{transform:translateY(-15px)}
    100%{transform:translateY(0)}
}

.error-text{
    font-size:24px;
    margin-bottom:20px;
}

.btn-home{
    padding:12px 28px;
    font-size:18px;
}

</style>

</head>

<body>

<div class="error-container">

<div class="error-code">
404
</div>

<div class="error-text">
Сторінку не знайдено
</div>

<p class="text-muted">
Можливо сторінка була видалена або ви перейшли за неправильним посиланням
</p>

<a href="{{ url('/') }}" class="btn btn-primary btn-home">
На головну
</a>

</div>

</body>
</html>