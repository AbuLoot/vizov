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
                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
                @include('partials.errors')
                <form action="/my_profile/{{ $user->profile->id }}" method="post" role="form">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control input-sm" name="email" id="email" minlength="8" maxlength="60" value="{{ $user->email }}" required disabled>
                  </div>
                  <div class="form-group">
                    <label for="name">Ваше ФИО:</label>
                    <input type="text" class="form-control input-sm" name="name" id="name" minlength="3" maxlength="60" value="{{ $user->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">В какой сфере вы работаете:</label>
                    <select class="form-control input-sm" name="section_id" id="section">
                      <option value="0">Выберите рубрику</option>
                      <optgroup label="Услуги вызова">
                        <option value="1">Вскрытие замков</option>
                        <option value="2">Клининговые услуги</option>
                        <option value="3">Образовательные услуги</option>
                        <option value="4">Услуги няни</option>
                        <option value="5">Услуги перевозчика</option>
                        <option value="6">Услуги сантехника</option>
                        <option value="7">Услуги плотника</option>
                        <option value="8">Услуги электрика</option>
                      </optgroup>
                      <optgroup label="Услуги ремонта">
                        <option value="9">Ремонт авто</option>
                        <option value="10">Ремонт бытовой техники</option>
                        <option value="11">Ремонт домов и квартир</option>
                        <option value="12">Ремонт обуви</option>
                        <option value="13">Ремонт одежды</option>
                        <option value="14">Ремонт и реставрация мебели</option>
                        <option value="15">Химчистка</option>
                      </optgroup>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">В каком городе вы работаете:</label>
                    <select class="form-control input-sm" name="city_id" id="city">
                      @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">Контакты (телефон):</label>
                    <input type="tel" class="form-control input-sm" name="phone" id="phone" maxlength="40" placeholder="Номер телефона" value="{{ $user->profile->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="skills">Навыки:</label>
                    <input type="text" class="form-control input-sm" name="skills" id="skills" placeholder="Какими навыками вы владете" value="{{ $user->profile->skills }}">
                  </div>
                  <div class="form-group">
                    <label for="website">Веб-сайт:</label>
                    <input type="text" class="form-control input-sm" name="website" id="website" placeholder="Веб-сайт" maxlength="80" value="{{ $user->profile->website }}">
                  </div>
                  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span> Сохранить</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection