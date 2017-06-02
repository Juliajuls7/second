@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Создание вопроса</div>

                <div class="panel-body">
                    <form action="/questions" method="post">
                      <div class="form-group">
                          <label for="category">Категория</label>
                         <select class="form-control" id="category" name = "category">
                           @foreach($categories as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                          </select>

                      </div>


                        <div class="form-group">
                            <label for="subcategory">Подкатегория</label>
                           <select class="form-control" id="subcategory" name = "subcategory">

                            </select>
                        </div>

                        <div class="form-group">
                        <label for="head">Заголовок</label>
                            <input class="form-control" type="text" id="head" name="head">
                        </div>

                          <div class="form-group">
                        <label for="text">Текст вопроса</label>
                            <textarea class="form-control" type="text" id="text" name="text" rows="3"></textarea>
                        </div>
                        {{ csrf_field() }}



                        <button class="btn btn-default" type="submit">Создать</button>
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
        $('#subcategory')
         .append($("<option></option>")
            .attr("value",value['id'])
            .text(value['name']));
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
