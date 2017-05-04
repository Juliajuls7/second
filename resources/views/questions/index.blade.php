@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Все вопросы <a href="/questions/create" class="btn btn-warning">Добавить</a></div>

                <div class="panel-body">
                 
                  <div class="form-group">
                   
                           @foreach ($questions as $question)
                           <h3>
                                <a href="/question/">{{ $question->head }}</a>
                            </h3>
                                <p><i class="fa fa-bullhorn" aria-hidden="true"></i> Опубликовано {{ $question->created_at->format('d.m.Y') }}</p>
                                <p>{!! $question->text !!}</p>
                            <a class="btn btn-primary" href="/questions/{{$question->id}}">Читать далее...</a>
                            <a class="btn btn-info" href="/questions/edit/{{$question->id}}">Редактировать</a>
                            
                            <a class="btn btn-danger" href="/questions/{{ $question->id }}"
                                  onclick="event.preventDefault();
                               document.getElementById('destroy-form{{ $question->id }}').submit();">
                                 Удалить
                             </a>

                  <form id="destroy-form{{ $question->id }}" action="/questions/{{ $question->id }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                  </form>
                            <hr>
                           @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
//    $('#deleteBtn').click(function(event) {
//        if (confirm("Действительно хотите удалить этот тип?")) {
//            event.preventDefault(); 
//            document.getElementById('destroy-form').submit();
//        }
//    });
});
</script>
@stop