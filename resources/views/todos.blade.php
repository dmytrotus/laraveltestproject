@extends('layouts.todos')
@section('content')
  <div class="container">

 
    <!--  {{ $todos }} -->
  <div class="row">
    <div class="col-md-5 mt-3 list-group">

      <div class="list-group-item">
    <form method="POST" enctype="multipart/form-data" action="/import">
      @csrf
    <button type="submit" name="Import" value="Import" class="btn btn-success">Import Todos From File</button>
    <input type="file" class="form-control" name="excel" id="excel">
    <button type="submit" name="UpdateImport" value="UpdateImport" class="btn btn-info">Update Todos From File</button>
    </form>
      </div>

    <div class="list-group-item">
      <a href="/export" class="btn btn-warning">Export Todos From Site</a>
    </div>
      </div>

      <div class="col-md-7">
        <div class="card card-default">
        <div class="card-header">Todos</div>
        <div class="card-body">
          <!-- Повідомлення про доданий товар -->
      @if(session()->has('success'))
      <li class="alert alert-success">
        {{ session()->get('success') }}
      </li>
      @endif
      @if(session()->has('deleted'))
      <li class="alert alert-danger">
        {{ session()->get('deleted') }}
      </li>
      @endif
     <!--  Completed and uncompleted -->
      @if(session()->has('completed'))
      <li class="alert alert-success">
        {{ session()->get('completed') }}
      </li>
      @endif
      @if(session()->has('uncomplete'))
      <li class="alert alert-success">
        {{ session()->get('uncomplete') }}
      </li>
      @endif
      <!--  Completed and uncompleted -->
          @foreach($todos as $todo)
            <ul class="list-group">
              <h4>{{ $todo->name }}</h4>
                <li class="list-group-item"> 
                {{ $todo->description }}
                <!-- <a href="/todos/{{ $todo->name }}" style="float:right; " class="btn btn-primary">View</a> -->
                @if(!$todo->completed)
                <a href="/todos/{{ $todo->id }}/complete" style="float:right;" class="mr-2 btn btn-warning">Complete</a>
                @else
                <a href="/todos/{{ $todo->id }}/uncomplete" style="float:right;" class="mr-2 btn btn-info">Uncomplete</a>
                @endif
                <a href="/todos/{{ $todo->id }}" style="float:right; " class="btn btn-primary mr-2">View</a>
                <a href="/todos/{{ $todo->id }}/delete" style="float:right;" class="btn btn-danger mr-2">Delete</a>
                <img style="float:right; margin-right: 5px;"
                src="{{ url('/') }}/public/storage/{{ $todo->images }}" width="120px" height="60px" alt="">

                </li> 
            </ul>
            @endforeach
        </div>
      </div>
    </div>

    </div>
@endsection