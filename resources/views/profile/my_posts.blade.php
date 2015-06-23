@extends('layout')

@section('content')
      <div class="row">
        <div class="col-md-3">
          @include('partials.profile_menu')
        </div>
        <div class="col-md-9">
          <div class="row-left thumbnail">
            <div class="caption">
              <h3>Мои объявления</h3>
            </div>
          </div>
        </div>
      </div>
@endsection