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
                            <!-- /.col-md-3 -->
                                          <!-- *** CUSTOMER MENU END *** -->
                        </div>

                                      <!-- *** RIGHT COLUMN END *** -->
                    <!-- *** LEFT COLUMN ***
       _________________________________________________________ -->

                    <div class="col-md-8 clearfix" id="customer-account">


                            <form>
                <div class="box clearfix">
                    <div class="heading">
                        <h3 class="text-uppercase">Личные данные</h3>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Имя</label>
                                    <input type="text" class="form-control" id="firstname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Фамилия</label>
                                    <input type="text" class="form-control" id="lastname">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="state">Регион</label>
                                  <select class="form-control" id="state"></select>
                              </div>
                          </div>
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="country">Город</label>
                                  <select class="form-control" id="country"></select>
                              </div>
                          </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="form-group">
                                  <label for="text" class="control-label">Пол </label>
                                    <div class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-default">
                                          <input type="radio" id="state" name="state" value="1" /> Мужской
                                      </label>
                                      <label class="btn btn-default">
                                          <input type="radio" id="state" name="state" value="2" /> Женский
                                      </label>
                                  </div>
                                </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label for="phone">Телефон</label>
                                  <input type="text" class="form-control" id="phone">
                              </div>
                          </div>
                          <div class="col-sm-3">
                              <div class="form-group">
                                  <label for="email_account">Skype</label>
                                  <input type="text" class="form-control" id="email_account">
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="phone">Email</label>
                                  <input type="text" class="form-control" id="phone">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 col-md-6">
                              <div class="form-group">
                                  <label for="state">Образование</label>
                                  <select class="form-control" id="state"></select>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="phone">Деятельность</label>
                                  <input type="text" class="form-control" id="phone">
                              </div>
                          </div>

                        </div>
                        <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="phone">Навыки</label>
                                    <textarea id="text"  class="form-control" name="text" placeholder="" ></textarea>
                              </div>
                          </div>

                        </div>
                        <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="phone">О себе</label>
                                    <textarea id="text"  class="form-control" name="text" placeholder="" ></textarea>
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
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Save changes</button>

                            </div>
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

                    </form>

                </div>

                            </form>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
      </div>






@stop
