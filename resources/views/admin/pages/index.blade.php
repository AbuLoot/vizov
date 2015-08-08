@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="content-block">
        <div class="row">
          <div class="col-md-12">
            @include('partials.alerts')
            <p class="text-right">
              <a href="/admin/pages/create" class="btn btn-success btn-sm">Добавить страницу</a>
            </p>
            <div class="table-responsive">
              <table class="table-admin table table-striped table-condensed">
                <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th>Номер</th>
                  <th>Статус</th>
                  <th class="text-right">Функции</th>
                </tr>
                <?php $i = 1; ?>
                @forelse ($pages as $page)
                  <tr>
                    <td><b>{{ $i++ }}</b></td>
                    <td><a href="{{ url($page->slug) }}" target="_blank">{{ $page->title }}</a></td>
                    <td>{{ $page->sort_id }}</td>
                    @if ($page->status == 1)
                      <td class="success">Активен</td>
                    @else
                      <td class="danger">Неактивен</td>
                    @endif
                    <td class="text-right">
                      <a class="btn btn-primary btn-xs" href="{{ url($page->slug) }}" title="Просмотр страницы" target="_blank"><span class="fa fa-file"></span></a>
                      <a class="btn btn-primary btn-xs" href="{{ route('admin.pages.edit', $page->id) }}" title="Редактировать"><span class="fa fa-edit"></span></a>
                      <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}" accept-charset="UTF-8" class="btn-delete">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Удалить запись ({{ $page->title }})?')"><span class="fa fa-times"></span></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5">Нет записи</td>
                  </tr>
                @endforelse
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection