@extends('layout')

@section('content')
      @include('partials.admin_menu')
      <div class="content-block">
        <div class="row">
          <div class="col-md-12">
            @include('partials.alerts')
            <p class="text-right">
              <a href="/admin/users/create" class="btn btn-success btn-sm">Добавить пользователя</a>
            </p>
            <div class="table-responsive">
              <table class="table table-striped table-condensed table-hover">
                <tr>
                  <th>№</th>
                  <th>Имя</th>
                  <th>Email</th>
                  <th>ip</th>
                  <th class="text-right">Функции</th>
                </tr>
                <?php $i = 1; ?>
                @forelse ($users as $user)
                  <tr>
                    <td><b>{{ $i++ }}</b></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->ip }}</td>
                    <td class="text-right">
                      <a class="btn btn-primary btn-xs" href="/profile/{{ $user->id }}" title="Просмотр профиля" target="_blank"><span class="fa fa-file"></span></a>
                      <a class="btn btn-primary btn-xs" href="{{ route('admin.users.edit', $user->id) }}" title="Редактировать"><span class="fa fa-edit"></span></a>
                      <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" accept-charset="UTF-8" class="btn-delete">
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
@endsection