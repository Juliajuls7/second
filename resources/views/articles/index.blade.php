@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Все статьи <a href="/articles/create" class="btn btn-warning">Добавить</a></div>

                <div class="panel-body">

                  <div class="form-group">

                           @foreach ($articles as $article)
                           <h3>
                                <a href="/article/">{{ $article->head }}</a>
                            </h3>
                                <p><i class="fa fa-bullhorn" aria-hidden="true"></i> Опубликовано {{ $article->created_at->format('d.m.Y') }}</p>
                                <p>{!! $article->text !!}</p>
                            <a class="btn btn-primary" href="/articles/{{$article->id}}">Читать далее...</a>
                            <a class="btn btn-info" href="/articles/edit/{{$article->id}}">Редактировать</a>

                            <a class="btn btn-danger" href="/articles/{{ $article->id }}"
                                  onclick="event.preventDefault();
                               document.getElementById('destroy-form{{ $article->id }}').submit();">
                                 Удалить
                             </a>

                  <form id="destroy-form{{ $article->id }}" action="/articles/{{ $article->id }}" method="POST" style="display: none;">
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
