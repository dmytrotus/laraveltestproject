@extends('layouts.app')
@section('content')

  <title>Hello, world!</title>
  </head>
  <body>
  	<div class="container">
    <h1 class="text-center my-5">Todo id number: {{ $todo->id }}</h1>
    <div class="card card-default">
	<div class="card-header">
    <h3 class="text-center">{{ $todo->name }}</h3>
    </div>
    <div class="card-body">
    <p>{{ $todo->description }}</p>
	</div>

	</div>
	<a href="/todos/{{ $todo->id }}/edit" class="btn btn-info btn-sm my-2">Edit</a>
  <a href="/todos/{{ $todo->id }}/delete" class="btn btn-danger btn-sm my-2">Delete</a>
    </div>


    <div class="container">
      <div class="card-header">
      <h3>Тут будуть фото</h3>

      <div class="column-xs-12 column-md-7">
        <div class="product-gallery">
          <div class="product-image">
            <img class="active" src="https://source.unsplash.com/W1yjvf5idqA">
          </div>
          <ul class="image-list">
            @if($todo->images)
            @foreach(json_decode($todo->images, true) as $image)
            <li class="image-item"><img src="{{ url('/') }}/public/storage/todos/{{ $image }}"></li>
            @endforeach
            @endif
          </ul>
        </div>
      </div>

      

          

      </div>



    </div>

@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/product-gallery/style.css">
@endsection

@section('scripts')
<script src="{{ url('/') }}/public/product-gallery/script.js" type="text/javascript"></script> 
@endsection