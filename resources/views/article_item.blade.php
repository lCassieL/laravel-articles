<!-- resources/views/articles.blade.php -->

@extends('layouts.app')

@section('content')
  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

  
      {{ csrf_field() }}
    @if (count($article_item) > 0)
      
<!-- Текущие задачи -->
    <div class="panel panel-default">
      <div class="panel-heading">
        Текущая статья
      </div>

      <div class="panel-body">
        <table class="table table-striped article-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Article</th>
            <th>Short text</th>
            <th>All text</th>
            <th>Date of creating</th>
            <th>Action</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $article_item->name }}</div>
                </td>

                <td class="table-text">
                  <div>{{ $article_item->shortText }}</div>
                </td>

                <td class="table-text">
                  <div>{{ $article_item->allText }}</div>
                </td>

                <td class="table-text">
                  <div>{{ gmdate("M d Y H:i:s",$article_item->dateCreating) }}</div>
                </td>

                <td class="table-text">
                <a href="{{URL::to('/').'/item/back'}}">
                    <button type="submit" class="btn btn-default">
                            <i class=""></i> К статьям
                    </button></a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
    @endif
@endsection
