@extends('layout')

@section('content')
      <div class="col-md-6 col-md-offset-2 content-block">
        <h3 class="text-center">Регистрация</h3>
        @include('partials.alerts')

        <form method="POST" class="/auth/register">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="name" class="control-label">Ваше имя</label>
            <input type="text" class="form-control" id="name" name="name" minlength="3" maxlength="60" placeholder="Введите имя" value="{{ old('name') }}" required>
          </div>
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" minlength="8" maxlength="60" placeholder="Введите email" value="{{ old('email') }}" required>
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="60" placeholder="Введите пароль" required>
          </div>
          <div class="form-group">
            <label for="password_confirmation" class="control-label">Подтвердите Пароль</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" minlength="6" maxlength="60" placeholder="Введите еще раз пароль" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="rules"> Я согласен с <a href="#">правилами сайта</a>
              </label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
          </div>
        </form>
      </div>

      <script type="text/javascript">
        window.onload = function () {
          document.getElementById("password").onchange = validatePassword;
          document.getElementById("password_confirmation").onchange = validatePassword;
        }
        function validatePassword() {
          var pass2=document.getElementById("password_confirmation").value;
          var pass1=document.getElementById("password").value;
          if (pass1!=pass2)
            document.getElementById("password_confirmation").setCustomValidity("Пароли не совпадают");
          else
            document.getElementById("password_confirmation").setCustomValidity('');
            //empty string means no validation error
        }
      </script>
@endsection