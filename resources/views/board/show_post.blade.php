@extends('layout')

@section('content')
      <div class="col-md-8">
        <div class="row">
          <div class="content-block">
            <ol class="breadcrumb">
              <li><a href="{{ route('call') }}">{{ trans('words.uslugi_vyzova') }}</a></li>
              <li><a href="{{ route('show-call', ['section' => $post->section->slug, 'id' => $post->section->id]) }}">{{ $post->section->title }}</a></li>
              <li class="active">{{ $post->title }}</li>
            </ol>
            <div class="media">
                <h3 class="media-heading">{{ $post->title }}</h3>
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="{{ $post->images }}" alt="{{ $post->title }}" width="300">
                </a>
              </div>
              <div class="media-body">
                <h4>{{ $post->user->name }}</h4>
                <div class="table-responsive">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>Цена</th>
                        <td class="text-success"><b>{{ $post->price }} (Договорная цена)</b></td>
                      </tr>
                      <tr>
                        <th>Регион</th>
                        <td>{{ $post->city->title }}</td>
                      </tr>
                      <tr>
                        <th>Адрес</th>
                        <td>{{ $post->address }}</td>
                      </tr>
                      <tr>
                        <th>Телефоны</th>
                        <td>{{ $post->phone }}</td>
                      </tr>
                      <tr>
                        <th>Рейтинг</th>
                        <td>
                          <i class="glyphicon glyphicon-star text-info"></i>
                          <i class="glyphicon glyphicon-star text-info"></i>
                          <i class="glyphicon glyphicon-star text-muted"></i>
                          <i class="glyphicon glyphicon-star text-muted"></i>
                          <i class="glyphicon glyphicon-star text-muted"></i>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <hr>
              <p>{{ $post->description }}</p>
              <p>
                <small class="space-right">{{ $post->created_at }} Опубликовано 6 мая 2015 г.</small>
                <small><i class="glyphicon glyphicon-user"></i> 26 просмотров</small>
              </p>
            </div>

            <div class="col-md-10">
              <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="bower_components/bootstrap/dist/img/1.jpg" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="bower_components/bootstrap/dist/img/2.jpg" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="bower_components/bootstrap/dist/img/3.jpg" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="bower_components/bootstrap/dist/img/4.jpg" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="bower_components/bootstrap/dist/img/5.jpg" class="img-responsive">
                    </div>
                    <div class="item">
                      <img src="bower_components/bootstrap/dist/img/6.jpg" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 gallery">
              <ol class="row-right list-unstyled pull-right">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                  <a href="#" class="">
                    <img src="bower_components/bootstrap/dist/img/1.jpg" class="img-responsive" width="95">
                  </a>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class="">
                  <a href="#" class="">
                    <img src="bower_components/bootstrap/dist/img/2.jpg" class="img-responsive" width="95">
                  </a>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class="active">
                  <a href="#" class="">
                    <img src="bower_components/bootstrap/dist/img/3.jpg" class="img-responsive" width="95">
                  </a>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="3" class="">
                  <a href="#" class="">
                    <img src="bower_components/bootstrap/dist/img/4.jpg" class="img-responsive" width="95">
                  </a>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="4" class="active">
                  <a href="#" class="">
                    <img src="bower_components/bootstrap/dist/img/5.jpg" class="img-responsive" width="95">
                  </a>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="5" class="">
                  <a href="#" class="">
                    <img src="bower_components/bootstrap/dist/img/6.jpg" class="img-responsive" width="95">
                  </a>
                </li>
              </ol>
            </div>
            <div class="clearfix"></div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="glyphicon glyphicon-comment"></i> Комментарии: 3
              </div>
              <div class="panel-body">
                <b class="space-right">Arman</b> <small>Опубликовано 6 мая 2015 г. <a href="#">Ответить</a></small>
                <p>Cras sit amet nibh libero, in gravida nulla.</p>
                <b class="space-right">Arman</b> <small>Опубликовано 6 мая 2015 г. <a href="#">Ответить</a></small>
                <p>Cras sit amet nibh libero, in gravida nulla.</p>
                <b class="space-right">Arman</b> <small>Опубликовано 6 мая 2015 г. <a href="#">Ответить</a></small>
                <p>Cras sit amet nibh libero, in gravida nulla.</p>
              </div>
            </div>

            <!-- <div class="panel panel-default">
              <div class="panel-heading">Добавить комментарий</div>
              <div class="panel-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="name" class="col-md-2">Ваше имя</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-sm" id="name" placeholder="Введите имя">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-2">Email адрес</label>
                    <div class="col-md-8">
                      <input type="email" class="form-control input-sm" id="email" placeholder="Введите email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="comment" class="col-md-2">Сообщение</label>
                    <div class="col-md-8">
                      <textarea rows="4" class="form-control" id="comment"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-8">
                      <button type="submit" class="btn btn-default btn-sm">Добавить</button>
                    </div>
                  </div>
                </form>
              </div>
            </div> -->

            <div class="well">
              <h4>Добавить комментарий</h4><br>
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="name" class="col-md-2">Ваше имя</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control input-sm" id="name" placeholder="Введите имя">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-md-2">Email адрес</label>
                  <div class="col-md-8">
                    <input type="email" class="form-control input-sm" id="email" placeholder="Введите email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="comment" class="col-md-2">Сообщение</label>
                  <div class="col-md-8">
                    <textarea rows="4" class="form-control" id="comment"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-offset-2 col-md-8">
                    <button type="submit" class="btn btn-default btn-sm">Добавить</button>
                  </div>
                </div>
              </form>
            </div>
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