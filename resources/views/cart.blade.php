<link rel="stylesheet" type="text/css" href="css/pretty-checkbox.css">
В кошику: 
            @foreach(Cart::content() as $pdt)
            <ul>
             <!-- Для фотки {{ asset($pdt->model->image)}} -->
              <p>Назва:{{$pdt->name}}</p>
              <p>Ціна:{{$pdt->price}}</p>
              <p>Кількість:<input min="1" type="number" value="{{$pdt->qty}}">штук</p>
              <a href="{{ route('cart.delete', ['id' => $pdt->rowId ] )}}" class="btn-btn-danger">Видалити</a>
            </ul>
            <hr>

            @endforeach
            Разом:<b>{{Cart::total()}}</b>


            <div class="pretty p-default p-round p-smooth">
        <input type="checkbox" />
        <div class="state p-primary">
            <label>Monday</label>
        </div>
    </div>

    <div class="pretty p-icon p-round p-smooth">
        <input type="checkbox" />
        <div class="state p-success">
            <i class="icon mdi mdi-check"></i>
            <label>Tuesday</label>
        </div>
    </div>

    <div class="pretty p-icon p-smooth">
        <input type="checkbox" />
        <div class="state p-danger-o">
            <i class="icon mdi mdi-close"></i>
            <label>Wednesday</label>
        </div>
    </div>

    <div class="pretty p-default p-curve p-thick p-smooth">
        <input type="checkbox" />
        <div class="state p-warning">
            <label>Thursday</label>
        </div>
    </div>

    <div class="pretty p-default p-curve p-thick p-smooth">
        <input type="checkbox" />
        <div class="state p-danger-o">
            <label>Friday</label>
        </div>
    </div>