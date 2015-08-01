@extends('layout')

@section('content')
      <div class="col-md-6 col-md-offset-2 content-block">
        <h3 class="text-center">Отправка ссылки на сброс пароля</h3>
        @include('partials.alerts')

        <form method="POST" action="/password/email">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить ссылку на почту</button>
          </div>
        </form>
      </div>
@endsection