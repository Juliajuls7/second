@extends('layouts.app')

@section('content')

@if (Role::check_account($user))

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Мой аккаунт</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="/">На главную</a>
                    </li>
                    <li>Мой аккаунт</li>
                </ul>
            </div>
        </div>
    </div>
</div>

  <div id="content" class="clearfix">
      <div class="container">
          <div class="row">
                  <div class="col-md-4">
                      <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                      <div class="panel panel-default sidebar-menu">

                          <div class="panel-heading">
                            <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <p>
                                          <img src="{{$user->photo}}" class="img-responsive " alt="">
                                        </p>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <h4>{{ $user->name }}</h4>
                                        <h4>{{ $user->surname }}</h4>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-sm-4 col-md-8">
                                      <p >Рейтинг исполнителя: <span>{{ $user->rating_ex }}</span></p>
                                      <p >Рейтинг заказчика: <span>{{ $user->rating}}</span></p>
                                    </div>
                                  </div>
                          </div>

                          <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                              <li >
                                  <a href="/users/{{$user->id}}"><i class="fa fa-user"></i> Мой аккаунт</a>
                              </li>
                              <li >
                                  <a href="/users/{{$user->id}}/works"><i class="fa fa-list"></i> Мои работы</a>
                              </li>
                              <li >
                                  <a href="/users/{{$user->id}}/services"><i class="fa fa-list"></i> Мои задачи</a>
                              </li>
                              <li class="active">
                                  <a href="/users/{{$user->id}}/reviews"><i class="fa fa-thumbs-o-up"></i> Отзывы заказчиков</a>
                              </li>
                              <li>
                                  <a href="/users/{{$user->id}}/reviews2"><i class="fa fa-thumbs-o-up"></i> Отзывы исполнителей</a>
                              </li>
                              <li >
                                  <a href="/users/{{$user->id}}/questions"><i class="fa fa-question-circle"></i>Вопросы и Ответы</a>
                              </li>
                              <li >
                                  <a href="/users/{{$user->id}}/articles"><i class="fa fa-file-text-o"></i>Статьи</a>
                              </li>
                              <li>
                                    <a href="/users/edit/{{$user->id}}"><i class="fa fa-cog"></i>Настройки </a>
                              </li>

                            </ul>
                          </div>
                      </div>
                      <!-- /.col-md-3 -->
                                    <!-- *** CUSTOMER MENU END *** -->
                  </div>

                                <!-- *** RIGHT COLUMN END *** -->
              <!-- *** LEFT COLUMN ***
 _________________________________________________________ -->

              <div class="col-md-8 clearfix" id="customer-account">
                <div class="">
                    <div class="heading">

                    </div>
                    <div class="row">
                      <div class="col-md-12" id="blog-listing-medium">
                        <section class="post">
                              <div class="row">

                              <hr>
                              <div class="form-group">
                                @foreach ($reviews as $review)

                                        <div class="col-sm-3 col-md-2 text-center-xs">

                                            <p >
                                               <img src="{{$review->ser_author->author->photo}}" class="img-responsive img-circle" alt="">
                                            </p>
                                            <p class="text-center">
                                              {{$review->ser_author->author->name}}</p>
                                        </div>

                                      <div class="col-md-10">
                                        <div class="row">
                                            <span class="form-group">
                                              Отзыв о задаче <a href="/services/{{$review->ser_author->id}}"> "{{$review->ser_author->head}}"</a>
                                              <span class="clearfix">
                                                  <span class="date-comments">
                                                      <a href="#"><i class="fa fa-calendar-o"></i>{{$review->created_at->diffForHumans()}} </a>
                                                 </span>
                                              </span>
                                            </span>

                                        </div>

                                        <div class="row">

                                          <p class="intro">

                                             <h4>{{$review->text}}</h4>
                                               <br>
                                               <p>Качество: <b> {{$review->key1}}</b> из 5</p>
                                               <p>Вежливость: <b>{{$review->key2}} </b>из 5</p>
                                               <p>Цена: <b> {{$review->key3}} </b>из 5</p>
                                          </p>
                                          @if($review->ser_author->review_executor == 0)
                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Написать отзыв о заказчике</button>


                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">Отзыв о заказчике</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form role="form" method="POST" action="/services/{{$review->ser_author->id}}/review_executor">
                                                          {{ csrf_field() }}

                                                      <div class="form-group">
                                                        <label for="text" class="control-label">Отзыв</label>
                                                        <textarea id="text"  class="form-control" name="text" placeholder="" ></textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="bkey1"> <h4>Цена</h4></label>
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
                                                      <label for="bkey1"> <h4>Оплата</h4></label>
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
                                                    <label for="bkey1"> <h4>Четкость поставленной задачи</h4></label>
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

                                          @else
                                          <h5>Вы оставили свой отзыв</h5>
                                          @endif
                                        </div>

                                          <hr>
                                      </div>
        <hr>
                                       @endforeach
                                </div>


                                </div>

                              </section>
                              <!-- ***  END form-group *** -->

                            </div>
                                          <!-- /.col-md-9 -->


                    </div>
                  </div>
          </div>
          <!-- /.row -->

      </div>
      <!-- /.container -->
  </div>
  <!-- /#content -->
