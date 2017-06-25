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

                <div class="col-md-9" id="blog-post">
                    <p class="text-muted text-uppercase mb-small text-right">Автор <a href="/users/{{ $service->author->id }}">{{ $service->author->name }}</a> | {{ $service->created_at->diffForHumans() }}</p>
                    <p class="text-muted text-uppercase mb-small text-right"> <a href="#">{{ $service->subcategory->category->name}}</a> > <a href="#">{{ $service->subcategory->name }}</a></p>

                        <div id="post-content">

                        <h2>{{ $service->head }}
                          <span class="price-icon pull-right">{{ $service->price }} руб.</span>
                        </h2>
                        <h4>Нужно:</h4>
                        <p>{{ $service->text }}</p>
                        <div class="clearfix text-left" >
                          <p class="">  <h4>Начало:</h4>
                            <a href="#">{{ $service->t_start }}</a>
                          </p>
                          <p class=""><h4>Окончание:</h4>
                            <a href="#">{{ $service->t_finish}}</a>
                          </p>
                        </div>
                        статус:   <p>{{ $service->stateservice->name }}</p>
                        @if ( ($service->stateservice->id ==2 || $service->stateservice->id ==1)&& Role::check_service($service))
                        <span class="form-group pull-right">
                          <form action="/services/state/{{$service->id}}" method="post">
                          {{ csrf_field() }}
                          <button class="btn btn-default pull-left" type="submit">Закрыть задачу</button>
                          </form>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                        </span>

                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="exampleModalLabel">Завершение задачи</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="POST" action="/services/{{$service->id}}/review_author">
                                        {{ csrf_field() }}
                                      <label for="text" class="control-label">Ваша задача выполнена?</label>
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-default">
                                              <input type="radio" id="state" name="state" value="3" /> Да
                                          </label>
                                          <label class="btn btn-default">
                                              <input type="radio" id="state" name="state" value="4" /> Нет
                                          </label>
                                      </div>
                                    <div class="form-group">
                                      <label for="text" class="control-label">Отзыв</label>
                                      <textarea id="text"  class="form-control" name="text" placeholder="" ></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label for="bkey1"> <h4>Качество</h4></label>
                                      <span  id="bkey1">

                                          <input id="key11" type="radio" name="key1"value="1"/>
                                          <label title="очень плохо" for="star-0"></label>
                                          <input id="key12" type="radio" name="key1"value="2"/>
                                          <label title="плохо" for="star-1"></label>
                                          <input id="key13" type="radio" name="key1"value="3"/>
                                          <label title="удовлетворительно" for="star-2"></label>
                                          <input id="key14" type="radio" name="key1"value="4"/>
                                          <label title="хорошо" for="star-3"></label>
                                          <input id="key15" type="radio" name="key1" value="5"/>
                                          <label title="отлично" for="star-4"></label>

                                      </span>
                                  </div>
                                  <div class="form-group">
                                    <label for="bkey1"> <h4>Вежливость</h4></label>
                                    <span  id="bkey1">


                                      <input id="key21" type="radio" name="key2"value="1"/>
                                      <label title="очень плохо" for="star-0"></label>
                                      <input id="key22" type="radio" name="key2"value="2"/>
                                      <label title="плохо" for="star-1"></label>
                                      <input id="key23" type="radio" name="key2"value="3"/>
                                      <label title="удовлетворительно" for="star-2"></label>

                                      <input id="key24" type="radio" name="key2" value="4"/>
                                      <label title="хорошо" for="star-3"></label>
                                      <input id="key25" type="radio" name="key2" value="5"/>
                                      <label title="отлично" for="star-4"></label>


                                    </span>
                                </div>
                                <div class="form-group">
                                  <label for="bkey1"> <h4>Цена</h4></label>
                                  <span  id="bkey1">


                                    <input id="key31" type="radio" name="key3"value="1"/>
                                    <label title="очень плохо" for="star-0"></label>
                                    <input id="key32" type="radio" name="key3"value="2"/>
                                    <label title="плохо" for="star-1"></label>
                                    <input id="key33" type="radio" name="key3"value="3"/>
                                    <label title="удовлетворительно" for="star-2"></label>
                                    <input id="key34" type="radio" name="key3"value="4"/>
                                    <label title="хорошо" for="star-3"></label>
                                    <input id="key35" type="radio" name="key3" value="5"/>
                                    <label title="отлично" for="star-4"></label>

                                  </span>
                              </div>

                                    <br>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                      <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endif
                        <br>
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
                                      <p>Рейтинг: <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        {{$comment->user->rating_ex}} <span></span></p>
                                  </div>
                                  <div class="col-sm-9 col-md-10">
                                      <h5 class="text-uppercase"><a href="/users/{{ $comment->user->id }}"> {{ $comment->user->name }}</a><i>  - Ваш Исполнитель</i>
                                          <span class="price-icon pull-right">   {{ $comment->price }} руб.</span>
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
                                        <p>Рейтинг: <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                          {{$comment->user->rating_ex}} <span></span></p>
                                    </div>
                                    <div class="col-sm-9 col-md-10">
                                        <h5 class="text-uppercase"><a href="/users/{{ $comment->user->id }}"> {{ $comment->user->name }}</a>
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
                </div>

                <div class="col-md-3">

                    @includeIf('services.partials.categories')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
});
</script>
@stop
