@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>My account</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">

                            <li><a href="index.html">Home</a>
                            </li>
                            <li>My account</li>
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
                                          <h5>День рождения: <a href="#">{{$user->DOB}}</a></h5>
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
                                <h3 class="panel-title">Customer section</h3>
                            </div>

                            <div class="panel-body">

                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active">
                                        <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
                                    </li>
                                    <li>
                                        <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                                    </li>
                                    <li>
                                        <a href="customer-account.html"><i class="fa fa-user"></i> My account</a>
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
