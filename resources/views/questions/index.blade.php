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

                                         <div class="col-md-12">
                                           <p class="date-comments">
                                               <a href="#"><i class="fa fa-calendar-o"></i> {{ $question->created_at->diffForHumans() }}</a>
                                               <a href="#"><i class="fa fa-comment-o"></i>{{ count($question->comments) }}  Comments</a>
                                           </p>
                                             <h4><a href="/questions/{{$question->id}}">{{ $question->head }}</a></h4>

                                             <div class="clearfix">
                                               <a href="#">{{ $question->subcategory->category->name }}</a> > <a href="#">{{ $question->subcategory->name }}</a>



                                             </div>

                                               @if (Role::admin())
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


                    @includeIf('questions.partials.categories')

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
