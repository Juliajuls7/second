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

                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="col-md-9 clearfix" id="customer-account">

                        <p class="lead">Ваши личные данные </p>
                        <p class="text-muted">Вы в любой момент можете изменить личные данные (например, имя, адреса электронной почты и номера телефонов, связанные с аккаунтом, а также дату рождения и пол)</p>



                        <div class="box clearfix">
                            <div class="heading">
                                <h3 class="text-uppercase">Personal details</h3>
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

                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <h5>День рождения: <a href="#">{{ \Carbon\Carbon::parse($user->DOB)->format('d.m.Y') }}</a></h5>
                                          <h5>Пол:
                                            @if($user->sex==0)
                                              Не указан
                                            @elseif($user->sex==1)
                                              Мужской
                                            @else
                                              Женский
                                            @endif
                                          </h5>
                                          <h5>Город:
                                            @if($user->city_id==0)
                                              Не указан
                                            @else
                                              <a href="#">{{$user->city_id}}</a>
                                            @endif
                                             </h5>
                                           <h5>Телефон:
                                             @if($user->phone==0)
                                               Не указан
                                             @else
                                               <a href="#">{{$user->phone}}</a>
                                             @endif
                                            </h5>
                                            <h5>Skype:
                                              @if($user->skype==0)
                                                Не указан
                                              @else
                                                <a href="#">{{$user->skype}}</a>
                                              @endif
                                             </h5>
                                             <h5>Образование:
                                               @if($user->education==0)
                                                 Не указано
                                               @else
                                                 <a href="#">{{$user->education}}</a>
                                               @endif
                                             </h5>
                                             <h5>Деятельность:
                                               @if($user->activities=='')
                                                 Не указана
                                               @else
                                                 <a href="#">{{$user->activities}}</a>
                                               @endif
                                             </h5>
                                             <h5>Навыки:
                                               @if($user->skills=='')
                                                 Не указаны
                                               @else
                                                 <a href="#">{{$user->skills}}</a>
                                               @endif
                                             </h5>
                                             <h5>О себе:
                                               @if($user->about_myself=='')
                                                 Не указано
                                               @else
                                                 <a href="#">{{$user->about_myself}}</a>
                                               @endif
                                             </h5>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->


                                <!-- /.row -->

                                <div class="row">

                                    <div class="col-sm-12 text-center">

                                        <a href="/users/edit/{{$user->id}}"type=button class="btn btn-template-main">Редактировать</a>
                                    </div>

                                </div>

                            </form>

                        </div>
                        <ul class="nav nav-tabs">
                          <li role="presentation" class="active"><a href="#">Home</a></li>
                          <li role="presentation"><a href="#">Profile</a></li>
                          <li role="presentation"><a href="#">Messages</a></li>
                          </ul>

                          <div class="box clearfix">
                            <div class="heading">
                                <h3 class="text-uppercase">Задачи</h3>

                            </div>
                            <div class="row">
                              <div class="col-md-9" id="blog-listing-medium">
                                <section class="post">
                                      <div class="row">
                                        <a type="button"  href="/services/create" class="btn btn-lg btn-template-primary">Создать задание</a>

                                      <hr>
                                      <hr>

                                      <div class="form-group">
                                        @foreach ($services as $service)
                                                <div class="col-sm-3 col-md-2 text-center-xs">
                                                    <p>
                                                       <img src="{{$service->author->photo}}" class="img-responsive img-circle" alt="">
                                                    </p>
                                                </div>

                                               <div class="col-md-10">
                                                 <h2><a href="/services/{{$service->id}}">{{ $service->head }}</a>
                                                <span class="price-icon pull-right">   {{ $service->price }} руб.</span>
                                                 </h2>
                                                 <a href="#">{{ $service->subcategory->category->name }}</a> > <a href="#">{{ $service->subcategory->name }}</a>
                                                 <div class="clearfix text-right" >
                                                   <p class="">Начало
                                                     <a href="#">{{ $service->t_start }}</a>
                                                   </p>
                                                   <p class="">Окончание
                                                     <a href="#">{{ $service->t_finish}}</a>
                                                   </p>
                                                 </div>
                                                 <p class="date-comments">
                                                     <a href="#"><i class="fa fa-calendar-o"></i> {{ $service->created_at->diffForHumans() }}</a>
                                                     <a href="#"><i class="fa fa-comment-o"></i>{{ count($service->comments) }}  Предложений</a>
                                                 </p>

                                                 @if( $service->remote == 1)
                                                 <p class="clearfix text-left">
                                                    <a href="#">
                                                      <b>
                                                        <u> Удаленная работа </u>
                                                      </b>
                                                      </a>
                                                 </p>
                                                 @endif
                                                     @if (Role::admin())
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
                                                   @endif
                                                     <hr>
                                               </div>
                                               @endforeach

                                        </div>

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
                                        <a href="#"><i class="fa fa-list"></i> Мои задания</a>
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

        @else
        <div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Здравсnвуйте, меня зовут {{ $user->name }}!</h1>
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

                          <form>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <h5>День рождения: <a href="#">{{ \Carbon\Carbon::parse($user->DOB)->format('d.m.Y') }}</a></h5>
                                        <h5>Пол:
                                          @if($user->sex==0)
                                            Не указан
                                          @elseif($user->sex==1)
                                            Мужской
                                          @else
                                            Женский
                                          @endif
                                        </h5>
                                        <h5>Город:
                                          @if($user->city_id==0)
                                            Не указан
                                          @else
                                            <a href="#">{{$user->city_id}}</a>
                                          @endif
                                           </h5>
                                         <h5>Телефон:
                                           @if($user->phone==0)
                                             Не указан
                                           @else
                                             <a href="#">{{$user->phone}}</a>
                                           @endif
                                          </h5>
                                          <h5>Skype:
                                            @if($user->skype==0)
                                              Не указан
                                            @else
                                              <a href="#">{{$user->skype}}</a>
                                            @endif
                                           </h5>
                                           <h5>Образование:
                                             @if($user->education==0)
                                               Не указано
                                             @else
                                               <a href="#">{{$user->education}}</a>
                                             @endif
                                           </h5>
                                           <h5>Деятельность:
                                             @if($user->activities=='')
                                               Не указана
                                             @else
                                               <a href="#">{{$user->activities}}</a>
                                             @endif
                                           </h5>
                                           <h5>Навыки:
                                             @if($user->skills=='')
                                               Не указаны
                                             @else
                                               <a href="#">{{$user->skills}}</a>
                                             @endif
                                           </h5>
                                           <h5>О себе:
                                             @if($user->about_myself=='')
                                               Не указано
                                             @else
                                               <a href="#">{{$user->about_myself}}</a>
                                             @endif
                                           </h5>
                                      </div>
                                  </div>
                              </div>
                              <!-- /.row -->
                          </form>
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
