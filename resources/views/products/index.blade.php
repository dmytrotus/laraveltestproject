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
                <div class="row">

                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="">Категорії</a>
                            </li>
                            <li class="list-group-item">
                                <a href="">Фільтр</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Список товарів</div>
                            @foreach($products as $product)
                            <div class="card card-body">
                            <a href="{{ url('/pdt') }}/{{$product->id}}">{{$product->title}}</a>
                                <p>
                                   {{$product->cat_id}} 
                                </p>

                                @foreach($product->options as $option)
                                <p>
                                {{ $option['key'] }} - {{ $option['value'] }},
                                </p> 
                                @endforeach

                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>  
        </div>
  	
@endsection
