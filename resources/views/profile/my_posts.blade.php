@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_menu')
        </div>
        <div class="col-md-9">
          <div class="row-left">
            <div class="content-block">
              <h3>Мои объявления</h3>
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
                      <h5 class="col-md-6 media-heading">
                        <a href="{{ route('show-post-call', ['post' => $post->slug, 'id' => $post->id]) }}">
                          <b>{{ $post->title }}</b>
                        </a>
                      </h5>
                      <h4 class="col-md-3 media-heading text-right text-success"><b>{{ $post->price }} тг</b> @if ($post->deal == 'on') Торг&nbsp;возможен @endif</h4>
                      <div class="col-md-3 text-right">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Редактировать</a>
                        <p></p>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" accept-charset="UTF-8">
                          <input name="_method" type="hidden" value="DELETE">
                          <input name="_token" type="hidden" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Удалить объявление?')"><span class="fa fa-times"></span> Удалить</button>
                        </form>
                      </div>
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
                <h4>У вас пока нет объявлений.</h4>
                <a href="{{ route('posts.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Добавить объявление</a>
              @endforelse
            </div>
          </div>
        </div>
      </div>
@endsection