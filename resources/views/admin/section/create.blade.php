@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-8">
              <h3>Создание рубрики</h3>
              <form action="{{ route('admin.section.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group">
                  <div class="col-md-offset-3 col-md-9">
                    @include('partials.alerts')
                  </div>

                  <label for="sort_id" class="col-md-3">Номер</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="sort_id" name="sort_id" maxlength="5" value="{{ (old('sort_id')) ? old('sort_id') : NULL }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="service_id" class="col-md-3">Услуги</label>
                  <div class="col-md-9">
                    <select class="form-control" id="service_id" name="service_id">
                      @foreach (trans('services') as $key => $service)
                        <option value="{{ $key }}">{{ $service['title'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="title" class="col-md-3">Заголовок рубрики</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="title" name="title" minlength="5" maxlength="80" value="{{ (old('title')) ? old('title') : '' }}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="slug" class="col-md-3">Slug</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="slug" name="slug" minlength="5" maxlength="80" value="{{ (old('slug')) ? old('slug') : '' }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-md-3">Картинка</label>
                  <div class="col-md-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 185px; height: 120px;"></div>
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
                <div class="form-group">
                  <label for="title_description" class="col-md-3">Мета название</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="title_description" name="title_description" maxlength="255" value="{{ (old('title_description')) ? old('title_description') : '' }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="meta_description" class="col-md-3">Мета описание</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="meta_description" name="meta_description" maxlength="255" value="{{ (old('meta_description')) ? old('meta_description') : '' }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-md-3">Текст</label>
                  <div class="col-md-9">
                    <textarea class="form-control" id="text" name="text" rows="3" maxlength="2000">{{ (old('text')) ? old('text') : '' }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="status" class="col-md-3">Статус</label>
                  <div class="col-md-9">
                    <label>
                      <input type="checkbox" id="status" name="status" checked> Активен
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">Создать рубрику</button>
                  </div>
                </div>
              </form>
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
  <script src="/bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
  <script src="/bower_components/bootstrap/dist/js/custom.js"></script>
@endsection
