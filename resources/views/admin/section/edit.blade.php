@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="content-block">
        <div class="row">
          <div class="col-md-8">
            <h3 class="col-md-offset-3">Редактирование</h3>
            <form action="{{ route('admin.section.update', $item->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              <input name="_method" type="hidden" value="PUT">
              {!! csrf_field() !!}
              <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                  <div class="row">
                    @include('partials.alerts')
                  </div>
                </div>

                <label for="title" class="col-md-3">Заголовок рубрики</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="title" name="title" minlength="5" maxlength="80" value="{{ (old('title')) ? old('title') : $item->title }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="slug" class="col-md-3">Slug</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="slug" name="slug" minlength="5" maxlength="80" value="{{ (old('slug')) ? old('slug') : $item->slug }}" disabled>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="title_description" class="col-md-3">Мета название</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="title_description" name="title_description" minlength="5" maxlength="80" value="{{ (old('title_description')) ? old('title_description') : $item->title_description }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="meta_description" class="col-md-3">Мета описание</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="meta_description" name="meta_description" minlength="5" maxlength="80" value="{{ (old('meta_description')) ? old('meta_description') : $item->meta_description }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="text" class="col-md-3">Текст</label>
                <div class="col-md-9">
                  <div class="row">
                    <textarea class="form-control" id="text" name="text" rows="3" maxlength="2000">{{ (old('text')) ? old('text') : $item->text }}</textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="price" class="col-md-3">Картинка</label>
                <div class="col-md-9">
                  <div class="row">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail" style="width: 185px; height: 120px;">
                        <img src="/img/section/{{ $item->image }}">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
                      <div>
                        <span class="btn btn-default btn-sm btn-file">
                          <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Изменить</span>
                          <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                          <input type="file" name="image" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="lang" class="col-md-3">Язык</label>
                <div class="col-md-9">
                  <div class="row">
                    <select class="form-control" id="lang" name="lang">
                      <option value="kz">KZ</option>
                      <option value="ru">RU</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-md-3">Статус</label>
                <div class="col-md-9">
                  <div class="row">
                    <label>
                      @if ($item->status == 1)
                        <input type="checkbox" id="status" name="status" checked> Активен
                      @else
                        <input type="checkbox" id="status" name="status"> Неактивен
                      @endif
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                  <div class="row">
                    <button type="submit" class="btn btn-primary">Обновить рубрику</button>
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
