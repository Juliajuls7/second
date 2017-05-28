@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Webdesign now</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="index.html">Home</a>
                          </li>
                          <li><a href="blog.html">Blog</a>
                          </li>
                          <li>Blog post</li>
                      </ul>

                  </div>
              </div>
          </div>
      </div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Просмотр вопроса <a href="/questions/" class="btn btn-warning">Все вопросы</a></div>

                <div class="panel-body">

                  <div class="form-group">
                           <h3>
                                <a href="/question/">{{ $question->head }}</a>
                            </h3>
                                <p><i class="fa fa-bullhorn" aria-hidden="true"></i> Опубликовано {{ $question->created_at->format('d.m.Y') }}</p>
                                <p>{!! $question->text !!}</p>
                  </div>

                  <hr>

                  <form action="/questions/{{ $question->id }}/comment" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="text">Ваш комментарий</label>
                      <textarea name="text" id="text" rows="4" cols="80" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Отправить</button>
                  </form>

                  <hr>

                  <div class="list-group">
                    @foreach ($comments as $comment)
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $comment->user->name }}</h5>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                      </div>
                      <p class="mb-1">{{ $comment->text }}</p>
                    </div>
                    @endforeach
                  </div>

                </div>
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


                    <p class="text-muted text-uppercase mb-small text-right">By <a href="/users">{{ $question->user->name }}</a> {{ $question->created_at->format('D, d M Y H:i:s') }}</p>
                        <div id="post-content">


                        <p>
                            <img src="/img/blog2.jpg" class="img-responsive" alt="Example blog post alt">
                        </p>

                        <h2>{{ $question->head }}</h2>
                        <p>{!! $question->text !!}</p>
                        


                    </div>
                    <!-- /#post-content -->

                    <div id="comments">
                        <h4 class="text-uppercase">{{ count($question->comments) }} comments</h4>

                          @foreach ($comments as $comment)
                        <div class="row comment">
                            <div class="col-sm-3 col-md-2 text-center-xs">
                                <p>
                                    <img src="/img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
                                </p>
                            </div>
                            <div class="col-sm-9 col-md-10">
                                <h5 class="text-uppercase">{{ $comment->user->name }}</h5>
                                <p class="posted"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</p>
                                <p>{{ $comment->text }}</p>
                                <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                        <!-- /.comment -->

                    </div>
                    <!-- /#comments -->


                    <div id="comment-form">
                        <h4 class="text-uppercase">Leave comment</h4>
                        <form action="/questions/{{ $question->id }}/comment" method="POST">
                          {{ csrf_field() }}


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text">Comment</label>
                                        <textarea name="text" id="text" class="form-control"  rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-template-main"><i class="fa fa-comment-o"></i> Post comment</button>
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

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="blog.html">Webdesign</a>
                                </li>
                                <li class="active"><a href="blog.html">Tutorials</a>
                                </li>
                                <li><a href="blog.html">Print</a>
                                </li>
                                <li><a href="blog.html">Our tips</a>
                                </li>
                            </ul>
                        </div>
                    </div>

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
