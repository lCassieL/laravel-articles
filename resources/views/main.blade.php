<!-- resources/views/articles.blade.php -->

@extends('layouts.app')

@section('content')
  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    
<!-- Текущие статьи -->
  @if (count($articles) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Текущая статьи
      </div>

      <div class="panel-body">
        <table class="table table-striped article-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Article</th>
            <th>Short text</th>
            <th>Date of creating</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($articles as $article)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div><a href="{{Request::url().'/item/'.$article->id}}">{{ $article->name }}</a></div>
                </td>

                <td class="table-text">
                  <div>{{ $article->shortText }}</div>
                </td>

                <td class="table-text">
                  <div>{{ gmdate("M d Y H:i:s",$article->dateCreating) }}</div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection
