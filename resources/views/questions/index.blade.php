@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Questions</h1>
                  </div>
                  <div class="col-md-6">
                      <ul class="breadcrumb">
                          <li><a href="/home">Home</a>
                          </li>
                          <li>Questions</li>
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
                                <div class="form-group">

                                  <a type="button"  href="/questions/create" class="btn btn-lg btn-template-primary">Задать вопрос</a>
                                <hr>
                                         @foreach ($questions as $question)
                                         <div class="col-md-4">
                                             <div class="image">
                                                 <a href="blog-post.html">
                                                     <img src="img/blog-medium.jpg" class="img-responsive" alt="Example blog post alt">
                                                 </a>
                                             </div>
                                         </div>


                                         <div class="col-md-8">
                                             <h2><a href="/question/">{{ $question->head }}</a></h2>
                                             <div class="clearfix">
                                                 <p class="author-category">By <a href="/users">{{ $question->user->name }}</a>
                                                 </p>
                                                 <p class="date-comments">
                                                     <a href="#"><i class="fa fa-calendar-o"></i> {{ $question->created_at->format('D, d M Y H:i:s') }}</a>
                                                     <a href="#"><i class="fa fa-comment-o"></i>{{ count($question->comments) }}  Comments</a>
                                                 </p>
                                             </div>
                                              <p class="intro">
                                                {!! $question->text !!}
                                              </p>
                                             <p class="read-more"><a href="/questions/{{$question->id}}" class="btn btn-template-main">Читать далее...</a>
                                             </p>
                                             <p class="read-more"><a href="/questions/edit/{{$question->id}}" class="btn btn-template-main">Редактировать</a>
                                             </p>
                                             <p class="read-more"><a href="/questions/{{ $question->id }}"
                                                   onclick="event.preventDefault();
                                                document.getElementById('destroy-form{{ $question->id }}').submit();" class="btn btn-template-main">Удалить</a>
                                             </p>
                                             <form id="destroy-form{{ $question->id }}" action="/questions/{{ $question->id }}" method="POST" style="display: none;">
                                                 {{ csrf_field() }}
                                                 {{ method_field('DELETE') }}
                                             </form>
                                         </div>


                                        <hr>
                                         @endforeach
                                  </div>
                                  <!-- ***  END form-group *** -->
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
