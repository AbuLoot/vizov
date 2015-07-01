
        <ul class="nav nav-tabs nav-justified">
          <li @if (Request::is('admin/users')) class="active" @endif><a href="/admin/users">Пользователи</a></li>
          <li @if (Request::is('admin/section')) class="active" @endif><a href="/admin/section">Рубрики</a></li>
          <li @if (Request::is('admin/posts')) class="active" @endif><a href="/admin/posts">Объявления</a></li>
          <li @if (Request::is('admin/my_profile')) class="active" @endif><a href="#">Мой профиль</a></li>
          <li @if (Request::is('admin/my_settings')) class="active" @endif><a href="#">Настройки</a></li>
          <li><a href="/auth/logout">Выход</a></li>
        </ul>