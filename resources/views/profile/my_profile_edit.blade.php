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
                <h3 class="panel-title">Редактирование профиля</h3>
              </div>
              <div class="panel-body">
                @include('partials.alerts')
                <form action="/my_profile/{{ $user->profile->user_id }}" method="post" enctype="multipart/form-data">
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
                    <label for="phone">В какой сфере вы работаете:</label>
                    <select class="form-control" name="section_id" id="section">
                      <option value="0">Выберите рубрику</option>
                      <optgroup label="Услуги вызова">
                        @foreach ($section as $item)
                          @if ($item->service_id == 1)
                            @if ($item->id == $user->profile->section_id)
                              <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
                            @else
                              <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endif
                          @endif
                        @endforeach
                      </optgroup>
                      <optgroup label="Услуги ремонта">
                        @foreach ($section as $item)
                          @if ($item->service_id == 2)
                            @if ($item->id == $user->profile->section_id)
                              <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
                            @else
                              <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endif
                          @endif
                        @endforeach
                      </optgroup>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">В каком городе вы работаете:</label>
                    <select class="form-control" name="city_id" id="city">
                      @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="address">Адрес вашей работы:</label>
                    <input type="text" class="form-control" name="address" id="address" maxlength="200" placeholder="Адрес" value="{{ $user->profile->address }}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Контакты (телефон):</label>
                    <input type="tel" class="form-control" name="phone" id="phone" maxlength="40" placeholder="Номер телефона" value="{{ $user->profile->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="skills">Навыки:</label>
                    <input type="text" class="form-control" name="skills" id="skills" placeholder="Какими навыками вы владете" value="{{ $user->profile->skills }}">
                  </div>
                  <div class="form-group">
                    <label for="website">Веб-сайт:</label>
                    <input type="text" class="form-control" name="website" id="website" placeholder="Веб-сайт" maxlength="80" value="{{ $user->profile->website }}">
                  </div>
                  <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if(empty($user->profile->avatar))
                          <img src="/img/no-avatar.png">
                        @else
                          <img src="/img/users/{{ $user->profile->id . '/' . $user->profile->avatar }}">
                        @endif
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                      <div>
                        <span class="btn btn-default btn-sm btn-file"><span class="fileinput-new">Выберите картинку</span><span class="fileinput-exists">Изменить</span><input type="file" name="avatar" accept="image/*"></span>
                        <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput">Удалить</a>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Сохранить</button>
                </form>
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