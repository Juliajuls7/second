@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редактирование вопроса</div>

                <div class="panel-body">
                   <form action="/categories/subcategories/edit/{{ $subcategory->id }}" method="post">
                        <div class="form-group">
                            <label for="category">Категория</label>
                           <select class="form-control" id="category" name = "category">
                              @foreach($categories as $category)
                                 <option value="{{$category->id}}"
                                 @if($category->id == $subcategory->category_id)
                                 selected
                                 @endif
                                 >{{$category->name}}</option>
                             @endforeach
                            </select>
                            
                          
                        </div>
                        
                        <div class="form-group">
                        <label for="head">Подкатегория</label>
                           
                            <input class="form-control" type="text" id="name" name="name" value="{{ $subcategory->name }}">
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