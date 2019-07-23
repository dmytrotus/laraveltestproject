@extends('products.mainapp')
@section('content')

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/products_and_cats') }}">
                    Продукти і фільтр
                </a>
                <a class="btn btn-success" href="{{ url('/addpdt') }}">
                    Додати товар
                </a>

            </div>
        </nav>

   <div class="py-4">
    <div class="container">

            <form
            @isset($product)
            action="{{ route('admin.products.update', ['id'=>$product->id]) }}"
            @endisset
            @empty($product)
            action="{{ route('admin.products.store') }}"
            @endempty
            method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="title" class="form-control"
                    @isset($product)
                     value="{{$product->title}}"
                    @endisset
                     >
                </div>
                <div class="form-group">
                    <label for="cat_id">Cat_id*</label>
                    <input type="number" name="cat_id" class="form-control"
                    @isset($product)
                     value="{{$product->cat_id}}"
                    @endisset
                     step="0.01">
                </div>
                <div class="form-group">
                    <label for="options">Options</label>
                    <div class="row">
                        <div class="col-md-2">
                            Key:
                        </div>
                        <div class="col-md-4">
                            Value:
                        </div>
                    </div>
                    @for ($i=0; $i <= 4; $i++)
                    @isset($product)
                    <div class="row">
            <div class="col-md-2">
                <input type="text" name="options[{{ $i }}][key]" class="form-control" 
                  value="{{ $product->options[$i]['key'] ?? '' }}">
            </div>
            <div class="col-md-4">
                <input type="text" name="options[{{ $i }}][value]" class="form-control" 
                  value="{{ $product->options[$i]['value'] ?? '' }}">
            </div>
        </div>
                    @endisset
                    @empty($product)
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="options[{{ $i }}][key]" class="form-control" value="{{ old('options['.$i.'][key]') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="options[{{ $i }}][value]" class="form-control" value="{{ old('options['.$i.'][value]') }}">
                        </div>
                    </div>
                    @endempty
                    @endfor
                </div>
                <div>
                    @isset($product)
                    <input value="Оновити" class=" btn btn-warning" type="submit">
                    @endisset
                    @empty($product)
                    <input class=" btn btn-danger" type="submit">
                    @endempty
                </div>
            </form>
    </div>
</div>


@endsection