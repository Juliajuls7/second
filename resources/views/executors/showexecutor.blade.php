@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <h1>Исполнители</h1>
          </div>
          <div class="col-md-6">
              <ul class="breadcrumb">
                  <li><a href="/">На главную</a>
                  </li>

                  <li>Исполнители</li>
              </ul>
          </div>
      </div>
  </div>
</div>

<div id="content">
    <div class="container">

        <div class="row">

                      <div class="col-md-3">

                          <div class="panel panel-default sidebar-menu">

                              <div class="panel-heading">
                                  <h3 class="panel-title">Поиск</h3>
                              </div>

                              <div class="panel-body">
                                  <form role="search">
                                      <div class="input-group">
                                          <input type="text" class="form-control" placeholder="">
                                          <span class="input-group-btn">

          <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

          </span>
                                      </div>
                                  </form>
                              </div>
                          </div>

    @includeIf('executors.partials.categories')

                          <!-- *** MENUS AND FILTERS END *** -->

                      </div>
                      <!-- /.col-md-3 -->
            <div class="col-md-9" id="blog-listing-big">

            <hr>
              @foreach ($users as $user)
                <section class="post">
                  <div class="col-sm-3 col-md-2 text-center-xs">
                      <p>
                         <img src="{{$user->photo}}" class="img-responsive img-circle" alt="">
                      </p>

                        <p>Рейтинг  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        {{$user->rating_ex}}</p>

                  </div>
                    <h3><a href="/users/{{$user->id}}">{{ $user->name }}</a></h3>
                    <div class="row">
                      <div class="clearfix ">
                         Обо мне: {!! $user->about_myself !!}
                      </div>
                    </div>


                  <form id="destroy-form" action="/articles/" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  </form>
                   <hr>
                </section>
                @endforeach
            </div>
            <div class="text-center" >
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->


<script>
$(function() {
    $('#deleteBtn').click(function(event) {
        if (confirm("Действительно хотите удалить этот город?")) {
            event.preventDefault();
            document.getElementById('destroy-form').submit();
        }
    });
});
</script>
@stop
