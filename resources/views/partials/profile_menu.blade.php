        <div class="panel panel-default">
          <div class="panel-body">
              <img src="bower_components/bootstrap/dist/img/1.jpg" class="img-responsive">
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