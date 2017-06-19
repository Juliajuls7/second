@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Города</h1>
                  </div>
                  <div class="col-md-6">
                      <ul class="breadcrumb">
                          <li><a href="/">На главную</a>
                          </li>
                          <li>Города</li>
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
                                    <div class="form-group">
                                      <form action="/cities" method="post">
                                      <div class="col-sm-6 col-md-6">
                                          <input class="form-control" type="text" id="name" name="name">
                                      </div>
                                      {{ csrf_field() }}
                                      <button class="btn btn-lg btn-template-primary" type="submit">Добавить город</button>

                                      </form>
                                    </div>
                                <hr>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  @foreach ($cities as $city)
                                   <ul>
                                      <li>{{ $city->name }}
                                      <a class="btn btn-xs btn-template-main" href="/cities/edit/{{ $city->id }}">Редактирование</a>
                                       <a class="btn btn-xs btn-template-main" href="/cities/{{ $city->id }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('destroy-form{{ $city->id }}').submit();">
                                          Удалить
                                       </a>
                                       <form id="destroy-form{{ $city->id }}" action="/cities/{{ $city->id }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                       </form>
                                      </li>
                                  </ul>
                                  @endforeach

                               </div>

                                  </div>
                                  <!-- ***  END form-group *** -->
                                  <div class="text-center" >
                                  {{ $cities->links() }}
                                  </div>
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
$(function() {
    $('#deleteBtn').click(function(event) {
      event.preventDefault();
        if (confirm("Действительно хотите удалить этот город?")) {

            document.getElementById('destroy-form').submit();
        }
    });
});
</script>
@stop
