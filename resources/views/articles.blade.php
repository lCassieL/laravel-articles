<!-- resources/views/articles.blade.php -->

@extends('layouts.app')

@section('content')
  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой статьи -->
    <form action="{{ url('admin/article') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя статьи -->
      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Статья</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="article-name" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Короткий текст</label>

        <div class="col-sm-6">
          <textarea name="shortText" id="article-short-text" class="form-control"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Длинный текст</label>

        <div class="col-sm-6">
        <textarea name="allText" id="article-long-text" class="form-control"></textarea>
        </div>
      </div>

      <!-- Кнопка добавления статьи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Добавить статью
          </button>
        </div>
      </div>
    </form>
  </div>
<!-- Текущие задачи -->
  @if (count($articles) > 0)
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
            <th>Long text</th>
            <th>Date of creating</th>
            <th>action</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($articles as $article)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $article->name }}</div>
                </td>

                <td class="table-text">
                  <div>{{ $article->shortText }}</div>
                </td>

                <td class="table-text">
                  <div>{{ $article->allText }}</div>
                </td>

                <td class="table-text">
                  <div>{{ gmdate("M d Y H:i:s",$article->dateCreating) }}</div>
                </td>

                <td>
                    <form action="{{url('admin/article/'.$article->id)}}" method="post">
<!--                        <input type="hidden" name="id" value="{{$article->id}}"/>-->
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-trash"></i> Удалить статью
                        </button>
                    </form>

                    <form action="{{url('admin/update/'.$article->id)}}" method="post">
<!--                        <input type="hidden" name="id" value="{{$article->id}}"/>-->
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default">
                             <i class="fa fa-pencil"></i> Изменить статью
                        </button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection
