@extends('layout')

@section('content')
    <div class="row">
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/s32.png" class="img-responsive center-block" alt="Вскрытие замков">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/vskrytie-zamkov/1">Вскрытие замков</a></h4>
          </div>
        </div>
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/l202.png" class="img-responsive center-block" alt="Клининговые услуги">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/kliningovye-uslugi/2">Клининговые услуги</a></h4>
          </div>
        </div>
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/g260.png" class="img-responsive center-block" alt="Образовательные услуги">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/obrazovatelnye-uslugi/3">Образовательные услуги</a></h4>
          </div>
        </div>
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/b35.png" class="img-responsive center-block" alt="Услуги няни">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/uslugi-nyani/4">Услуги няни</a></h4>
          </div>
        </div>
          </div>
    <br>
      <div class="row">
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/x8.png" class="img-responsive center-block" alt="Услуги перевозчика">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/uslugi-perevozchika/5">Услуги перевозчика</a></h4>
          </div>
        </div>
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/l144.png" class="img-responsive center-block" alt="Услуги сантехника">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/uslugi-santekhnika/6">Услуги сантехника</a></h4>
          </div>
        </div>
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/q15.png" class="img-responsive center-block" alt="Услуги плотника">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/uslugi-plotnika/7">Услуги сборочно плотницкие</a></h4>
          </div>
        </div>
              <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/board/w40.png" class="img-responsive center-block" alt="Услуги электрика">
            <h4 class="text-center"><a href="http://localhost:8888/uslugi_vyzova/uslugi-elektrika/8">Услуги электрика</a></h4>
          </div>
        </div>
          </div>
    <br>
<!--   @foreach ($sections->chunk(4) as $chunk)
    <div class="row">
      @foreach ($chunk as $section)
        <div class="col-md-3">
          <div class="service-block">
            <img src="/img/section/{{ $section->image }}" class="img-responsive center-block" alt="{{ $section->title }}">
            <h4 class="text-center"><a href="{{ route('call') . '/' . $section->slug . '/' . $section->id }}">{{ $section->title }}</a></h4>
          </div>
        </div>
      @endforeach
    </div>
    <br>
  @endforeach -->
@endsection