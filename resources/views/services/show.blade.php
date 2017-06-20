@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Просмотр задания</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="/">На главную</a>
                          </li>
                          <li><a href="/services">Задания</a>
                          </li>
                          <li>Просмотр задания</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
<div id="content">
        <div class="container">

            <div class="row">

                <!-- *** LEFT COLUMN ***
  _________________________________________________________ -->

                <div class="col-md-9" id="blog-post">
                    <p class="text-muted text-uppercase mb-small text-right">Автор <a href="/users">{{ $service->author->name }}</a> | {{ $service->created_at->diffForHumans() }}</p>
                    <p class="text-muted text-uppercase mb-small text-right"> <a href="#">{{ $service->subcategory->category->name}}</a> > <a href="#">{{ $service->subcategory->name }}</a></p>

                        <div id="post-content">

                        <h2>{{ $service->head }}
                          <span class="price-icon pull-right">{{ $service->price }} руб.</span>
                        </h2>
                        Нужно:
                        <p>{{ $service->text }}</p>
                        статус:   <p>{{ $service->stateservice->name }}</p>

                        @if ( $service->stateservice->id ==2)
                        <div class="form-group pull-right">
                          <form action="/services/state/{{$service->id}}" method="post">
                          {{ csrf_field() }}
                          <button class="btn btn-default pull-left" type="submit">Закрыть задачу</button>
                          </form>
                        </div>
                        <br>
                        @endif
                    </div>
                    <!-- /#post-content -->

                    <div id="comments">
                        <h4 class="text-uppercase">Предложения исполнителей</h4>
                        @if(Role::check_service($service))
                          @if ( count($comments) == 0 )
                          На ваше задание еще никто не откликнулся
                          @endif
                            @foreach ($comments as $comment)

                              @if(($service->stateservice->id ==2 || $service->stateservice->id ==3) && $service->executor->id == $comment->user->id)
                                <div class=" executor-comment row comment">
                                  <div class="col-sm-3 col-md-2 text-center-xs">
                                      <p>
                                          <img src="{{ $comment->user->photo }}" class="img-responsive img-circle" alt="">
                                      </p>
                                  </div>
                                  <div class="col-sm-9 col-md-10">
                                      <h5 class="text-uppercase">{{ $comment->user->name }}
                                          <i>  - Ваш Исполнитель</i>
                                          <span class="price-icon pull-right">{{ $comment->price }} руб.</span>
                                      </h5>
                                      <p class="posted"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</p>
                                      <p>{{ $comment->text }}</p>
                                  </div>
                              </div>
                              @else
                                  <div class="row comment">
                                    <div class="col-sm-3 col-md-2 text-center-xs">
                                        <p>
                                            <img src="{{ $comment->user->photo }}" class="img-responsive img-circle" alt="">
                                        </p>
                                    </div>
                                    <div class="col-sm-9 col-md-10">
                                        <h5 class="text-uppercase">{{ $comment->user->name }}
                                            <span class="price-icon pull-right">   {{ $comment->price }} руб.</span>
                                        </h5>
                                        <p class="posted"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</p>
                                        <p>{{ $comment->text }}</p>
                                    </div>
                                          @if ( $service->stateservice->id ==1)
                                      <form action="/services/executor/{{$service->id}}/{{$comment->user->id}}" method="post">
                                          {{ csrf_field() }}
                                          <button class="btn btn-default" type="submit">Назначить исполнителем</button>
                                      </form>
                                      @endif
                                    </div>

                        @endif

                        @endforeach
                        <!-- /.comment -->
                        @else
                        <p>
                            Предложения исполнителей может видеть только заказчик
                        </p>
                        @endif
                    </div>
                    <!-- /#comments -->

                    @if ( $service->stateservice->id ==1 && !Role::check_service($service) )
                    <div id="comment-form">
                        <h4 class="text-uppercase">Откликнуться на задание</h4>
                        <form action="/services/{{ $service->id }}/comment" method="POST">
                          {{ csrf_field() }}


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text">Комментарий</label>
                                        <textarea name="text" id="text" class="form-control"  rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-sm-6 col-md-6">
                                  <label for="price"></label>
                                      <input class="form-control" type="text" id="price" name="price" placeholder="Предложите свою цену">
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-template-main"><i class="fa fa-comment-o"></i> Откликнуться</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    @endif

                    <!-- /#comment-form -->


                </div>
                <!-- /#blog-post -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
    _________________________________________________________ -->

                <div class="col-md-3">

                    <!-- *** MENUS AND WIDGETS ***
_________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Text widget</h3>
                        </div>

                        <div class="panel-body text-widget">
                            <p>Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage mr be. Hold do at tore in park feet near my case.
                            </p>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Search</h3>
                        </div>

                        <div class="panel-body">
                            <form role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

</span>
                                </div>
                            </form>
                        </div>
                    </div>

                    @includeIf('questions.partials.categories')


                    <div class="panel sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="tag-cloud">
                                <li><a href="#"><i class="fa fa-tags"></i> html5</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> css3</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> jquery</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> ajax</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> php</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> responsive</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> visio</a>
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> bootstrap</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                </div>
                <!-- /.col-md-3 -->

                <!-- *** RIGHT COLUMN END *** -->


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->












<script>
$(function() {
//    $('#deleteBtn').click(function(event) {
//        if (confirm("Действительно хотите удалить этот тип?")) {
//            event.preventDefault();
//            document.getElementById('destroy-form').submit();
//        }
//    });
});
</script>
@stop
