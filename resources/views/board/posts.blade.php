@extends('layout')

@section('title_description', $section->title_description)

@section('meta_description', $section->meta_description)

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="well well-modified well-sm hidden-xs">
                <form action="/filter">
                  <input type="hidden" name="section_id" value="{{ $section->id }}">
                  <table class="table-condensed">
                    <tbody>
                      <tr>
                        <td>Город</td>
                        <td>
                          <select class="form-control input-sm" name="city_id">
                            @foreach($cities as $city)
                              <option value="{{ $city->id }}">{{ $city->title }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="image"> Только с фото
                            </label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Цена</td>
                        <td>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="from" placeholder="от">
                          </div>
                        </td>
                        <td>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="to" placeholder="до">
                            <div class="input-group-addon">тг</div>
                          </div>
                        </td>
                        <td>
                          <button type="submit" class="btn btn-primary btn-sm">Показать</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
              <ol class="breadcrumb">
                <li><a href="{{ route($section->service->route) }}">{{ $section->service->title }}</a></li>
                <li class="active">{{ $section->title }}</li>
              </ol>
              @forelse ($posts as $post)
                <div class="media">
                  <div class="media-left">
                    <a href="{{ url($post->service_id.'/'.$post->slug.'/'.$post->id) }}">
                      @if ( ! empty($post->image))
                        <img class="media-object" src="/img/posts/{{ $post->user_id.'/'.$post->image }}" alt="{{ $post->title }}" style="width:200px">
                      @else
                        <img class="media-object" src="/img/no-main-image.png" alt="{{ $post->title }}" style="width:200px">
                      @endif
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row post-title-fix">
                      <h4 class="col-md-8 media-heading">
                        <a href="{{ url($post->service_id.'/'.$post->slug.'/'.$post->id) }}">{{ $post->title }}</a>
                      </h4>
                      <h4 class="col-md-4 media-heading text-right text-success">{{ $post->price }} тг @if ($post->deal == 'on') <small>Торг&nbsp;возможен</small> @endif</h4>
                    </div>
                    <p class="text-gray">{{ $post->city->title }}<br><small>{{ $post->created_at }} &nbsp; <i class="fa fa-smile-o"></i> {{ $post->views }} &nbsp; <i class="fa fa-comments-o"></i> {{ $post->comments->count() }}</small></p>
                  </div>
                </div><br>
              @empty
                <h4>В этой рубрике пока нет объявлений.</h4>
                <a href="{{ route('posts.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Добавить объявление</a>
              @endforelse

              {!! $posts->render() !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row-right">
          <div class="panel panel-default">
            <div class="panel-body">
              <h4>Топ по рейтингу</h4>
              @foreach ($profiles as $profile)
                <div class="media">
                  <div class="media-left">
                    <a href="/profile/{{ $profile->id }}">
                      @if (empty($profile->avatar))
                        <img src="/img/no-avatar.png" class="media-object" alt="..." style="width:90px">
                      @else
                        <img src="/img/users/{{ $profile->user->id.'/'.$profile->avatar }}" class="media-object" alt="..." style="width:90px">
                      @endif
                    </a>
                  </div>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="/profile/{{ $profile->id }}">{{ $profile->user->name }}</a></h5>
                    <p>{{ $profile->section->title }}</p>
                    <div>
                      @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $profile->stars)
                          <i class="glyphicon glyphicon-star text-success"></i>
                        @else
                          <i class="glyphicon glyphicon-star text-muted"></i>
                        @endif
                      @endfor
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="panel-footer"><a href="/profiles">Все специалисты</a></div>
          </div>
        </div>
      </div>
@endsection