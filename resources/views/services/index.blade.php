
@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Задания</h1>
                  </div>
                  <div class="col-md-6">
                      <ul class="breadcrumb">
                          <li><a href="/">На главную</a>
                          </li>
                          <li>Задания</li>
                      </ul>

                  </div>
              </div>
          </div>
      </div>


      <div id="content">
                <div class="container">
                    <div class="row">

                      <div class="col-md-3">

                            <!-- *** MENUS AND WIDGETS ***
            _________________________________________________________ -->


                            <div class="panel panel-default sidebar-menu">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Поиск</h3>
                                </div>

                                <div class="panel-body">
                                    <form role="search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Поиск">
                                            <span class="input-group-btn">

            <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                  @includeIf('services.partials.categories')

                          <!-- @includeIf('questions.partials.categories') -->



                            <!-- *** MENUS AND FILTERS END *** -->

                        </div>



                      <div class="col-md-9" id="blog-listing-medium">
                        <section class="post">
                              <div class="row">
                                <a type="button"  href="/services/create" class="btn btn-lg btn-template-primary">Создать задание</a>
                                <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      Сортировать по
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                      <li><a href="#">Дате</a></li>
                                      <li><a href="#">Рейтингу исполнителя</a></li>

                                    </ul>
                                  </div>
                              <hr>



                              <div class="form-group">
                                @foreach ($services as $service)
                                        <div class="col-sm-3 col-md-2 text-center-xs">
                                            <p>
                                               <img src="{{$service->author->photo}}" class="img-responsive img-circle" alt="">
                                            </p>
                                            <span>Рейтинг заказчика: <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                              {{$service->author->rating}}
                                            </span>

                                        </div>

                                       <div class="col-md-10">
                                         <h2><a href="/services/{{$service->id}}">{{ $service->head }}</a>
                                        <span class="price-icon pull-right">   {{ $service->price }} руб.</span>
                                         </h2>
                                         <a href="#">{{ $service->subcategory->category->name }}</a> > <a href="#">{{ $service->subcategory->name }}</a>
                                         <span class="clearfix text-left">
                                           Заказчик <a href="/users/{{$service->author->id}}">
                                             {{ $service->author->name }}</a>
                                         </span>
                                         <span class="clearfix text-right">

                                           <p class="">Начало
                                             <a href="#">{{ $service->t_start }}</a>
                                           </p>
                                           <p class="">Окончание
                                             <a href="#">{{ $service->t_finish}}</a>
                                           </p>
                                         </span>
                                         <p class="date-comments">
                                             <a href="#"><i class="fa fa-calendar-o"></i> {{ $service->created_at->diffForHumans() }}</a>
                                             @if(count($service->comments)  == 1)
                                             <a href="#"><i class="fa fa-comment-o"></i>{{ count($service->comments) }}  Предложение</a>
                                             @elseif( count($service->comments)  == 2 || count($service->comments)  == 3 || count($service->comments)  == 4)
                                             <a href="#"><i class="fa fa-comment-o"></i>{{ count($service->comments) }}  Предложения</a>
                                              @else
                                            <a href="#"><i class="fa fa-comment-o"></i>{{ count($service->comments) }}  Предложений</a>
                                            @endif
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
                                         <p class="clearfix text-left">

                                         </p>
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
                                <!-- ***  END form-group *** -->

                                </div>
                                <div class="text-center" >
                                {{ $services->links() }}
                                </div>
                                <!-- ***  END row *** -->
                              </section>
                              <!-- ***  END form-group *** -->

                            </div>
                                          <!-- /.col-md-9 -->

                                              <!-- *** LEFT COLUMN END *** -->

                                              <!-- *** RIGHT COLUMN ***
                          			 _________________________________________________________ -->





                </div>

                 <!-- /.row -->
              </div>
                              <!-- /.container -->
          </div>
                          <!-- /#content -->



<script>
// $(function() {
//    $('#deleteBtn').click(function(event) {
//        if (confirm("Действительно хотите удалить этот тип?")) {
//            event.preventDefault();
//            document.getElementById('destroy-form').submit();
//        }
//    });
// });
</script>
@stop
