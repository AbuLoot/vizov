@extends('layout')

@section('content')
      <div class="content-block">
        <h3 class="col-md-offset-2">Разместить услугу</h3>

        <div class="row">
          <div class="col-md-8">

            <form action="{{ route('posts.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                  <div class="row">
                    @include('partials.alerts')
                  </div>
                </div>

                <label for="title" class="col-md-3">Заголовок объявления *</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="title" name="title" minlength="5" maxlength="80" value="{{ old('title') }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="section" class="col-md-3">Рубрика</label>
                <div class="col-md-9">
                  <div class="row">
                    <select class="form-control" name="section_id" id="section">
                      <optgroup label="Услуги вызова">
                        @foreach ($section as $item)
                          @if ($item->service_id == 1)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                      <optgroup label="Услуги ремонта">
                        @foreach ($section as $item)
                          @if ($item->service_id == 2)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="price" class="col-md-3">Цена *</label>
                <div class="col-md-9">
                  <div class="row">
                    <div class="input-group">
                      <input type="text" class="form-control" id="price" name="price" maxlength="10" value="{{ old('price') }}" required>
                      <div class="input-group-addon">тг</div>
                    </div>
                    <div class="check">
                      <br>
                      <label>
                        <input type="checkbox" id="deal" name="deal"> Договорная цена
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="price" class="col-md-3">Описание</label>
                <div class="col-md-9">
                  <div class="row">
                    <textarea class="form-control" id="description" name="description" rows="3" maxlength="2000">{{ old('description') }}</textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="price" class="col-md-3">Фотографии<br><br> <small class="text-muted">Объявления<br> с фотографиями привлекают клиентов<br> на 80% больше</small></label>
                <div class="col-md-9">
                  <div class="row">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                      <div>
                        <span class="btn btn-default btn-sm btn-file">
                          <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                          <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                          <input type="file" name="images[]" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                      </div>
                    </div>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                      <div>
                        <span class="btn btn-default btn-sm btn-file">
                          <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                          <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                          <input type="file" name="images[]" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                      </div>
                    </div>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                      <div>
                        <span class="btn btn-default btn-sm btn-file">
                          <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                          <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                          <input type="file" name="images[]" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                      </div>
                    </div>
                    <p class="btn btn-link btn-sm" id="btn-toggle">
                      <i class="glyphicon glyphicon-plus"></i> Больше
                    </p>
                    <div id="fileinput-part">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                        <div>
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                            <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                            <input type="file" name="images[]" accept="image/*">
                          </span>
                          <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                        </div>
                      </div>

                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                        <div>
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                            <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                            <input type="file" name="images[]" accept="image/*">
                          </span>
                          <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                        </div>
                      </div>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                        <div>
                          <span class="btn btn-default btn-sm btn-file">
                            <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                            <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                            <input type="file" name="images[]" accept="image/*">
                          </span>
                          <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <h4>Контактная информация</h4>
              <br>
              <div class="form-group">
                <label for="city" class="col-md-3">Город</label>
                <div class="col-md-9">
                  <div class="row">
                    <select class="form-control" name="city_id" id="city">
                      @foreach ($cities as $city)
                        @if ($city->id === $user->profile->city_id)
                          <option value="{{ $city->id }}" selected>{{ $city->title }}</option>
                        @else
                          <option value="{{ $city->id }}">{{ $city->title }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-md-3">Адрес</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="address" name="address" maxlength="80" value="{{ (old('address')) ? old('address') : $user->profile->address }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-md-3">Телефон</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="tel" class="form-control" id="phone" name="phone" minlength="5" maxlength="40" value="{{ (old('phone')) ? old('phone') : $user->profile->phone }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-3">Email</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="email" class="form-control" id="email" name="email" maxlength="40" value="{{ (old('email')) ? old('email') : $user->email }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="comment" class="col-md-3">Разрешить комментарии *</label>
                <div class="col-md-9">
                  <div class="row">
                    <select class="form-control" id="comment" name="comment">
                      <option value="all">Всем</option>
                      <option value="nobody">Никому</option>
                      <option value="registered_users">Только зарегистрированным пользователям</option>
                    </select>
                    <br>
                    <p>Размещая объявления на сайте, вы соглашаетесь с <a href="#">этими правилами</a>.</p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                  <div class="row">
                    <button type="submit" class="btn btn-primary">Разместить объявление</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection

@section('styles')
  <link href="/bower_components/jasny-bootstrap/dist/css/fileinput.min.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="/bower_components/jasny-bootstrap/js/fileinput.js"></script>
  <script src="/bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
  <script src="/bower_components/bootstrap/dist/js/custom.js"></script>
@endsection