@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              @include('partials.alerts')
              <p class="text-right">
                <a href="/admin/users/create" class="btn btn-success btn-sm">Добавить</a>
              </p>
              <div class="table-responsive">
                <table class="table table-striped table-condensed table-hover">
                  <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Город</th>
                    <th>ip</th>
                    <th>Статус</th>
                    <th class="text-right">Функции</th>
                  </tr>
                  <?php $i = 1; ?>
                  @forelse ($profiles as $profile)
                    <tr>
                      <td><b>{{ $i++ }}</b></td>
                      <td><a href="/profile/{{ $profile->id }}" target="_blank">{{ $profile->user->name }}</a></td>
                      <td>{{ $profile->user->email }}</td>
                      <td>{{ ($profile->city_id == 0) ? 'Не указан' : $profile->city->title }}</td>
                      <td>{{ $profile->user->ip }}</td>
                      @if ($profile->user->status == 1)
                        <td class="success">Активен</td>
                      @else
                        <td class="danger">Неактивен</td>
                      @endif
                      <td class="text-right">
                        <a class="btn btn-primary btn-xs" href="{{ route('admin.users.show', $profile->id) }}" title="Просмотр профиля"><span class="fa fa-file"></span></a>
                        <a class="btn btn-primary btn-xs" href="{{ route('admin.users.edit', $profile->id) }}" title="Редактировать"><span class="fa fa-edit"></span></a>
                        <form method="POST" action="{{ route('admin.users.destroy', $profile->user->id) }}" accept-charset="UTF-8" class="btn-delete" title="Удалить">
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
            </div>
          </div>
        </div>
      </div>
@endsection
