@extends('layout')

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="content-block">
            @include('partials.alerts')
            <ol class="breadcrumb">
              <li><a href="{{ route($post->section->service->route) }}">{{ $post->section->service->title }}</a></li>
              <li><a href="{{ route('show-call', ['section' => $post->section->slug, 'id' => $post->section->id]) }}">{{ $post->section->title }}</a></li>
            </ol>
            <div class="media">
              <h3 class="media-heading">{{ $post->title }}</h3><br>
              <div class="media-left">
                <?php 
                  if ( ! empty($post->images))
                    $images = unserialize($post->images);
                  else
                    $images = [];
                ?>
                @if ( ! empty($post->image))
                  <img class="media-object" src="/img/posts/{{ $post->user_id.'/'.$post->image }}" alt="{{ $post->title }}" width="300">
                @else
                  <img class="media-object" src="/img/no-main-image.png" alt="{{ $post->title }}" width="300">
                @endif
              </div>
              <div class="media-body">
                <h5>&nbsp;&nbsp;<i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<a href="/profile/{{ $post->user->profile->id }}">{{ $post->user->name }}</a></h5>
                <div class="table-responsive">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td>Цена</td>
                        <td class="text-success"><b>{{ $post->price }} тг  @if ($post->deal == 'on') | Торг&nbsp;возможен @endif</b></td>
                      </tr>
                      <tr>
                        <td>Город</td>
                        <td>{{ $post->city->title }}</td>
                      </tr>
                      <tr>
                        <td>Адрес</td>
                        <td>{{ $post->address }}</td>
                      </tr>
                      <tr>
                        <td>Телефоны</td>
                        <td>{{ $post->phone }}</td>
                      </tr>
                      <tr>
                        <td>Электронная почта</td>
                        <td>{{ $post->email }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <p>{{ $post->description }}</p>
              <p>
                <small>{{ $post->created_at }}</small> | <small>Просмотров: {{ $post->views }}</small>
              </p>
            </div>
            <br>

            <div class="col-md-10">
              <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                  <div class="carousel-inner" role="listbox">
                    <?php $i = 0; ?>
                    @foreach ($images as $key => $image)
                      @if ($i == 0)
                        <div class="item active">
                          <img src="/img/posts/{{ $post->user_id.'/'.$image['image'] }}" class="img-responsive">
                        </div>
                        <?php $i++; ?>
                      @else
                        <div class="item">
                          <img src="/img/posts/{{ $post->user_id.'/'.$image['image'] }}" class="img-responsive">
                        </div>
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 gallery">
              <ol class="row-right list-unstyled pull-right">
                <?php $i = 0; ?>
                @foreach ($images as $key => $image)
                  @if ($i == 0)
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                      <a href="#" class="">
                        <img src="/img/posts/{{ $post->user_id.'/'.$image['mini_image'] }}" class="img-responsive" width="95">
                      </a>
                    </li>
                    <?php $i++; ?>
                  @else
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="">
                      <a href="#" class="">
                        <img src="/img/posts/{{ $post->user_id.'/'.$image['mini_image'] }}" class="img-responsive" width="95">
                      </a>
                    </li>
                    <?php $i++; ?>
                  @endif
                @endforeach
              </ol>
            </div>
            <div class="clearfix"></div>

            @unless ($post->comment === 'nobody')
              <br>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="glyphicon glyphicon-comment"></i> Комментарии: {{ $post->comments->count() }}
                </div>
                <div class="panel-body">
                  @forelse ($post->comments as $comment)
                    <p>
                      <b>{{ $comment->name }}</b><br>
                      {{ $comment->comment }}<br>
                      <small>Опубликовано {{ $comment->created_at }}.</small>
                    </p>
                  @empty
                    <p>Комментарии отсутствуют</p>
                  @endforelse
                </div>
              </div>
            @endunless

            @if ($post->comment === 'nobody')
              <p>Комментарии к этому объявлению отключены.</p>
            @elseif ($post->comment === 'all' OR ($post->comment === 'registered_users' AND Auth::check()))
              <div class="well">
                <h4>Добавить комментарий</h4><br>
                <form action="/comment" method="POST" class="form-horizontal">
                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                  <input name="id" type="hidden" value="{{ $post->id }}">
                  <input name="type" type="hidden" value="post">
                  <div class="form-group">
                    <label for="name" class="col-md-2">Ваше имя</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control input-sm" id="name" name="name" minlength="3" maxlength="60" placeholder="Введите имя" value="{{ old('name') }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-2">Email адрес</label>
                    <div class="col-md-10">
                      <input type="email" class="form-control input-sm" id="email" name="email" minlength="8" maxlength="60" placeholder="Введите email" value="{{ old('eamil') }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="comment" class="col-md-2">Сообщение</label>
                    <div class="col-md-10">
                      <textarea rows="3" class="form-control" id="comment" name="comment" maxlength="2000" required>{{ old('comment') }}</textarea>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="captcha" class="col-md-2">Код</label>
                    <div class="col-md-10">
                      {!! captcha !!}
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" class="btn btn-default btn-sm">Добавить</button>
                    </div>
                  </div>
                </form>
              </div>
            @else
              <p>Только авторизованные пользователи могут оставлять комментарии</p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row-right">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Топ по рейтингу</h3>
            </div>
            <div class="panel-body">
              @foreach ($profiles as $profile)
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
              @endforeach
            </div>
            <div class="panel-footer"><a href="/profiles">Все специалисты</a></div>
          </div>
        </div>
      </div>
@endsection