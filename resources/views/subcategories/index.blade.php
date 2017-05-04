@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Все подкатегории <a href="/subcategories/create" class="btn btn-warning btn-sm">Добавить</a>
                </div>

                <div class="panel-body">
                   @foreach ($subcategories as $subcategory)
                    <ul>
                       <li>{{ $subcategory->name }}
                       <a class="btn btn-info btn-sm" href="/subcategories/edit/{{ $subcategory->id }}">Редактирование</a>
                 
                  <a class="btn btn-danger btn-sm" href="/subcategories/{{ $subcategory->id }}"
                      onclick="event.preventDefault();
                               document.getElementById('destroy-form{{ $subcategory->id }}').submit();">
                     Удалить
                  </a>

                  <form id="destroy-form{{ $subcategory->id }}" action="/subcategories/{{ $subcategory->id }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                  </form>
                <a href="/subcategories/" class="btn btn-warning btn-sm">Подкатегории</a>
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