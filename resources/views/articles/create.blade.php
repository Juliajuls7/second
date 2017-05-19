@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Создание статьи</div>

                <div class="panel-body">
                    <form action="/articles" method="post">
                        <div class="form-group">
                          <label for="subcategory">Подкатегория</label>
                           <select class="form-control" id="subcategory" name = "subcategory">
                             @foreach($subcategories as $subcategory)
                                 <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                             @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="head">Заголовок</label>
                            <input class="form-control" type="text" id="head" name="head">
                        </div>

                          <div class="form-group">
                        <label for="text">Текст</label>
                            <textarea class="form-control" type="text" id="text" name="text" rows="5"></textarea>
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
