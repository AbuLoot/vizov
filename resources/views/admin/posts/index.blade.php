@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              @include('partials.alerts')
              <p class="text-right">
                <a href="#" class="btn btn-success btn-sm">Добавить</a>
              </p>
              <div class="table-responsive">
                <table class="table table-striped table-condensed table-hover">
                  <tr>
                    <th>№</th>
                    <th>Рубрика</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Номер</th>
                    <th>Статус</th>
                    <th class="text-right">Функции</th>
                  </tr>
                  <?php $i = 1; ?>
                  @forelse ($posts as $post)
                    <tr>
                      <td><b>{{ $i++ }}</b></td>
                      <td>{{ $post->section->title }}</td>
                      <td><a href="{{ url($post->service_id.'/'.$post->slug.'/'.$post->id) }}" target="_blank">{{ $post->title }}</a></td>
                      <td class="text-nowrap">{{ $post->price }} тг</td>
                      <td>{{ $post->sort_id }}</td>
                      @if ($post->status == 1)
                        <td class="success">Активен</td>
                      @else
                        <td class="danger">Неактивен</td>
                      @endif
                      <td class="text-nowrap text-right">
                        <a class="btn btn-primary btn-xs" href="{{ url($post->service_id.'/'.$post->slug.'/'.$post->id) }}" title="Просмотр объявления" target="_blank"><span class="fa fa-file"></span></a>
                        <a class="btn btn-primary btn-xs" href="{{ route('admin.pages.edit', $post->id) }}" title="Редактировать"><span class="fa fa-edit"></span></a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}" accept-charset="UTF-8" class="btn-delete">
                          <input name="_method" type="hidden" value="DELETE">
                          <input name="_token" type="hidden" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Удалить запись?')"><span class="fa fa-times"></span></button>
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

              {!! $posts->render() !!}
            </div>
          </div>
        </div>
      </div>
@endsection
