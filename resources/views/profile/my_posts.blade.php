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
                      <img class="media-object" src="/img/posts/{{ $post->user_id.'/'.$post->image }}" alt="..." width="200">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row">
                      <h4 class="col-md-7 media-heading">
                        <a href="{{ route('show-post-call', ['post' => $post->slug, 'id' => $post->id]) }}">
                          <b>{{ $post->title }}</b>
                        </a>
                      </h4>
                      <h4 class="col-md-3 media-heading text-right text-success"><b>{{ $post->price }} тг</b></h4>
                      <div class="col-md-2">
                        <a href="{{ route('posts.edit', $post->id) }}">
                          <b>Edit</b>
                        </a>
                      </div>
                    </div>
                    <p>{{ $post->city->title }}</p>

                    <p>
                      <small class="space-right">{{ $post->created_at }} | Опубликовано 6 мая 2015 г.</small>
                      <small><i class="glyphicon glyphicon-user"></i> 26 просмотров</small>
                    </p>
                  </div>
                </div>
                <br>
              @empty
                <h4>У вас пока нет объявлений.</h4>
                <a href="{{ route('posts.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Добавить объявление</a>
              @endforelse
            </div>
          </div>
        </div>
      </div>
@endsection