@extends('layout')

@section('content')
  <div class="panel panel-default">
    <div class="panel-body">
      <h3>{{ $page->title }}</h3>
      <p>{{ $page->text }}</p>
    </div>
  </div>
@endsection