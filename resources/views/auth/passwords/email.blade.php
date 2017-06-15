@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Восстановление доступа к аккаунту</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="/home">На главную</a>
                    </li>
                    <li>Восстановление доступа к аккаунту</li>
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
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                    <p class="lead">Забыли пароль?</p>
                    <p class="text-muted">Пожалуйста укажите е-mail, который вы использовали для входа на сайт</p>
                    <hr>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-3 control-label">E-Mail</label>

                          <div class="col-md-7 ">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i>
                                  Отправить письмо с восстановлением пароля
                              </button>
                            </div>
                        </div>
                            <div class="text-center">

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
