@extends('layouts.app')

@section('content')

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Вход</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="/home">На главную</a>
                    </li>
                    <li>Вход</li>
                </ul>

            </div>
        </div>
    </div>
</div>


<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <p class="lead">Уже зарегистрированы?</p>
                    <p class="text-muted">Спасибо,что выбираете нас!</p>
                    <hr>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email</label>


                            <input  type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Запомнить меня
                                    </label>
                                </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Вход</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                              Забыли пароль?
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

@endsection
