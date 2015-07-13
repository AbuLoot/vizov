@extends('layout')

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="content-block">
            <div class="well well-sm hidden-xs">
              <form action="/filter" class="form-inline">
                <input type="hidden" name="section_id" value="{{ $section->id }}">
                <table class="table-condensed">
                  <tr>
                    <th>Город</th>
                    <td>
                      <select class="form-control input-sm" name="city_id">
                        @foreach(\App\City::all() as $city)
                          <option value="{{ $city->id }}">{{ $city->title }}</option>
                        @endforeach
                      </select>
                      <div class="checkbox">
                        <label>
                          &nbsp;&nbsp;&nbsp;<input type="checkbox" name="image"> Только с фото
                        </label>
                      </div>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Цена</th>
                    <td>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="from" placeholder="от">
                      </div>
                      <label>-</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="to" placeholder="до">
                        <div class="input-group-addon">тг</div>
                      </div>
                    </td>
                    <td>
                      <button type="submit" class="btn btn-primary btn-sm">Показать</button>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ route(trans('services.'.$section->service_id.'.route')) }}">{{ trans('services.'.$section->service_id.'.title') }}</a></li>
              <li class="active">{{ $section->title }}</li>
            </ol>
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
                    <h4 class="col-md-4 media-heading text-right text-success"><b>{{ $post->price }} тг</b> @if ($post->deal == 'on') Торг&nbsp;возможен @endif</h4>
                  </div>
                  <p>{{ $post->city->title }}</p>
                  <p>
                    <small><i class="glyphicon glyphicon-calendar"></i> {{ $post->created_at }}</small><br>
                    <small><i class="glyphicon glyphicon-user"></i> 26 просмотров</small>
                  </p>
                </div>
              </div>
              <br>
            @empty
              <h4>В этой рубрике пока нет объявлений.</h4>
              <a href="{{ route('posts.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Добавить объявление</a>
            @endforelse

            {!! $posts->render() !!}
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
                    <a href="#">
                      @if (empty($profile->avatar))
                        <img src="/img/no-avatar.png" class="media-object" alt="..." width="90">
                      @else
                        <img src="/img/users/{{ $profile->user->id . '/' . $profile->avatar }}" class="media-object" alt="..." width="90">
                      @endif
                    </a>
                  </div>
                  <div class="media-body">
                    <h5 class="media-heading">{{ $profile->user->name }}</h5>
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