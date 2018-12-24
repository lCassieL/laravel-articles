<!-- resources/views/articles.blade.php -->

@extends('layouts.app')

@section('content')
  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой статьи -->
    <form action="{{ url('admin/update/do/'.$article_item->id) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя статьи -->
      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Статья</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="article-name" value="{{ $article_item->name }}" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Короткий текст</label>

        <div class="col-sm-6">
          <textarea name="shortText" id="article-short-text" class="form-control">{{ $article_item->shortText }}</textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Длинный текст</label>

        <div class="col-sm-6">
        <textarea name="allText" id="article-long-text" class="form-control">{{ $article_item->allText }}</textarea>
        </div>
      </div>

      <!-- Кнопка добавления статьи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Изменить статью
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
