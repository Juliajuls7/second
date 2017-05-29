@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Редактирование вопроса</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="/home">Home</a>
                          </li>
                          <li><a href="/questions">Questions</a>
                          </li>
                          <li>Редактирование вопроса</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>




      <div class="container">

          <div class="row">
              <div class="col-md-6">
                  <div class="box">
                      <h2 class="text-uppercase">Редактирование вопроса</h2>
                      <hr>

                      <form class="form-horizontal" role="form" action="/questions/edit/{{ $question->id }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="category">Категория</label>
                            <select class="form-control" id="category" name = "category">
                              @foreach($categories as $category)
                                 <option value="{{$category->id}}"
                                 @if($category->id == $question->category_id)
                                 selected
                                 @endif
                                 >{{$category->name}}</option>
                             @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="subcategory">Подкатегория</label>
                            <select class="form-control" id="subcategory" name = "subcategory">
                              @foreach ($category->subcategories as $subcategory)
                                  <option value="{{$subcategory->id}}"
                                    @if($subcategory->id == $question->subcategory_id)
                                      selected
                                      @endif
                                  >{{$subcategory->name}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                              <label for="email">Email</label>

                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif

                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password">Password</label>
                              <input id="password" type="password" class="form-control" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password-confirm">Confirm Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                          </div>
                      </form>
                  </div>
              </div>



          </div>
          <!-- /.row -->

      </div>
      <!-- /.container -->



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Редактирование вопроса</div>

                <div class="panel-body">
                   <form action="/questions/edit/{{ $question->id }}" method="post">
                        <div class="form-group">
                            <label for="subcategory">Подкатегория</label>
                           <select class="form-control" id="subcategory" name = "subcategory">
                              @foreach($subcategories as $subcategory)
                                 <option value="{{$subcategory->id}}"
                                 @if($subcategory->id == $question->subcategory_id)
                                 selected
                                 @endif
                                 >{{$subcategory->name}}</option>
                             @endforeach
                            </select>


                        </div>

                        <div class="form-group">
                        <label for="head">Заголовок</label>

                            <input class="form-control" type="text" id="head" name="head" value="{{ $question->head }}">
                        </div>

                          <div class="form-group">
                        <label for="text">Текст вопроса</label>
                            <textarea class="form-control" type="text" id="text" name="text" rows="3">{{ $question->text }}</textarea>
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
