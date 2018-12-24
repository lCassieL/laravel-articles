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
      </div>

      <div class="panel-body text-center">

         
               
          <h1>{{ $article_item->name }}</h1>
              

               
                 
               

                
                  <div class="text-left">{{ $article_item->allText }}</div>
              

               
                  <div class="text-left">{{ gmdate("M d Y H:i:s",$article_item->dateCreating) }}</div>
              

               
                <a href="{{URL::to('/').'/item/back'}}">
                    <button type="submit" class="btn btn-default">
                            <i class=""></i> К статьям
                    </button></a>
                
            
      </div>
    </div>
    @endif
@endsection
