@extends('layout')

@section('content')
  @foreach ($sections->chunk(4) as $chunk)
    <div class="row">
      @foreach ($chunk as $section)
        <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/{{ $section->image }}" class="img-responsive center-block" alt="{{ $section->title }}">
            <h5 class="text-center"><a href="{{ url($section->service->slug.'/'.$section->slug.'/'.$section->id) }}">{{ $section->title }}</a></h5>
          </div>
        </div>
      @endforeach
    </div>
    <br>
  @endforeach
@endsection