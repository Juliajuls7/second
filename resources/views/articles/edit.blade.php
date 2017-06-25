@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Редактирование статьи</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="/home">Home</a>
                          </li>
                          <li><a href="/articles">Статьи</a>
                          </li>
                          <li>Редактирование статьи</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                   <form action="/articles/edit/{{ $article->id }}" method="post">
                     <div class="form-group">
                         <label for="category">Категория</label>
                        <select class="form-control" id="category" name = "category">
                            @foreach($categories as $category)
                               <option value="{{$category->id}}"
                               @if($category->id == $article->category_id)
                               selected
                               @endif
                               >{{$category->name}}</option>
                           @endforeach
                        </select>

                     </div>
                     <div class="form-group">
                         <label for="subcategory">Подкатегория</label>
                        <select class="form-control" id="subcategory" name = "subcategory">
                          @foreach ($category->subcategories as $subcategory)
                              <option value="{{$subcategory->id}}"
                                @if($subcategory->id == $article->subcategory_id)
                                  selected
                                  @endif
                              >{{$subcategory->name}}</option>
                          @endforeach
                         </select>
                     </div>


                        <div class="form-group">
                        <label for="head">Заголовок</label>
                            <input class="form-control" type="text" id="head" name="head" value="{{ $article->head }}">
                        </div>

                          <div class="form-group">
                        <label for="text">Текст</label>
                            <textarea class="form-control" type="text" id="text" name="text" rows="3">{{ $article->text }}</textarea>
                        </div>
                        {{ csrf_field() }}
                         {{ method_field('PUT') }}


                        <button class="btn btn-default" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

      @section ('localjs')
      <script>
      $(function () {

        function loadSub() {
          $.get('/api/categories/sub/'+$('#category').val(), function (data) {
            $('#subcategory').empty();
            $.each(data, function(key, value) {
              if (value['id']=={{ $article->subcategory->id }}) {
                $('#subcategory')
                 .append($("<option></option>")
                    .attr("value",value['id'])
                    .attr("selected","selected")
                    .text(value['name']));
              } else {
                $('#subcategory')
                 .append($("<option></option>")
                    .attr("value",value['id'])
                    .text(value['name']));
              }
            });
            $('#subcategory').prop('disabled', false);
          });
        }

        $('#category').on('change', function() {
          $('#subcategory').prop('disabled', 'disabled');
          loadSub();
        });

        loadSub();
      });
      </script>
      @stop
