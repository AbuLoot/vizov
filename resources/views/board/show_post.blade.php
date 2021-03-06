@extends('layout')

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="content-block">
            <ol class="breadcrumb">
              <li><a href="{{ route(trans('services.'.$post->section->service_id.'.route')) }}">{{ trans('services.'.$post->section->service_id.'.title') }}</a></li>
              <li><a href="{{ route('show-call', ['section' => $post->section->slug, 'id' => $post->section->id]) }}">{{ $post->section->title }}</a></li>
            </ol>
            <div class="media">
              <h3 class="media-heading">{{ $post->title }}</h3>
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
                <h4><a href="/profile/{{ $post->user->profile->id }}"><b>{{ $post->user->name }}</b></a></h4>
                <div class="table-responsive">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>Цена</th>
                        <td class="text-success"><b>{{ $post->price }} тг  @if ($post->deal == 'on') (Торг&nbsp;возможен) @endif</b></td>
                      </tr>
                      <tr>
                        <th>Регион</th>
                        <td>{{ $post->city->title }}</td>
                      </tr>
                      <tr>
                        <th>Адрес</th>
                        <td>{{ $post->address }}</td>
                      </tr>
                      <tr>
                        <th>Телефоны</th>
                        <td>{{ $post->phone }}</td>
                      </tr>
                      <tr>
                        <th>Электронная почта</th>
                        <td>{{ $post->email }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <br>
              <p>{{ $post->description }}</p>
              <p>
                <small class="space-right">{{ $post->created_at }}</small>
                <small><i class="glyphicon glyphicon-user"></i> 0 просмотров</small>
              </p>
            </div>

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
            <br>

            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="glyphicon glyphicon-comment"></i> Комментарии: 3
              </div>
              <div class="panel-body">
                <b class="space-right">Arman</b> <small>Опубликовано 6 мая 2015 г. <a href="#">Ответить</a></small>
                <p>Cras sit amet nibh libero, in gravida nulla.</p>
                <b class="space-right">Arman</b> <small>Опубликовано 6 мая 2015 г. <a href="#">Ответить</a></small>
                <p>Cras sit amet nibh libero, in gravida nulla.</p>
                <b class="space-right">Arman</b> <small>Опубликовано 6 мая 2015 г. <a href="#">Ответить</a></small>
                <p>Cras sit amet nibh libero, in gravida nulla.</p>
              </div>
            </div>

            <div class="well">
              <h4>Добавить комментарий</h4><br>
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="name" class="col-md-2">Ваше имя</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" id="name" placeholder="Введите имя">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-md-2">Email адрес</label>
                  <div class="col-md-8">
                    <input type="email" class="form-control input-sm" id="email" placeholder="Введите email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="comment" class="col-md-2">Сообщение</label>
                  <div class="col-md-8">
                    <textarea rows="4" class="form-control" id="comment"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-offset-2 col-md-8">
                    <button type="submit" class="btn btn-default btn-sm">Добавить</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row-right">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Топ по рейтингу</h3>
            </div>
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
            <div class="panel-footer"><a href="/profiles">Все пользователи</a></div>
          </div>
        </div>
      </div>
@endsection