@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              @include('partials.alerts')
              <p class="text-right">
                <a href="/admin/section/create" class="btn btn-success btn-sm">Добавить</a>
              </p>
              <div class="table-responsive">
                <table class="table-admin table table-striped table-condensed">
                  <tr>
                    <th>№</th>
                    <th>Номер</th>
                    <th>Картинка</th>
                    <th>Название</th>
                    <th>Услуга</th>
                    <th>Статус</th>
                    <th class="text-right">Функции</th>
                  </tr>
                  <?php $i = 1; ?>
                  @forelse ($section as $item)
                    <tr>
                      <td><b>{{ $i++ }}</b></td>
                      <td>{{ $item->sort_id }}</td>
                      <td><img src="/img/section/{{ $item->image }}" width="64"></td>
                      <td><a href="{{ url($item->service->slug.'/'.$item->slug.'/'.$item->id) }}" target="_blank">{{ $item->title }}</a></td>
                      <td>{{ trans('services.'.$item->service_id.'.title') }}</td>
                      @if ($item->status == 1)
                        <td class="success">Активен</td>
                      @else
                        <td class="danger">Неактивен</td>
                      @endif
                      <td class="text-right">
                        <a class="btn btn-primary btn-xs" href="{{ url(trans('services.'.$item->service_id.'.slug').'/'.$item->slug.'/'.$item->id) }}" title="Просмотр страницы" target="_blank"><span class="fa fa-file"></span></a>
                        <a class="btn btn-primary btn-xs" href="{{ route('admin.section.edit', $item->id) }}" title="Редактировать"><span class="fa fa-edit"></span></a>
                        <form method="POST" action="{{ route('admin.section.destroy', $item->id) }}" accept-charset="UTF-8" class="btn-delete">
                          <input name="_method" type="hidden" value="DELETE">
                          <input name="_token" type="hidden" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Удалить запись ({{ $item->title }})?')"><span class="fa fa-times"></span></button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4">Нет записи</td>
                    </tr>
                  @endforelse
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection