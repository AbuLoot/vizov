@extends('layout')

@section('content')
  <div class="content-block">
    <h3>{{ $page->title }}</h3>
    <p>{{ $page->text }}</p>
  </div>
@endsection