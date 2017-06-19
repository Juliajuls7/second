@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Вопросы</h1>
                  </div>
                  <div class="col-md-6">
                      <ul class="breadcrumb">
                          <li><a href="/">На главную</a>
                          </li>
                          <li>Вопросы</li>
                      </ul>

                  </div>
              </div>
          </div>
      </div>
      <div id="content">
                <div class="container">
                    <div class="row">
                      <div class="col-md-9" id="blog-listing-medium">
                        <section class="post">
                              <div class="row">
                                <a type="button"  href="/questions/create" class="btn btn-lg btn-template-primary">Задать вопрос</a>
                              <hr>
                                <div class="form-group">
                                         @foreach ($questions as $question)

                                         <div class="col-sm-3 col-md-2 text-center-xs">
                                             <p>
                                                <img src="{{$question->user->photo}}" class="img-responsive img-circle" alt="">
                                             </p>
                                         </div>

                                         <div class="col-md-10">
                                           <a href="#">{{ $question->subcategory->category->name }}</a> > <a href="#">{{ $question->subcategory->name }}</a>
                                             <h2><a href="/questions/{{ $question->id }}">{{ $question->head }}</a></h2>

                                             <div class="clearfix">
                                                 <p class="author-category">By <a href="/users/{{ $question->user->id }}">{{ $question->user->name }}</a>
                                                 </p>
                                                 <p class="date-comments">
                                                     <a href="#"><i class="fa fa-calendar-o"></i> {{ $question->created_at->diffForHumans() }}</a>
                                                     <a href="#"><i class="fa fa-comment-o"></i>{{ count($question->comments) }}  Comments</a>
                                                </p>
                                             </div>
                                              <p class="intro">
                                                {!! $question->text !!}
                                              </p>
                                             <span class="read-more"><a href="/questions/{{$question->id}}" class="btn btn-template-main">Читать далее...</a>
                                             </span>
                                               @if (Role::check($question)||Role::admin())
                                             <span class="read-more"><a href="/questions/edit/{{$question->id}}" class="btn btn-template-main">Редактировать</a>
                                             </span>
                                             <span class="read-more"><a href="/questions/{{ $question->id }}"
                                                   onclick="event.preventDefault();
                                                document.getElementById('destroy-form{{ $question->id }}').submit();" class="btn btn-template-main">Удалить</a>
                                             </span>
                                             @endif
                                             <form id="destroy-form{{ $question->id }}" action="/questions/{{ $question->id }}" method="POST" style="display: none;">
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
                                {{ $questions->links() }}
                                </div>
                                <!-- ***  END row *** -->
                              </section>
                              <!-- ***  END form-group *** -->
                            </div>
                                          <!-- /.col-md-9 -->
                                              <!-- *** LEFT COLUMN END *** -->
                                              <!-- *** RIGHT COLUMN ***
                          			 _________________________________________________________ -->
                <div class="col-md-3">
                      <!-- *** MENUS AND WIDGETS ***
_________________________________________________________ -->
                      <div class="panel panel-default sidebar-menu">

                          <div class="panel-heading">
                              <h3 class="panel-title">Text widget</h3>
                          </div>
                          <div class="panel-body text-widget">
                              <p>Improved own provided blessing may peculiar domestic. Sight house has sex never. No visited raising gravity outward subject my cottage mr be. Hold do at tore in park feet near my case.
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
                    @includeIf('questions.partials.categories')
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
