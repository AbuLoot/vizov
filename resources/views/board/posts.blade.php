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
              <li><a href="#">Услуги вызова</a></li>
              <li class="active">Вскрытие замков</li>
            </ol>
            <ul class="nav nav-pills">
              <li class="active"><a href="#"><i class="glyphicon glyphicon-calendar"></i> По дате</a></li>
              <li><a href="#">По цене</a></li>
            </ul>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="bower_components/bootstrap/dist/img/1.jpg" alt="..." width="200">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Middle aligned media</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <p class="text-right">
                  <button class="btn btn-primary btn-sm">Посмотреть</button>
                </p>
              </div>
            </div>
            <hr>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="bower_components/bootstrap/dist/img/1.jpg" alt="..." width="200">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Middle aligned media</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <p class="text-right">
                  <button class="btn btn-primary btn-sm">Посмотреть</button>
                </p>
              </div>
            </div>
            <hr>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="bower_components/bootstrap/dist/img/1.jpg" alt="..." width="200">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Middle aligned media</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <p class="text-right">
                  <button class="btn btn-primary btn-sm">Посмотреть</button>
                </p>
              </div>
            </div>
            <hr>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="bower_components/bootstrap/dist/img/1.jpg" alt="..." width="200">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Middle aligned media</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <p class="text-right">
                  <button class="btn btn-primary btn-sm">Посмотреть</button>
                </p>
              </div>
              <ul class="pagination">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
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