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
                                <li class="active">
                                    <a href="/users/{{$user->id}}"><i class="fa fa-user"></i> Мой аккаунт</a>
                                </li>
                                <li >
                                    <a href="/users/{{$user->id}}/works"><i class="fa fa-list"></i> Мои работы</a>
                                </li>
                                <li >
                                    <a href="/users/{{$user->id}}/services"><i class="fa fa-list"></i> Мои задачи</a>
                                </li>
                                <li>
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

                  </div>


                               <div class="col-md-8 clearfix" id="customer-account">


                                       <form>
                                           <div class="row">
                                               <div class="col-md-9">
                                                   <div class="form-group">
                                                     <p>Город:
                                                       <span>
                                                         @if($user->city_id==0)
                                                           Не указан,
                                                         @else
                                                         {{$user->city->name}},
                                                         @endif
                                                       </span>
                                                           <span>День рождения:
                                                       @if($user->DOB=='1900-01-01')
                                                         Не указан
                                                       @else
                                                       {{ \Carbon\Carbon::parse($user->DOB)->format('d.m.Y') }}
                                                       </span>
                                                     </p>
                                                       @endif
                                                     <h5>Пол:
                                                       @if($user->sex==0)
                                                         Не указан
                                                       @elseif($user->sex==1)
                                                         Мужской
                                                       @else
                                                         Женский
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
                                                          @if($user->education_id==0)
                                                            Не указано
                                                          @else
                                                            <a href="#">{{$user->education->name}}</a>
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
                                       </form>

                           </div>
                           <!-- /.row -->
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
                      <li class="active">
                          <a href="/users/{{$user->id}}"><i class="fa fa-user"></i>Личные данные</a>
                      </li>
                      <li >
                          <a href="/users/{{$user->id}}/works"><i class="fa fa-list"></i> Работы</a>
                      </li>
                      <li >
                          <a href="/users/{{$user->id}}/services"><i class="fa fa-list"></i> Задачи</a>
                      </li>
                      <li>
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


                    </ul>
                  </div>
              </div>

          </div>

          <div class="col-md-8 clearfix" id="customer-account">


                  <form>
                      <div class="row">
                          <div class="col-md-9">
                              <div class="form-group">
                                <p>Город:
                                  <span>
                                    @if($user->city_id==0)
                                      Не указан,
                                    @else
                                    {{$user->city->name}},
                                    @endif
                                  </span>
                                      <span>День рождения:
                                  @if($user->DOB=='1900-01-01')
                                    Не указан
                                  @else
                                  {{ \Carbon\Carbon::parse($user->DOB)->format('d.m.Y') }}
                                  </span>
                                </p>
                                  @endif
                                <h5>Пол:
                                  @if($user->sex==0)
                                    Не указан
                                  @elseif($user->sex==1)
                                    Мужской
                                  @else
                                    Женский
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
                                     @if($user->education_id==0)
                                       Не указано
                                     @else
                                       <a href="#">{{$user->education->name}}</a>
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
                  </form>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

  @endif


@stop
