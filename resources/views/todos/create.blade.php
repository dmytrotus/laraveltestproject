@extends('layouts.app')

@section('content')

<div class="container">
	<h1 class="text-center my-5">Create Todos</h1>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">Create new Todo</div>
				<div class="card-body">
					<form method="POST" action="store-todos" enctype="multipart/form-data">
						@csrf
					<div class="form-group">
					<input type="text" placeholder="Write title here....." class="form-control" name="name">
					</div>
					<div class="form-group">
						<textarea name="description" placeholder="Write text here....." cols="30" rows="10" class="form-control"></textarea>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-success">Create Todo</button>
					
					</div>

					<div class="float-left">
						<label for="images">Add images</label>
						<input type="file" class="form-control" name="images[]" id="images" multiple>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>


</div>

@endsection