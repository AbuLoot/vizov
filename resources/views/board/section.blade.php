@extends('layout')

@section('content')
  @foreach ($sections->chunk(6) as $chunk)
    <div class="row">
      @foreach ($chunk as $section)
        <div class="col-md-2 col-sm-4 col-xs-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <a href="{{ url($section->service->slug.'/'.$section->slug.'/'.$section->id) }}" class="center-block text-center">
                <img src="/img/section/{{ $section->image }}" class="center-block" alt="{{ $section->title }}" style="width: 64px;">
                <h5 class="section-title-fix">{{ $section->title }}</h5>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach
@endsection