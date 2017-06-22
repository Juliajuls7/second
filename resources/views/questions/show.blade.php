@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Просмотр вопроса</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="/">На главную</a>
                          </li>
                          <li><a href="/questions">Вопросы</a>
                          </li>
                          <li>Просмотр вопроса</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
<div id="content">
        <div class="container">

            <div class="row">

                <!-- *** LEFT COLUMN ***
  _________________________________________________________ -->

                <div class="col-md-9" id="blog-post">


                    <p class="text-muted text-uppercase mb-small text-right">Автор <a href="/users">{{ $question->user->name }}</a> | {{ $question->created_at->diffForHumans() }}</p>
                    <p class="text-muted text-uppercase mb-small text-right"> <a href="#">{{ $question->subcategory->category->name}}</a> > <a href="#">{{ $question->subcategory->name }}</a></p>

                        <div id="post-content">

                        <h2>{{ $question->head }}</h2>
                        <p>{{ $question->text }}</p>



                    </div>
                    <!-- /#post-content -->

                    <div id="comments">
                        <h4 class="text-uppercase">Ответы</h4>
                        @if ( count($comments) == 0 )
                        Еще никто не ответил на этот вопрос
                        @endif
                      @foreach ($comments as $comment)
                        <div class="row comment">
                            <div class="col-sm-3 col-md-2 text-center-xs">
                                <p>
                                    <img src="{{ $comment[0]->user->photo }}" class="img-responsive img-circle" alt="">
                                </p>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <h5 class="text-uppercase">{{ $comment[0]->user->name }}</h5>
                                <p class="posted"><i class="fa fa-clock-o"></i> {{ $comment[0]->created_at->diffForHumans() }}</p>
                                <p>{{ $comment[0]->text }}</p>

                                @if ($comment[1])
                                  <a onclick="event.preventDefault();
                                  document.getElementById('dis-form{{ $comment[0]->id }}').submit();">
                                  <i class="fa fa-thumbs-down fa-2x" aria-hidden="true"></i>
                                  </a>
                                @else
                                  <a onclick="event.preventDefault();
                                  document.getElementById('set-form{{ $comment[0]->id }}').submit();">
                                  <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                  </a>
                                @endif
                              {{$comment[0]->rates->count()}}
                              <form id="set-form{{  $comment[0]->id }}" action="/questions/{{ $question->id }}/{{$comment[0]->id}}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                                {{ method_field('PUT') }}
                              </form>

                              <form id="dis-form{{  $comment[0]->id }}" action="/questions/{{ $question->id }}/{{$comment[0]->id}}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                                {{ method_field('PUT') }}
                              </form>

                            </div>
                        </div>
                        @endforeach
                        <!-- /.comment -->

                    </div>
                    <!-- /#comments -->


                    <div id="comment-form">
                        <h4 class="text-uppercase">Ответить на вопрос</h4>
                        <form action="/questions/{{ $question->id }}/comment" method="POST">
                          {{ csrf_field() }}


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text">Ответ</label>
                                        <textarea name="text" id="text" class="form-control"  rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-template-main"><i class="fa fa-comment-o"></i> Отправить</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /#comment-form -->


                </div>
                <!-- /#blog-post -->

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
                <!-- /.col-md-3 -->

                <!-- *** RIGHT COLUMN END *** -->


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->












<script>
$(function() {
//    $('#deleteBtn').click(function(event) {
//        if (confirm("Действительно хотите удалить этот тип?")) {
//            event.preventDefault();
//            document.getElementById('destroy-form').submit();
//        }
//    });
});
</script>
@stop
