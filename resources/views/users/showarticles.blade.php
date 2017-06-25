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
                                    <a href="/users/{{$user->id}}/articles"><i class="fa fa-file-text-o"></i> Статьи</a>
                                </li>
                                <li >
                                    <a href="#"><i class="fa fa-question-circle"></i>Вопросы и Ответы</a>
                                </li>

                                  <li>
                                      <a href="customer-wishlist.html"><i class="fa fa-thumbs-o-up"></i> Отзывы</a>
                                  </li>
                                  <li>
                                      <a href="index.html"><i class="fa fa-bell"></i>Уведомления </a>
                                  </li>
                                  <li>
                                      <a href="/users/edit/{{$user->id}}"><i class="fa fa-list"></i>
                                        Заполнить профиль </a>
                                  </li>
                                  <li>
                                      <a href="/users/edit/{{$user->id}}"><i class="fa fa-cog"></i>Настройки </a>
                                  </li>


                              </ul>
                          </div>
                      </div>

                  </div>


                              <div class="col-md-8" id="blog-listing-big">
                                @foreach ($articles as $article)
                                  <section class="post">

                                    <div class="col-sm-3 col-md-2 text-center-xs">
                                        <p>
                                           <img src="{{$article->user->photo}}" class="img-responsive img-circle" alt="">
                                        </p>
                                    </div>

                                      <h2><a href="/articles/{{ $article->id }}">{{ $article->head }}</a></h2>
                                      <div class="row">
                                        <div class="clearfix">
                                              <p class="author-category">Автор <a href="/users/{{ $article->user->id }}">{{ $article->user->name }}</a>
                                              </p>

                                            <a href="#">{{ $article->subcategory->category->name}}</a>
                                              >
                                              <a href="#">{{ $article->subcategory->name }}</a>
                                            <p class="date-comments">

                                                <a href="#"><i class="fa fa-calendar-o"></i> {{ $article->created_at->diffForHumans() }}</a>
                                                <a href="#"><i class="fa fa-comment-o"></i>{{ count($article->comments) }}  Comments</a>

                                           </p>
                                        </div>
                                      </div>
                                      <p class="intro">{!! $article->text !!}</p>
                                      <p class="read-more">
                                          <a href="/articles/{{ $article->id }}" class="btn btn-template-main">Продолжить чтение</a>
                                          @if (Role::check($article))
                                          <a href="/articles/edit/{{$article->id}}" class="btn btn-template-main">Редактировать</a>
                                          <a class="btn btn-template-main" href="/articles/{{ $article->id }}"
                                                onclick="event.preventDefault();
                                             document.getElementById('destroy-form{{ $article->id }}').submit();">
                                               Удалить
                                           </a>
                                           @endif
                                     </p>
                                    <form id="destroy-form{{ $article->id }}" action="/articles/{{ $article->id }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    </form>
                                     <hr>
                                  </section>
                                  @endforeach
                              </div>
                              <div class="text-center" >
                              {{ $articles->links() }}
                              </div>



                          </div>

                      </div>

                  </div>

      </div>

  </div>

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
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content" class="clearfix">
    <div class="container">
        <div class="row">

            <!-- *** LEFT COLUMN ***
_________________________________________________________ -->

            <div class="col-md-9 clearfix" id="customer-account">

                <div class="box clearfix">
                    <div class="heading">

                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                              <img src="{{$user->photo}}" class="img-responsive img-circle" alt="">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <p class="lead"><b>{{ $user->name }}</b></p>
                            <p class="lead"><b>{{ $user->surname }}</b></p>
                            <p class="lead">Рейтинг: <span class="lead">{{ $user->rating }}</span></p>
                        </div>
                    </div>

                </div>

                <div class="">
                    <div class="heading">
                        <h3 class="text-uppercase">Задачи</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-9" id="blog-listing-medium">
                        <section class="post">
                              <div class="row">

                              <hr>
                                <div class="form-group">
                                  @foreach ($services as $service)
                                          <div class="col-sm-3 col-md-2 text-center-xs">
                                              <p>
                                                 <img src="{{$service->author->photo}}" class="img-responsive img-circle" alt="">
                                              </p>
                                          </div>

                                         <div class="col-md-10">
                                           <a href="#">{{ $service->subcategory->category->name }}</a> > <a href="#">{{ $service->subcategory->name }}</a>
                                           <p class="date-comments">
                                               <a href="#"><i class="fa fa-calendar-o"></i> {{ $service->created_at->diffForHumans() }}</a>
                                               <a href="#"><i class="fa fa-comment-o"></i>{{ count($service->comments) }}  Comments</a>
                                               <br>
                                               @if( $service->remote == 1)
                                               <p class="date-comments">
                                                  <a href="#">
                                                    <b>
                                                      <u> Удаленная работа </u>
                                                    </b>
                                                    </a>
                                               </p>
                                               @endif
                                          </p>
                                             <h2><a href="/service/{{ $service->id }}">{{ $service->head }}</a></h2>

                                             <div class="clearfix">
                                               <p class="author-category">Заказчик <a href="/users/{{ $service->author->id }}">{{ $service->author->name }}</a>
                                               </p>
                                               <p class="date-comments">Окончание
                                                 <a href="#">{{ $service->t_finish}}</a>
                                               </p>
                                               <p class="date-comments">Начало
                                                 <a href="#">{{ $service->t_start }}</a>
                                               </p>
                                               <br>

                                            <br>

                                             </div>

                                              <p class="intro">
                                                {!! $service->text !!}
                                              </p>
                                             <span class="read-more"><a href="/services/{{$service->id}}" class="btn btn-template-main">Читать далее...</a>
                                             </span>
                                             @if (Role::check_service($service))
                                             <span class="read-more"><a href="/services/edit/{{$service->id}}" class="btn btn-template-main">Редактировать</a>
                                             </span>
                                             <span class="read-more"><a href="/services/{{ $service->id }}"
                                                   onclick="event.preventDefault();
                                                document.getElementById('destroy-form{{ $service->id }}').submit();" class="btn btn-template-main">Удалить</a>
                                             </span>
                                             <form id="destroy-form{{ $service->id }}" action="/services/{{ $service->id }}" method="POST" style="display: none;">
                                                 {{ csrf_field() }}
                                                 {{ method_field('DELETE') }}
                                             </form>
                                               <hr>
                                               @endif
                                         </div>


                                        <hr>

                                         @endforeach

                                  </div>
                                  <!-- ***  END form-group *** -->

                                </div>
                                <div class="text-center" >

                                </div>
                                <!-- ***  END row *** -->
                              </section>
                              <!-- ***  END form-group *** -->

                            </div>
                                          <!-- /.col-md-9 -->


                    </div>
                  </div>
            </div>
            <!-- /.col-md-9 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
_________________________________________________________ -->


            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="#"><i class="fa fa-list"></i> задания</a>
                            </li>
                            <li>
                                <a href="customer-wishlist.html"><i class="fa fa-heart"></i> Мои услуги</a>
                            </li>
                            <li>
                                <a href="customer-account.html"><i class="fa fa-user"></i> Мои вопросы</a>
                            </li>
                            <li>
                                <a href="index.html"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <!-- *** RIGHT COLUMN END *** -->

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
