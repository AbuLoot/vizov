
        <ul class="nav nav-pills nav-justified">
          <li @if (Request::is('admin/users')) class="active" @endif><a href="/admin/users">Пользователи</a></li>
          <li @if (Request::is('admin/section')) class="active" @endif><a href="/admin/section">Рубрики</a></li>
          <li @if (Request::is('admin/posts')) class="active" @endif><a href="/admin/posts">Объявления</a></li>
          <li @if (Request::is('admin/pages')) class="active" @endif><a href="/admin/pages">Страницы</a></li>
          <li @if (Request::is('admin/settings')) class="active" @endif><a href="/admin/settings">Настройки</a></li>
          <li><a href="/auth/logout">Выход</a></li>
        </ul>
