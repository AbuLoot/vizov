@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_menu')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="content-block">
              @include('partials.alerts')
              <h3>Мой отзывы</h3>
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody>
                    @foreach ($profile->comments as $comment)
                      <tr>
                        <td style="width:110px">{{ $comment->name }}</td>
                        <td>
                          <small class="text-muted">{{ $comment->created_at }}</small><br>
                          {{ $comment->comment }}<br>
                          Оценка:
                          <span>
                            @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $comment->stars)
                                <i class="glyphicon glyphicon-star text-success"></i>
                              @else
                                <i class="glyphicon glyphicon-star text-muted"></i>
                              @endif
                            @endfor
                          </span>
                        </td>
                        <td style="width:100px">
                          <form method="POST" action="/my_reviews/{{ $comment->id }}" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-block btn-default btn-xs" onclick="return confirm('Удалить объявление?')"><i class="fa fa-minus"></i> Скрыть</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
