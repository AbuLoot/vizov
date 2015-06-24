        <div class="panel panel-default">
          <div class="panel-body">
            @if(empty(Auth::user()->profile->avatar))
              <img src="/img/no-avatar.png" class="img-responsive">
            @else
              <img src="/img/users/{{ Auth::user()->profile->id . '/' . Auth::user()->profile->avatar }}" class="img-responsive">
            @endif
            <h5>{{ Auth::user()->name }}</h5>
          </div>
          <div class="list-group">
            <a href="/my_posts" class="list-group-item @if(Request::is('my_posts')) active @endif">
              <span class="badge">14</span>
              Мои объявления
            </a>
            <a href="/my_profile" class="list-group-item @if(Request::is('my_profile')) active @endif">Мой профиль</a>
            <a href="/my_setting" class="list-group-item @if(Request::is('my_setting')) active @endif">Настройки</a>
            <a href="/auth/logout" class="list-group-item">Выход</a>
          </div>
        </div>