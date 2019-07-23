@extends('layouts.app')

@section('content')

<div class="container">
	<h1 class="text-center my-5">Edit Todo {{ $todo->id }}</h1>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Create new Todo</div>
				<div class="card-body">
					<form method="POST" action="/todos/{{ $todo->id }}/update-todos" enctype="multipart/form-data">
						@csrf
					<div class="form-group">
						@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
					<input type="text" placeholder="Write title here....." class="form-control" name="name" value="{{ $todo->name }}">
					</div>
					<div class="form-group">
						<textarea name="description" placeholder="Write text here....." cols="30" rows="10" class="form-control">{{$todo->description}}</textarea>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-success">Update Todo</button>


						<div class="float-left">
						<label for="images">Add images</label>
						<input type="file" class="form-control" name="images[]" id="images" multiple>
						</div>
						
					
					</div>

					</form>

				</div>
			</div>
		</div>
	</div>


</div>

@endsection