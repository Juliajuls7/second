<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="all,follow">
  <meta name="googlebot" content="index,follow,snippet,archive">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Secondhelp</title>
  <meta name="keywords" content="">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
  <!-- Bootstrap and Font Awesome css -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <!-- Css animations  -->
  <link href="/css/animate.css" rel="stylesheet">
  <!-- Theme stylesheet, if possible do not edit this stylesheet -->
  <link href="/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes -->
  <link href="/css/custom.css" rel="stylesheet">
  <link href="/css/starsrev.css" rel="stylesheet">
  <!-- Favicon and apple touch icons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
  <link href="https://fonts.googleapis.com/css?family=Leckerli+One|Pacifico" rel="stylesheet">
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
   <!-- Scripts -->
@yield('localcss')
</head>
<body>
  <div id="all">
        <header>
            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            @if (Auth::user())
                          <a href="#" data-animate-hover="pulse">
                            <i class="fa fa-envelope"></i>
                            <span class="hidden-xs text-uppercase">Уведомления</span></a>
                            @endif
                        </div>
                        <div class="col-xs-7">
                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>

                            </div>
                            <div class="login">
                                  @if (Auth::guest())
                              <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Вход</span></a>
                              <a href="{{ route('register') }}"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Регистрация</span></a>
                                  @else
                                  <a href="/users/{{Auth::user()->id}}"   aria-expanded="false">

                                      {{ Auth::user()->name }}
                                  </a>

                                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Выход</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                  @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** TOP END *** -->
            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="/">
                                <img src="/img/logo.png" alt="Universal logo" class="hidden-xs hidden-sm">

                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="menu {{{ (Request::is('/') ? 'active' : '') }}}">
                                    <a href="/" class="home">На главную</a>

                                </li>
                                <li class="menu {{{ (Request::is('questions') ? 'active' : '') }}}">
                                    <a href="/questions" class="question" >Вопросы</a>

                                </li>
                                @if (Role::admin())
                                <li class="menu {{{ (Request::is('categories') ? 'active' : '') }}}">
                                    <a href="/categories" class="categories">Категории</a>
                                </li>
                                <li class="menu {{{ (Request::is('cities') ? 'active' : '') }}}">
                                    <a href="/cities" class="cities">Области и города</a>
                                </li>
                                <li class="menu {{{ (Request::is('users') ? 'active' : '') }}}">
                                    <a href="/users" class="cities">Пользователи</a>
                                </li>
                                @endif
                                <li class="menu {{{ (Request::is('services') ? 'active' : '') }}}">
                                    <a href="/services" class="services">Задания</a>
                                </li>
                                <!-- <li class="menu">
                                    <a href="#" class="services">Услуги</a>
                                </li> -->
                                  @if (Role::user()||Role::guest())
                                <li class="menu {{{ (Request::is('executors') ? 'active' : '') }}}">
                                    <a href="/executors" class="articles">Исполнители</a>
                                </li>
                                  @endif
                                <li class="menu {{{ (Request::is('articles') ? 'active' : '') }}}">
                                    <a href="/articles" class="articles">Статьи</a>
                                </li>

                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                                    </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Авторизация</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="пароль" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                                </label>
                            </div>

                    </div>
                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Вход</button>
                    </p>

                </form>

                <p class="text-center text-muted">Еще не зарегистрированы?</p>
                <p class="text-center text-muted"><a href="{{ route('register') }}"><strong>Зарегистрируйтесь </strong></a>сейчас! Это легко и займет всего 1&nbsp;минуту!</p>

            </div>
        </div>
    </div>
</div>


        <!-- *** LOGIN MODAL END *** -->

        @yield('content')


        <!-- *** FOOTER ***
_________________________________________________________ -->

        <footer id="footer">
            <div class="container">
                <div class="col-md-3 col-sm-6">
                    <h4>О нас</h4>

                    <p>Сайт, предназначенный для создания задач и поиска исполнителей по всей стране</p>

                    <hr>



                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Как тут все устроено</h4>

                    <div class="blog-entries">
                        <div class="item same-height-row clearfix">

                            <div class="name same-height-always">
                                <h5><a href="#">Формирование рейтинга</a></h5>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">

                            </div>
                            <div class="name same-height-always">
                                <h5><a href="#">Как это работает</a></h5>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">

                            </div>
                            <div class="name same-height-always">
                                <h5><a href="#">Отзывы о нас</a></h5>
                            </div>
                        </div>
                    </div>

                    <hr class="hidden-md hidden-lg">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Контакты</h4>

                    <p><strong>SecondHelp.ru</strong>
                        <br>+7 908 589 29 68
                        <br>+7 906 866 54 47
                        <br>Челябинск
                        <br>
                        <br>
                        <strong>Россия</strong>
                    </p>



                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->



                <div class="col-md-3 col-sm-6">

                    

                    <div class="photostream">

                    </div>

                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </footer>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2017. SecondHelp</p>
                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->

    </div>
        <!-- /#all -->

        <!-- #### JAVASCRIPT FILES ### -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
        <script src="{{ asset('/js/app.js') }}"></script>
        <!-- <script>
            window.jQuery || document.write('<script src="/js/jquery-1.11.0.min.js"><\/script>')
        </script> -->
        <script>
            window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
        </script>
        <script src="/js/jquery.cookie.js"></script>
        <script src="/js/waypoints.min.js"></script>
        <script src="/js/jquery.counterup.min.js"></script>
        <script src="/js/jquery.parallax-1.1.3.js"></script>
        <script src="/js/front.js"></script>

          @yield('localjs')



</body>

</html>
