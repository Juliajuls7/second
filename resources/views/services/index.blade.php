
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
                                    <h3 class="panel-title">Text widget</h3>
                                </div>

                                <div class="panel-body text-widget">
                                    <p>Создавайте задания и выбирайте исполнителей.
                                      Или становитесь исполнителем, заполняйте аккаунт повышайте рейтинг и зарабатывайте деньги
                                    </p>

                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                <div class="panel-body">
                                    <form role="search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span class="input-group-btn">

            <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                          <!-- @includeIf('questions.partials.categories') -->

                            <div class="panel sidebar-menu">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tags</h3>
                                </div>

                                <div class="panel-body">
                                    <ul class="tag-cloud">
                                        <li><a href="#"><i class="fa fa-tags"></i> html5</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> css3</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> jquery</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> ajax</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> php</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> responsive</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> visio</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags"></i> bootstrap</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- *** MENUS AND FILTERS END *** -->

                        </div>



                      <div class="col-md-9" id="blog-listing-medium">
                        <section class="post">
                              <div class="row">
                                <a type="button"  href="/services/create" class="btn btn-lg btn-template-primary">Создать задание</a>

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

                                         </div>


                                        <hr>

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
