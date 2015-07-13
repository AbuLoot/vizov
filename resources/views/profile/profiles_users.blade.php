@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-9">
          <div class="row-left">
            <div class="content-block">
              <h2>Все пользователи сервиса VIZOV.KZ</h2>
              @foreach ($profiles as $profile)
                <div class="panel-body">
                  <div class="media">
                    <div class="media-left">
                      <a href="/profile/{{ $profile->id }}">
                        @if (empty($profile->avatar))
                          <img src="/img/no-avatar.png" class="media-object" alt="..." width="90">
                        @else
                          <img src="/img/users/{{ $profile->user->id . '/' . $profile->avatar }}" class="media-object" alt="..." width="90">
                        @endif
                      </a>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading"><a href="/profile/{{ $profile->id }}">{{ $profile->user->name }}</a></h5>
                      <p>{{ $profile->section->title }}</p>
                      <i class="glyphicon glyphicon-star text-success"></i>
                      <i class="glyphicon glyphicon-star text-success"></i>
                      <i class="glyphicon glyphicon-star"></i>
                      <i class="glyphicon glyphicon-star"></i>
                      <i class="glyphicon glyphicon-star"></i>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-3">
          
        </div>
      </div>
@endsection
