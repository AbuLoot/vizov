@extends('layout')

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="content-block">
            <div class="well well-modified well-sm hidden-xs">
              <form action="/filter" class="form-inline">
                <input type="hidden" name="section_id" value="{{ (isset($section)) ? $section->id : null }}">
                <table class="table-condensed">
                  <tr>
                    <td style="width:55px">Город</td>
                    <td style="width:160px">
                      <select class="form-control input-sm" name="city_id">
                        @foreach($cities as $city)
                          @if ($city->id === Request::input('city_id'))
                            <option value="{{ $city->id }}" selected>{{ $city->title }}</option>
                          @else
                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                          @endif
                        @endforeach
                      </select>
                    </td>
                    <td style="width:195px">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="image" @if (Request::input('image')) checked @endif> Только с фото
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Цена</td>
                    <td>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="from" placeholder="от" value="{{ (Request::input('from')) ? Request::input('from') : NULL }}">
                      </div>
                    </td>
                    <td>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="to" placeholder="до" value="{{ (Request::input('to')) ? Request::input('to') : NULL }}">
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

            @if (isset($section))
              <ol class="breadcrumb">
                <li><a href="{{ route($section->service->route) }}">{{ $section->service->title }}</a></li>
                <li class="active">{{ $section->title }}</li>
              </ol>
            @endif

            @if (isset($text))
              <h3>Результат поиска «{{ $text }}»</h3>
            @endif

            @forelse ($posts as $post)
              <div class="media">
                <div class="media-left">
                  <a href="{{ url($post->service_id.'/'.$post->slug.'/'.$post->id) }}">
                    @if ( ! empty($post->image))
                      <img class="media-object" src="/img/posts/{{ $post->user_id.'/'.$post->image }}" alt="{{ $post->title }}" style="width:20px0">
                    @else
                      <img class="media-object" src="/img/no-main-image.png" alt="{{ $post->title }}" style="width:20px0">
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
              <h4>Ничего не найдено.</h4>
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
            <div class="panel-body">
              @foreach ($profiles as $profile)
                <div class="media">
                  <div class="media-left">
                    <a href="/profile/{{ $profile->id }}">
                      @if (empty($profile->avatar))
                        <img src="/img/no-avatar.png" class="media-object" alt="..." style="width:90px">
                      @else
                        <img src="/img/users/{{ $profile->user->id . '/' . $profile->avatar }}" class="media-object" alt="..." style="width:90px">
                      @endif
                    </a>
                  </div>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="/profile/{{ $profile->id }}">{{ $profile->user->name }}</a></h5>
                    <p>{{ $profile->section->title }}</p>
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $profile->stars)
                        <i class="glyphicon glyphicon-star text-success"></i>
                      @else
                        <i class="glyphicon glyphicon-star text-muted"></i>
                      @endif
                    @endfor
                  </div>
                </div>
              @endforeach
            </div>
            <div class="panel-footer"><a href="/profiles">Все специалисты</a></div>
          </div>
        </div>
      </div>
@endsection