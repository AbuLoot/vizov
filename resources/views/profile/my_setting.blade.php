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
                <h3 class="panel-title">Изменение пароля</h3>
              </div>
              <div class="panel-body">
                <form action="" method="post" role="form">
                  <div class="form-group">
                    <label for="old-password">Старый пароль:</label>
                    <input class="form-control" placeholder="Old Password" name="old-password" id="old-password" type="password">
                  </div>
                  <div class="form-group">
                    <label for="new-password">Новый пароль:</label>
                    <input class="form-control" placeholder="New Password" name="new-password" id="new-password" type="password">
                  </div>
                  <div class="form-group">
                    <label for="new-password-again">Повторите новый пароль:</label>
                    <input class="form-control" placeholder="New Password Again" name="new-password-again" id="new-password-again" type="password">
                  </div>
                  <button type="submit" name="btn-add-app" class="btn btn-default"><span class="glyphicon glyphicon-floppy-save"></span> Изменить</button>
                </form>
              </div>
            </div>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Удаление аккаунта</h3>
              </div>
              <div class="panel-body">
                <form action="http://badlist.kz/destroy-account" method="post" role="form">
                  <input name="_token" type="hidden" value="gvtDbUmQRBIhVcwTUWylnrznxSJGlHt9ZDwph5rb">
                  <button type="submit" class="btn btn-warning" onclick="return confirm('Удалить аккаунт?')"><span class="glyphicon glyphicon-fire"></span> Удалить</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection