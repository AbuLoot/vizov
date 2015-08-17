@extends('layout')

@section('content')
  @foreach ($sections->chunk(4) as $chunk)
    <div class="row">
      @foreach ($chunk as $section)
        <div class="col-md-3">
          <div class="service-block">
            <a href="{{ url($section->service->slug.'/'.$section->slug.'/'.$section->id) }}" class="center-block text-center">
              <img src="/img/section/{{ $section->image }}" class="img-responsive center-block" alt="{{ $section->title }}">
              <h5>{{ $section->title }}</h5>
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <br>
  @endforeach
@endsection