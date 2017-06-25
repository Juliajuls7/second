@extends('layouts.app')

@section('content')

<div id="heading-breadcrumbs">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <h1>Создание вопроса</h1>
          </div>
          <div class="col-md-6">
              <ul class="breadcrumb">
                  <li><a href="/">На главную</a>
                  </li>
                  <li><a href="/questions">Вопросы</a>
                  </li>
                  <li>Создание вопроса</li>
              </ul>
          </div>
      </div>
  </div>
</div>
<div class="container">
    <div class="row">
      <div id="content" class="clearfix">
        <div class="box clearfix">
          <form action="/questions" method="post">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label for="category">Категория</label>
                 <select class="form-control" id="category" name = "category">
                   @foreach($categories as $category)
                       <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                  </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label for="subcategory">Подкатегория</label>
                 <select class="form-control" id="subcategory" name = "subcategory">
                  </select>
                </div>
            </div>

            <div class="form-group">
            <label for="head">Заголовок</label>
                <input class="form-control" type="text" id="head" name="head" required>
            </div>
              <div class="form-group">
            <label for="text">Текст вопроса</label>
                <textarea class="form-control" type="text" id="text" name="text" rows="3" required></textarea>
            </div>
            {{ csrf_field() }}
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Отправить</button>
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
