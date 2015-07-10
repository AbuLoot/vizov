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
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <th>Ваше ФИО:</th>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <th>Cфера работы:</th>
                    <td>
                      @if ($user->profile->section_id == 0)
                        Не указан
                      @else
                        {{ $user->profile->section->title }}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Город:</th>
                    <td>
                      @if ($user->profile->city_id == 0)
                        Не указан
                      @else
                        {{ $user->profile->city->title }}
                      @endif
                    </td>
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
              <p>
                <a href="/my_profile/edit" class="btn btn-default">Заполнить профиль</a>
                <a href="/profile/{{ $user->profile->id }}" class="btn btn-info">Как видят меня другие?</a>
              </p>
            </div>
          </div>
        </div>
      </div>
@endsection
