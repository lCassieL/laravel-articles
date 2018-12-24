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
      </div>

      <div class="panel-body text-center">
        

          
        

       
            @foreach ($articles as $article)
              
                
            <h1><a href="{{Request::url().'/item/'.$article->id}}">{{ $article->name }}</a></h1>
            

               
                  <div class="font-italic text-left">{{ $article->shortText }}</div>
              

               
                  <div class="text-left">{{ gmdate("M d Y H:i:s",$article->dateCreating) }}</div>
               
             
            @endforeach
         
      </div>
    </div>
   @endif
@endsection
