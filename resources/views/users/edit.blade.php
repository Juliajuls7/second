@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Редактирование аккаунта</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="/">На главную</a>
                          </li>
                          <li>Редактирование аккаунта</li>
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
                                      <li class="active">
                                          <a href="/users/{{$user->id}}"><i class="fa fa-user"></i> Мой аккаунт</a>
                                      </li>
                                        <li >
                                            <a href="#"><i class="fa fa-list"></i> Мои задания</a>
                                        </li>
                                        <li>
                                            <a href="customer-wishlist.html"><i class="fa fa-briefcase"></i> Мои услуги</a>
                                        </li>
                                        <li>
                                            <a href="index.html"><i class="fa fa-bell"></i>Уведомления </a>
                                        </li>
                                        <li>
                                            <a href="/users/edit/{{$user->id}}"><i class="fa fa-align-justify"></i>
                                              Заполнить профиль </a>
                                        </li>
                                        <li>
                                            <a href="/users/edit/{{$user->id}}"><i class="fa fa-cog"></i>Настройки </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    <div class="col-md-8 clearfix" id="customer-account">



                <div class="box clearfix">
                    <div class="heading">
                        <h3 class="text-uppercase">Личные данные</h3>
                    </div>

                    <form action="/users/edit/{{ $user->id }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="region">Регион</label>
                                  <select class="form-control" id="region" name="region">
                                  
                                      @foreach($regions as $region)
                                         <option value="{{$region->id}}"
                                           @if($user->city->region->id == $region->id)
                                           selected
                                           @endif
                                           >{{$region->name}}
                                       </option>
                                     @endforeach
                                    </select>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="city">Город</label>
                                  <select class="form-control" id="city" name="city"></select>
                              </div>
                          </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label for="text" class="control-label">Пол </label>
                                    <div class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-default">
                                          <input type="radio" id="sex" name="sex" value="1" checked /> Мужской
                                      </label>
                                      <label class="btn btn-default">
                                          <input type="radio" id="sex" name="sex" value="2" /> Женский
                                      </label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="DOB">Дата рождения</label>
                                <input type="date" id="DOB" name="DOB" value="{{$user->DOB}}">
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label for="phone">Телефон</label>
                                  <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                              </div>
                          </div>
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label for="skype">Skype</label>
                                  <input type="text" class="form-control" id="skype" name="skype" value="{{ $user->skype }}">
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="education">Образование</label>
                                  <select class="form-control" id="education" name="education">
                                    @foreach($educations as $education)
                                       <option value="{{$education->id}}"
                                         @if($user->education->id == $education->id)
                                         selected
                                         @endif
                                         >{{$education->name}}
                                     </option>
                                   @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="activities">Деятельность</label>
                                  <input type="text" class="form-control" id="activities" name="activities" value="{{ $user->activities }}">
                              </div>
                          </div>

                        </div>
                        <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="skills">Навыки</label>
                                    <textarea id="skills" class="form-control" name="skills" placeholder="" >{{ $user->skills }}</textarea>
                              </div>
                          </div>

                        </div>
                        <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="about_myself">О себе</label>
                                    <textarea id="about_myself" class="form-control" name="about_myself" placeholder="" >{{ $user->about_myself }}</textarea>
                              </div>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="state">Категории</label>
                                  <select class="form-control" id="state"></select>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="country">Подкатегории</label>
                                  <select class="form-control" id="country"></select>
                              </div>
                          </div>
                        </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Сохранить</button>
                            </div>

                          </form>
                  </div>




                            <div class="col-md-9 clearfix" id="customer-account">



                                <div class="box">

                                    <div class="heading">
                                        <h3 class="text-uppercase">Изменить пароль</h3>
                                    </div>

                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password_old">Старый пароль</label>
                                                    <input type="password" class="form-control" id="password_old">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password_1">Новый пароль</label>
                                                    <input type="password" class="form-control" id="password_1">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="password_2">Повторите новый пароль</label>
                                                    <input type="password" class="form-control" id="password_2">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Созранить</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.box -->

                                </div>

                        </div>



                </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
      </div>
@stop
@section ('localjs')
<script>
$(function () {
  function loadSub() {
    $.get('/api/regions/city/'+$('#region').val(), function (data) {
      $('#city').empty();
      $.each(data, function(key, value) {
        if (value['id']=={{ $user->city->id }}) {
          $('#city')
           .append($("<option></option>")
              .attr("value",value['id'])
              .attr("selected","selected")
              .text(value['name']));
        } else {
          $('#city')
           .append($("<option></option>")
              .attr("value",value['id'])
              .text(value['name']));
        }
      });
      $('#city').prop('disabled', false);
    });
  }
  $('#regions').on('change', function() {
    $('#city').prop('disabled', 'disabled');
    loadSub();
  });
  loadSub();
});
</script>
@stop
