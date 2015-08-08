@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_avatar')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="content-block">
              @include('partials.alerts')
              <h3>{{ $profile->user->name }}</h3>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <tr>
                    <td width="170">Email</td>
                    <td>{{ $profile->user->email }}</td>
                  </tr>
                  <tr>
                    <td>ФИО</td>
                    <td>{{ $profile->user->name }}</td>
                  </tr>
                  <tr>
                    <td>Cфера работы</td>
                    <td>{{ ($profile->section_id == 0) ? 'Не указан' : $profile->section->title }}</td>
                  </tr>
                  <tr>
                    <td>Город</td>
                    <td>{{ ($profile->city_id == 0) ? 'Не указан' : $profile->city->title }}</td>
                  </tr>
                  <tr>
                    <td>Адрес работы</td>
                    <td>{{ $profile->address }}</td>
                  </tr>
                  <tr>
                    <td>Навыки</td>
                    <td>{{ $profile->skills }}</td>
                  </tr>
                  <tr>
                    <td>Телефон</td>
                    <td>{{ $profile->phone }}</td>
                  </tr>
                  <tr>
                    <td>Веб-сайт</td>
                    <td>{{ $profile->website }}</td>
                  </tr>
                  <tr>
                    <td>Рейтинг</td>
                    <td>
                      @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $profile->stars)
                          <i class="glyphicon glyphicon-star text-success"></i>
                        @else
                          <i class="glyphicon glyphicon-star text-muted"></i>
                        @endif
                      @endfor
                    </td>
                  </tr>
                </table>
              </div>

              <ul class="nav nav-tabs">
                <li class="@if (old('id')) NULL @else active @endif"><a href="#posts" data-toggle="tab"><i class="fa fa-th-list"></i> Все объявления</a></li>
                <li class="@if (old('id')) active @endif"><a href="#reviews" data-toggle="tab"><i class="fa fa-comments"></i> Отзывы</a></li>
              </ul>
              <br>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade @if (old('id')) NULL @else active in @endif" id="posts">
                  @forelse ($posts as $post)
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
                        <p>{{ $post->city->title }}<br> {{ $post->section->title }}</p>
                        <p>
                          <small>{{ $post->created_at }}</small> | <small>{{ $post->views }} просмотров</small> | <small>Комментарии: {{ $post->comments->count() }}</small>
                        </p>
                      </div>
                    </div>
                    <hr>
                  @empty
                    <h4>Нет объявлений.</h4>
                  @endforelse
                </div>
                <div class="tab-pane fade @if (old('id')) active in @endif" id="reviews">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <i class="fa fa-comments"></i> Отзывов: {{ $profile->comments->count() }}
                    </div>
                    <div class="panel-body">
                      @foreach ($profile->comments as $comment)
                        <b>{{ $comment->name }}</b> &nbsp;&nbsp;&nbsp; <small class="text-muted">{{ $comment->created_at }}</small><br>
                        {{ $comment->comment }}<br>
                        Оценка:
                        <span>
                          @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $comment->stars)
                              <i class="glyphicon glyphicon-star text-success"></i>
                            @else
                              <i class="glyphicon glyphicon-star text-muted"></i>
                            @endif
                          @endfor
                        </span><hr>
                      @endforeach
                    </div>
                  </div>

                  <div class="well">
                    <h4>Добавить отзыв</h4><br>
                    <form action="/review" method="POST" class="form-horizontal">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                      <input name="id" type="hidden" value="{{ $profile->id }}">
                      <input name="type" type="hidden" value="profile">
                      <div class="form-group">
                        <label for="name" class="col-md-2">Ваше имя</label>
                        <div class="col-md-10">
                          <input type="text" class="form-control input-sm" id="name" name="name" minlength="3" maxlength="60" placeholder="Введите имя" value="{{ old('name') }}" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-md-2">Email адрес</label>
                        <div class="col-md-10">
                          <input type="email" class="form-control input-sm" id="email" name="email" minlength="8" maxlength="60" placeholder="Введите email" value="{{ old('email') }}" required>
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
                        <label for="comment" class="col-md-2">Оценка услуги</label>
                        <div class="col-md-10">
                          <label>
                            <input type="radio" name="stars" value="1">
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                          </label><br>
                          <label>
                            <input type="radio" name="stars" value="2">
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                          </label><br>
                          <label>
                            <input type="radio" name="stars" value="3">
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                          </label><br>
                          <label>
                            <input type="radio" name="stars" value="4">
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-muted"></i>
                          </label><br>
                          <label>
                            <input type="radio" name="stars" value="5">
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                            <i class="glyphicon glyphicon-star text-success"></i>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
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
