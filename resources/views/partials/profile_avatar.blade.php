        <div class="panel panel-default">
          <div class="panel-body">
            @if (empty($profile->avatar))
              <img src="/img/no-avatar.png" class="img-responsive">
            @else
              <img src="/img/users/{{ $profile->user->id . '/' . $profile->avatar }}" class="img-responsive">
            @endif
            <h5 class="text-center">{{ $profile->user->name }}</h5>
          </div>
          <div class="panel-footer"><a href="/profiles">Все пользователи</a></div>
        </div>