@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-9">
          <div class="row-left">
            <div class="panel panel-default">
              <div class="panel-body">
                <h2>Все специалисты сервиса VIZOV.KZ</h2>
                @foreach ($profiles as $profile)
                  <div class="media">
                    <div class="media-left">
                      <a href="/profile/{{ $profile->id }}">
                        @if (empty($profile->avatar))
                          <img src="/img/no-avatar.png" class="media-object" alt="..." style="width:90px">
                        @else
                          <img src="/img/users/{{ $profile->user->id . '/' . $profile->avatar }}" class="media-object" alt="..." style="width:90px">
                        @endif
                      </a>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading"><a href="/profile/{{ $profile->id }}">{{ $profile->user->name }}</a></h5>
                      <p>{{ ($profile->section_id == 0) ? 'Не указан' : $profile->section->title }}</p>
                      <div>
                        @for ($i = 1; $i <= 5; $i++)
                          @if ($i <= $profile->stars)
                            <i class="glyphicon glyphicon-star text-success"></i>
                          @else
                            <i class="glyphicon glyphicon-star text-muted"></i>
                          @endif
                        @endfor
                      </div>
                    </div>
                  </div>
                @endforeach

                {!! $profiles->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
