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
                  </div>

                  <hr>

                  <form action="/questions/{{ $question->id }}/comment" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="text">Ваш комментарий</label>
                      <textarea name="text" id="text" rows="4" cols="80" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Отправить</button>
                  </form>

                  <hr>

                  <div class="list-group">
                    @foreach ($comments as $comment)
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $comment->user->name }}</h5>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                      </div>
                      <p class="mb-1">{{ $comment->text }}</p>
                    </div>
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
