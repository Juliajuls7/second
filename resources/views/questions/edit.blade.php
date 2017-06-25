@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Редактирование вопроса</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb">
                    <li><a href="/home">Home</a>
                    </li>
                    <li><a href="/questions">Вопросы</a>
                    </li>
                    <li>Редактирование вопроса</li>
                </ul>
            </div>
        </div>
  </div>
</div>

<div class="container">
    <div class="row">
      <div id="content" class="clearfix">
        <div class="box clearfix">
          <form class="form-horizontal" role="form" action="/questions/edit/{{ $question->id }}" method="post">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label for="category">Категория</label>
                  <select class="form-control" id="category" name = "category">
                      @foreach($categories as $category)
                         <option value="{{$category->id}}"
                           @if($category->id == $question->subcategory->category_id)
                           selected
                           @endif
                           >{{$category->name}}
                       </option>
                     @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label for="subcategory">Подкатегория</label>
                  <select class="form-control" id="subcategory" name = "subcategory">
                    @foreach ($category->subcategories as $subcategory)
                        <option value="{{$subcategory->id}}"
                          @if($subcategory->id == $question->subcategory_id)
                            selected
                            @endif
                        >{{$subcategory->name}}</option>
                    @endforeach
                   </select>
                </div>
            </div>

            <div class="form-group">
            <label for="head">Заголовок</label>
                <input class="form-control" type="text" id="head" name="head" value="{{ $question->head }} required">
            </div>
              <div class="form-group">
            <label for="text">Текст вопроса</label>
                <textarea class="form-control" type="text" id="text" name="text" rows="3 required">{{ $question->text }}</textarea>
            </div>
            {{ csrf_field() }}
             {{ method_field('PUT') }}
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Сохранить изменения</button>
            </div>
        </form>
      </div>
    </div>
<!-- /.row -->
  </div>
<!-- /.container -->
</div>
<!-- /#content -->

      @stop
      @section ('localjs')
      <script>
      $(function () {
        function loadSub() {
          $.get('/api/categories/sub/'+$('#category').val(), function (data) {
            $('#subcategory').empty();
            $.each(data, function(key, value) {
              if (value['id']=={{ $question->subcategory->id }}) {
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
