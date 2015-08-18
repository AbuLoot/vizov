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
                        <img class="media-object" src="/img/posts/{{ $post->user_id.'/'.$post->image }}" alt="{{ $post->title }}" style="width:200px">
                      @else
                        <img class="media-object" src="/img/no-main-image.png" alt="{{ $post->title }}" style="width:200px">
                      @endif
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row">
                      <div class="col-md-8">
                        <h4 class="media-heading post-title-fix">
                          <a href="{{ route('show-post-call', ['post' => $post->slug, 'id' => $post->id]) }}">{{ $post->title }}</a>
                        </h4>
                        <p class="text-gray">
                          {{ $post->city->title }} / <b>{{ $post->section->title }}</b><br>
                          <small>{{ $post->created_at }} &nbsp; <i class="fa fa-smile-o"></i>  {{ $post->views }} &nbsp; <i class="fa fa-comments-o"></i> {{ $post->comments->count() }}</small>
                        </p>
                      </div>
                      <div class="col-md-4">
                        <h4 class="media-heading text-right text-success">{{ $post->price }} тг @if ($post->deal == 'on') <br><small>Торг&nbsp;возможен</small> @endif</h4>
                        <br>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-block btn-primary btn-xs"><i class="fa fa-edit"></i> Редактировать</a>
                        <p></p>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" accept-charset="UTF-8">
                          <input name="_method" type="hidden" value="DELETE">
                          <input name="_token" type="hidden" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-block btn-danger btn-xs" onclick="return confirm('Удалить объявление?')"><span class="fa fa-times"></span> Удалить</button>
                        </form>
                      </div>
                    </div>
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