</div>
  @else
  <div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Здравствуйте, меня зовут {{ $user->name }}!</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">

                    <li><a href="/">На главную</a>
                    </li>
                    <li>Аккаунт</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content" class="clearfix">
    <div class="container">
        <div class="row">

          <div class="col-md-4">

              <div class="panel panel-default sidebar-menu">

                  <div class="panel-heading">
                    <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <p>
                                  <img src="{{$user->photo}}" class="img-responsive " alt="">
                                </p>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <h4>{{ $user->name }}</h4>
                                <h4>{{ $user->surname }}</h4>
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-sm-4 col-md-8">
                              <p >Рейтинг исполнителя: <span>{{ $user->rating_ex }}</span></p>
                              <p >Рейтинг заказчика: <span>{{ $user->rating}}</span></p>
                            </div>
                          </div>
                  </div>

                  <div class="panel-body">

                    <ul class="nav nav-pills nav-stacked">
                      <li >
                          <a href="/users/{{$user->id}}"><i class="fa fa-user"></i>Личные данные</a>
                      </li>
                      <li >
                          <a href="/users/{{$user->id}}/works"><i class="fa fa-list"></i> Работы</a>
                      </li>
                      <li >
                          <a href="/users/{{$user->id}}/services"><i class="fa fa-list"></i> Задачи</a>
                      </li>
                      <li class="active">
                          <a href="/users/{{$user->id}}/reviews"><i class="fa fa-thumbs-o-up"></i> Отзывы заказчиков</a>
                      </li>
                      <li>
                          <a href="/users/{{$user->id}}/reviews2"><i class="fa fa-thumbs-o-up"></i> Отзывы исполнителей</a>
                      </li>
                      <li  >
                          <a href="/users/{{$user->id}}/questions"><i class="fa fa-question-circle"></i>Вопросы и Ответы</a>
                      </li>
                      <li >
                          <a href="/users/{{$user->id}}/articles"><i class="fa fa-file-text-o"></i>Статьи</a>
                      </li>
                    </ul>
                  </div>
              </div>

          </div>

          <div class="col-md-8 clearfix" id="customer-account">
            <div class="">
                <div class="heading">

                </div>
                <div class="row">
                  <div class="col-md-12" id="blog-listing-medium">
                    <section class="post">
                          <div class="row">


                            <div class="form-group">
                              @foreach ($reviews as $review)

                                      <div class="col-sm-3 col-md-2 text-center-xs">

                                          <p >
                                             <img src="{{$review->ser_author->author->photo}}" class="img-responsive img-circle" alt="">
                                          </p>
                                          <p class="text-center">
                                            <a href="/users/{{$review->ser_author->author->id}}">
                                              {{$review->ser_author->author->name}}</a>
                                          </p>
                                      </div>

                                    <div class="col-md-10">
                                      <div class="row">
                                          <span class="form-group">
                                            Отзыв о задаче <a href="/services/{{$review->ser_author->id}}"> "{{$review->ser_author->head}}"</a>
                                            <span class="clearfix">
                                                <span class="date-comments">
                                                    <a href="#"><i class="fa fa-calendar-o"></i>{{$review->created_at->diffForHumans()}} </a>
                                               </span>
                                            </span>
                                          </span>

                                      </div>

                                      <div class="row">

                                        <p class="intro">

                                           <h4>{{$review->text}}</h4>
                                             <br>
                                           <p>Качество: <b> {{$review->key1}}</b> из 5</p>
                                           <p>Вежливость: <b>{{$review->key2}} </b>из 5</p>
                                           <p>Цена: <b> {{$review->key3}} </b>из 5</p>
                                        </p>
                                      </div>

                                        <hr>
                                    </div>
<hr>
                                     @endforeach
                              </div>

                            </div>

                          </section>

                        </div>

                </div>
              </div>
      </div>
      <!-- /.row -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

  @endif

<script>
// $(function() {
//     $('#deleteBtn').click(function(event) {
//         if (confirm("Действительно хотите удалить этот город?")) {
//             event.preventDefault();
//             document.getElementById('destroy-form').submit();
//         }
//     });
// });
</script>
@stop
