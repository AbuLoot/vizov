@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="content-block">
        <div class="row">
          <div class="col-md-8">
            <h3 class="col-md-offset-3">Создание страницы</h3>
            <form action="{{ route('admin.pages.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                  <div class="row">
                    @include('partials.alerts')
                  </div>
                </div>

                <label for="sort_id" class="col-md-3">Номер</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="sort_id" name="sort_id" maxlength="5" value="{{ (old('sort_id')) ? old('sort_id') : NULL }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-md-3">Название</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="title" name="title" minlength="3" maxlength="60" value="{{ (old('title')) ? old('title') : '' }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="slug" class="col-md-3">Slug</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="slug" name="slug" minlength="3" maxlength="60" value="{{ (old('slug')) ? old('slug') : '' }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="title_description" class="col-md-3">Мета название</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="title_description" name="title_description" maxlength="255" value="{{ (old('title_description')) ? old('title_description') : '' }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="meta_description" class="col-md-3">Мета описание</label>
                <div class="col-md-9">
                  <div class="row">
                    <input type="text" class="form-control" id="meta_description" name="meta_description" maxlength="255" value="{{ (old('meta_description')) ? old('meta_description') : '' }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="text" class="col-md-3">Текст</label>
                <div class="col-md-9">
                  <div class="row">
                    <textarea class="form-control" id="text" name="text" rows="3" maxlength="2000">{{ (old('text')) ? old('text') : '' }}</textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-md-3">Статус</label>
                <div class="col-md-9">
                  <div class="row">
                    <label>
                      <input type="checkbox" id="status" name="status" checked> Активен
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                  <div class="row">
                    <button type="submit" class="btn btn-primary">Создать страницу</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection
