@extends('layouts.app')
@section('style')
    <style>
        .pass {
            position: relative;
        }

        .icon-pass {
            position: absolute;
            right: 10px;

            transform: translateY(75%);
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Змінити пароль</h1>
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
                                @include('layouts._message')

                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="pass">
                                                <label>Старий пароль<span class="text-danger">*</span></label>
                                                <span style="font-size:2rem" class="icon-pass" id="icon-pass-old">&#128065;</span>
                                                <input type="password" name="old_password" class="form-control" id="old-pass" required>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="pass">
                                                <label>Новий пароль<span class="text-danger">*</span></label>
                                                <span style="font-size:2rem" class="icon-pass" id="icon-pass-new">&#128065;</span>
                                                <input type="password" name="password" class="form-control" id="new-pass" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="pass">
                                                <label>Підтвердити новий пароль<span class="text-danger">*</span></label>
                                                <span style="font-size:2rem" class="icon-pass" id="icon-pass-confirm">&#128065;</span>
                                                <input type="password" name="cpassword" class="form-control" id="confirm-pass" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-outline-primary-2 btn-order">
                                            Оновити пароль
                                        </button>
                                    </div>
                                </form>
                                
                              
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
<script>
    document.querySelectorAll('.icon-pass').forEach(icon => {
      icon.addEventListener('click', () => {
        const inputId = icon.id.replace('icon-pass-', ''); // Определяем связанный input по ID
        const input = document.getElementById(`${inputId}-pass`);
        if (input) {
          if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = '◠'; // Изменить иконку
          } else {
            input.type = 'password';
            icon.textContent = '👁'; // Вернуть иконку
          }
        }
      });
    });
    </script>
 
    
    
@endsection
