@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_menu')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="content-block">
              <h3>Мой профиль</h3>
              @include('partials.alerts')
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <tr>
                    <td width="170">Email</td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td>Ваше ФИО</td>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <td>Cфера работы</td>
                    <td>
                      @if ($user->profile->section_id == 0)
                        Не указан
                      @else
                        {{ $user->profile->section->title }}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Город</td>
                    <td>
                      @if ($user->profile->city_id == 0)
                        Не указан
                      @else
                        {{ $user->profile->city->title }}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Адрес работы</td>
                    <td>{{ $user->profile->address }}</td>
                  </tr>
                  <tr>
                    <td>Навыки</td>
                    <td>{{ $user->profile->skills }}</td>
                  </tr>
                  <tr>
                    <td>Телефон</td>
                    <td>{{ $user->profile->phone }}</td>
                  </tr>
                  <tr>
                    <td>Веб-сайт</td>
                    <td>{{ $user->profile->website }}</td>
                  </tr>
                  <tr>
                    <td>Рейтинг</td>
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
              <p>
                <a href="/my_profile/edit" class="btn btn-default">Заполнить профиль</a>
                <a href="/profile/{{ $user->profile->id }}" class="btn btn-info">Как видят меня другие?</a>
              </p>
            </div>
          </div>
        </div>
      </div>
@endsection
