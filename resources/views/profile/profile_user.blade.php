@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_avatar')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="content-block">
              <h3>{{ $profile->user->name }}</h3>
              @include('partials.alerts')
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Email:</th>
                    <td>{{ $profile->user->email }}</td>
                  </tr>
                  <tr>
                    <th>ФИО:</th>
                    <td>{{ $profile->user->name }}</td>
                  </tr>
                  <tr>
                    <th>Cфера работы:</th>
                    <td>
                      @if ($profile->section_id == 0)
                        Не указан
                      @else
                        {{ $profile->section->title }}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Город:</th>
                    <td>
                      @if ($profile->city_id == 0)
                        Не указан
                      @else
                        {{ $profile->city->title }}
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Адрес работы:</th>
                    <td>{{ $profile->address }}</td>
                  </tr>
                  <tr>
                    <th>Навыки:</th>
                    <td>{{ $profile->skills }}</td>
                  </tr>
                  <tr>
                    <th>Телефон:</th>
                    <td>{{ $profile->phone }}</td>
                  </tr>
                  <tr>
                    <th>Веб-сайт:</th>
                    <td>{{ $profile->website }}</td>
                  </tr>
                  <tr>
                    <th>Рейтинг:</th>
                    <td>
                      <i class="glyphicon glyphicon-star text-success"></i>
                      <i class="glyphicon glyphicon-star text-success"></i>
                      <i class="glyphicon glyphicon-star text-success"></i>
                      <i class="glyphicon glyphicon-star text-muted"></i>
                      <i class="glyphicon glyphicon-star text-muted"></i>
                    </td>
                  </tr>
                </table>
              </div>

              <ul class="nav nav-tabs">
                <li class="active"><a href="#posts" data-toggle="tab"><i class="fa fa-th-list"></i> Все объявления</a></li>
                <li><a href="#reviews" data-toggle="tab"><i class="fa fa-comments"></i> Отзывы</a></li>
              </ul>
              <br>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="posts">
                  @forelse ($profile->user->posts as $post)
                    <div class="media">
                      <div class="media-left">
                        <a href="{{ route('show-post-call', ['post' => $post->slug, 'id' => $post->id]) }}">
                          @if ( ! empty($post->image))
                            <img class="media-object" src="/img/posts/{{ $post->user_id.'/'.$post->image }}" alt="{{ $post->title }}" width="200">
                          @else
                            <img class="media-object" src="/img/no-main-image.png" alt="{{ $post->title }}" width="200">
                          @endif
                        </a>
                      </div>
                      <div class="media-body">
                        <div class="row">
                          <h4 class="col-md-8 media-heading">
                            <a href="{{ route('show-post-call', ['post' => $post->slug, 'id' => $post->id]) }}">
                              <b>{{ $post->title }}</b>
                            </a>
                          </h4>
                          <h4 class="col-md-4 media-heading text-right text-success"><b>{{ $post->price }} тг</b></h4>
                        </div>
                        <p>
                          <b>Город:</b> {{ $post->city->title }}<br>
                          <b>Рубрика:</b> {{ $post->section->title }}
                        </p>
                        <p>
                          <small class="space-right">{{ $post->created_at }}</small>
                          <small><i class="glyphicon glyphicon-user"></i> 26 просмотров</small>
                        </p>
                      </div>
                    </div>
                    <hr>
                  @empty
                    <h4>Нет объявлений.</h4>
                  @endforelse
                </div>
                <div class="tab-pane fade" id="reviews">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="fa fa-comments"></i> Комментарии: 3
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
          </div>
        </div>
      </div>
@endsection
