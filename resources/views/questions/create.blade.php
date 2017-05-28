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
                             @foreach($categories as $category)
                              @foreach ($category->subcategories as $subcategory)
                                 <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                             @endforeach


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

<script>
// $(function() {
//    $('#deleteBtn').click(function(event) {
//        if (confirm("Действительно хотите удалить этот тип?")) {
//            event.preventDefault();
//            document.getElementById('destroy-form').submit();
//        }
//    });
// });
//
</script>

@stop
