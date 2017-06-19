@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Категории</h1>
                  </div>
                  <div class="col-md-6">
                      <ul class="breadcrumb">
                          <li><a href="/home">Home</a>
                          </li>
                          <li>Категории</li>
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
                                  <a type="button"  href="/categories/create" class="btn btn-lg btn-template-primary">Создать категорию</a>
                                <hr>

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                @foreach($categories as $category)

                                 <div class="panel panel-default">
                                   <div class="panel-heading" role="tab" id="headingOne">
                                     <h4 class="panel-title">
                                       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$category->id}}" aria-expanded="false"  aria-controls="collapse{{$category->id}}">
                                      {{$category->name}}
                                       </a>
                                             <span class="read-more"><a href="categories/subcategories/{{ $category->id}}" class="btn btn-template-main">Подкатегории</a>
                                             </span>
                                             <span class="read-more"><a href="/categories/edit/{{ $category->id}}" class="btn btn-template-main">Редактировать</a>
                                             </span>
                                             <span class="read-more"><a href="/categories/{{ $category->id }}" onclick="event.preventDefault();
                                                document.getElementById('destroy-form{{ $category->id }}').submit();"class="btn btn-template-main" >Удалить</a>
                                             </span>
                                             <form id="destroy-form{{ $category->id }}" action="/categories/{{ $category->id }}" method="POST" style="display: none;">
                                                 {{ csrf_field() }}
                                                 {{ method_field('DELETE') }}
                                             </form>
                                     </h4>
                                   </div>
                                             <div id="collapse{{$category->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                @if (count($category->subcategories)>0)
                                                   <ul class="list-group">
                                                       @foreach ($category->subcategories as $sub)
                                                           <li class="list-group-item">
                                                               <a href="#" >{{$sub->name}}</a>
                                                               <span class="read-more"><a href="/categories/subcategories/edit/{{ $sub->id }}" class="btn btn-xs btn-template-main">Редактировать</a>
                                                               </span>
                                                               <span class="read-more"><a href="/categories/subcategories/{{ $sub->id }}" onclick="event.preventDefault();
                                                                  document.getElementById('destroy-form{{ $sub->id }}').submit();"class="btn btn-xs btn-template-main" >Удалить</a>
                                                               </span>
                                                               <form id="destroy-form{{ $sub->id }}" action="/categories/subcategories/{{ $sub->id }}" method="POST" style="display: none;">
                                                                   {{ csrf_field() }}
                                                                   {{ method_field('DELETE') }}
                                                               </form>
                                                           </li>
                                                       @endforeach
                                                  </ul>
                                                @endif
                                             </div>
                                  </div>
                                 @endforeach
                               </div>

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
//     $('#deleteBtn').click(function(event) {
//         if (confirm("Действительно хотите удалить этот город?")) {
//             event.preventDefault();
//             document.getElementById('destroy-form').submit();
//         }
//     });
// });
</script>
@stop
