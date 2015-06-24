@extends('layout')

@section('content')
  @foreach ($sections->chunk(4) as $chunk)
    <div class="row">
      @foreach ($chunk as $section)
        <div class="col-md-3">
          <div class="service-block">
            <img src="bower_components/bootstrap/dist/img/Icons/{{ $section->image }}" class="img-responsive center-block" alt="{{ $section->title }}">
            <h4 class="text-center"><a href="{{ route('call') . '/' . $section->slug . '/' . $section->id }}">{{ $section->title }}</a></h4>
          </div>
        </div>
      @endforeach
    </div>
    <br>
  @endforeach
@endsection