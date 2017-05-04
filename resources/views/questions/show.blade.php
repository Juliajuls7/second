@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Просмотр вопроса <a href="/questions/" class="btn btn-warning">Все вопросы</a></div>

                <div class="panel-body">
                 
                  <div class="form-group">
                   
                          
                           <h3>
                                <a href="/question/">{{ $question->head }}</a>
                            </h3>
                                <p><i class="fa fa-bullhorn" aria-hidden="true"></i> Опубликовано {{ $question->created_at->format('d.m.Y') }}</p>
                                <p>{!! $question->text !!}</p>
                            
                            <hr>
                           
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