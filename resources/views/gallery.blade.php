<!-- resources/views/articles.blade.php -->

@extends('layouts.app')

@section('content')
  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой статьи -->
    <form action="{{ url('/gallery/do') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Имя статьи -->
      <div class="form-group">
        <label for="" class="col-sm-3 control-label">Галлерея</label>

        <div class="col-sm-6">
          <input type="file" name="image" class="form-control" required>
        </div>
      </div>

      <!-- Кнопка добавления статьи -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-pencil"></i> Загрузить картинку
          </button>
        </div>
      </div>
    </form>
  </div>

  <div>
  @foreach ($images as $key=>$image)
      @if ($key > 1)
          <img src="{{'../images/'.$image}}" width="400" height="200">
      @endif
  @endforeach
  </div>
@endsection
