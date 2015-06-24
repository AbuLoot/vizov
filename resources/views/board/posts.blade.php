@extends('layout')

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="content-block">
            <div class="well">
              <form class="form-inline">
                <div class="form-group">
                  <label>Цена&nbsp;</label>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="from" placeholder="от">
                  </div>
                  <label>-</label>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="to" placeholder="до">
                    <div class="input-group-addon">тг</div>
                  </div>
                  <div class="checkbox">
                    <label>
                      &nbsp;<input type="checkbox"> Только с фото&nbsp;
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Показать</button>
                </div>
              </form>
            </div>
            <ol class="breadcrumb">
              @foreach ($breadcrumbs as $breadcrumb)
              <li><a href="#">{{ $service }}</a></li>
              <li class="active">{{  }}</li>
            </ol>
            @foreach ($posts as $post)
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="{{ $post->images }}" alt="..." width="200">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading">{{ $post->title }}</h3>
                  <p>{{ $post->description }}</p>
                </div>
              </div>
              <br>
            @endforeach

            {!! $posts->render() !!}
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row-right">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Топ по рейтингу</h3>
            </div>
            <div class="panel-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="bower_components/bootstrap/dist/img/1.jpg" alt="..." width="90">
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading">Arman Batyr</h5>
                  <p>Ремонт бытовой техники</p>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="bower_components/bootstrap/dist/img/2.jpg" alt="..." width="90">
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading">Arman Batyr</h5>
                  <p>Ремонт бытовой техники</p>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="bower_components/bootstrap/dist/img/3.jpg" alt="..." width="90">
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading">Arman Batyr</h5>
                  <p>Ремонт бытовой техники</p>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="bower_components/bootstrap/dist/img/4.jpg" alt="..." width="90">
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading">Arman Batyr</h5>
                  <p>Ремонт бытовой техники</p>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="bower_components/bootstrap/dist/img/5.jpg" alt="..." width="90">
                  </a>
                </div>
                <div class="media-body">
                  <h5 class="media-heading">Arman Batyr</h5>
                  <p>Ремонт бытовой техники</p>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star text-success"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                  <i class="glyphicon glyphicon-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection