@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Все города <a href="/cities/create" class="btn btn-warning btn-sm">Добавить</a>
                </div>

                <div class="panel-body">
                   @foreach ($cities as $city)
                    <ul>
                       <li>{{ $city->name }}
                       <a class="btn btn-info btn-sm" href="/cities/edit/{{ $city->id }}">Редактирование</a>
                 
                  <a class="btn btn-danger btn-sm" href="/cities/{{ $city->id }}"
                      onclick="event.preventDefault();
                               document.getElementById('destroy-form{{ $city->id }}').submit();">
                     Удалить
                  </a>

                  <form id="destroy-form{{ $city->id }}" action="/cities/{{ $city->id }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                  </form>

                     
                      
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