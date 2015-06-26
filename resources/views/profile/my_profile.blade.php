@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_menu')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Мой профиль</h3>
              </div>
              <div class="panel-body">
                @include('partials.alerts')
                <div class="col-md-3">
                  @if(empty($user->profile->avatar))
                    <img src="/img/no-avatar.png" class="img-responsive">
                  @else
                    <img src="/img/users/{{ $user->profile->id . '/' . $user->profile->avatar }}" class="img-responsive">
                  @endif
                  <br>
                  <a href="/my_profile/edit" class="btn btn-default">Заполнить профиль</a>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <tr>
                      <th>Email:</th>
                      <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                      <th>Ваше ФИО:</th>
                      <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                      <th>Cфера работы:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th>Город:</th>
                      <td>{{ $user->profile->city->title }}</td>
                    </tr>
                    <tr>
                      <th>Адрес работы:</th>
                      <td>{{ $user->profile->address }}</td>
                    </tr>
                    <tr>
                      <th>Навыки:</th>
                      <td>{{ $user->profile->skills }}</td>
                    </tr>
                    <tr>
                      <th>Телефон:</th>
                      <td>{{ $user->profile->phone }}</td>
                    </tr>
                    <tr>
                      <th>Веб-сайт:</th>
                      <td>{{ $user->profile->website }}</td>
                    </tr>
                    <tr>
                      <th>Рейтинг:</th>
                      <td>
                        <i class="glyphicon glyphicon-star text-success"></i>
                        <i class="glyphicon glyphicon-star text-success"></i>
                        <i class="glyphicon glyphicon-star text-success"></i>
                        <i class="glyphicon glyphicon-star text-muted"></i>
                        <i class="glyphicon glyphicon-star text-muted"></i>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('styles')
  <link href="/bower_components/jasny-bootstrap/dist/css/fileinput.min.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="/bower_components/jasny-bootstrap/js/fileinput.js"></script>
@endsection