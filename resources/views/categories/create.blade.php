@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Добавление категории</div>

                <div class="panel-body">
                    <form action="/categories" method="post">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input class="form-control" type="text" id="name" name="name">
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