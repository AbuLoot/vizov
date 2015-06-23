@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_menu')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Редактирование профиля</h3>
              </div>
              <div class="panel-body">
                <form action="/profile/update" method="post" role="form">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" minlength="8" maxlength="60" value="{{ $user->email }}" required disabled>
                  </div>
                  <div class="form-group">
                    <label for="name">Ваше ФИО:</label>
                    <input type="text" class="form-control" name="name" id="name" minlength="3" maxlength="60" value="{{ $user->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">Контакты (телефон):</label>
                    <input type="tel" class="form-control" name="phone" id="phone" maxlength="40" placeholder="Номер телефона" value="">
                  </div>
                  <div class="form-group">
                    <label for="skills">Навыки:</label>
                    <input type="text" class="form-control" name="skills" id="skills" placeholder="Какими навыками вы владете" value="">
                  </div>
                  <div class="form-group">
                    <label for="website">Веб-сайт:</label>
                    <input type="text" class="form-control" name="website" id="website" placeholder="Веб-сайт" value="">
                  </div>
                  <button type="submit" name="btn-add-app" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Сохранить</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection