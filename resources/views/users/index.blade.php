@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Все пользователи </div>

                <div class="panel-body">
                   @foreach ($users as $user)
                    <ul>
                       <li> {{ $user->name  }} Почта:  {{ $user->email }}    
                      
                  

                  <form id="destroy-form{{ $user->id }}" action="/users/{{ $user->id }}" method="POST" style="display: none;">
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