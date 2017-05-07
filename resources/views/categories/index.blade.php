@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Все категории <a href="/categories/create" class="btn btn-warning btn-sm">Добавить</a>
                </div>

                <div class="panel-body">
                   @foreach ($categories as $category)
                    <ul>
                       <li>{{ $category->name }}
                           <a class="btn btn-info btn-sm" href="/categories/edit/{{ $category->id}}">Редактирование</a>

                           <a class="btn btn-danger btn-sm" href="/categories/{{ $category->id }}"                        onclick="event.preventDefault();
                              document.getElementById('destroy-form{{ $category->id }}').submit();">Удалить</a>

                          <form id="destroy-form{{ $category->id }}" action="/categories/{{ $category->id }}"               method="POST" style="display: none;">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                          </form>
                           <a href="/categories/subcategories/{{ $category->id }}" class="btn btn-warning btn-sm">Подкатегории</a>
                       </li> 
                   </ul>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

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