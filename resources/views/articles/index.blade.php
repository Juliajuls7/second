@extends('layouts.app')

@section('content')

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Статьи</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="/">На главную</a>
                    </li>
                    <li>Статьи</li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
      <a type="button"  href="/articles/create" class="btn btn-lg btn-template-primary">Написать свою статью</a>
    <hr>
        <div class="row">
            <!-- *** LEFT COLUMN ***
_________________________________________________________ -->

            <div class="col-md-9" id="blog-listing-big">
              @foreach ($articles as $article)
                <section class="post">

                  <div class="col-sm-3 col-md-2 text-center-xs">
                      <p>
                         <img src="{{$article->user->photo}}" class="img-responsive img-circle" alt="">
                      </p>
                  </div>

                    <h2><a href="/articles/{{ $article->id }}">{{ $article->head }}</a></h2>
                    <div class="row">
                      <div class="clearfix">
                            <p class="author-category">By <a href="/users/{{ $article->user->id }}">{{ $article->user->name }}</a>
                            </p>

                          <a href="#">{{ $article->subcategory->category->name}}</a>
                            >
                            <a href="#">{{ $article->subcategory->name }}</a>
                          <p class="date-comments">

                              <a href="#"><i class="fa fa-calendar-o"></i> {{ $article->created_at->diffForHumans() }}</a>
                              <a href="#"><i class="fa fa-comment-o"></i>{{ count($article->comments) }}  Comments</a>

                         </p>
                      </div>
                    </div>
                    <p class="intro">{!! $article->text !!}</p>
                    <p class="read-more">
                        <a href="/articles/{{ $article->id }}" class="btn btn-template-main">Продолжить чтение</a>
                        @if (Role::admin())
                        <a href="/articles/edit/{{$article->id}}" class="btn btn-template-main">Редактировать</a>
                        <a class="btn btn-template-main" href="/articles/{{ $article->id }}"
                              onclick="event.preventDefault();
                           document.getElementById('destroy-form{{ $article->id }}').submit();">
                             Удалить
                         </a>
                         @endif
                   </p>
                  <form id="destroy-form{{ $article->id }}" action="/articles/{{ $article->id }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  </form>
                   <hr>
                </section>
                @endforeach
            </div>
            <div class="text-center" >
            {{ $articles->links() }}
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
                        <p>Поделитесь своими знаниями с другими пользователями, написав статью и повышайте себе рейтинг
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
@stop
