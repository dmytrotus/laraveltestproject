<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;
use App\Imports\TodosImport;
use App\Exports\TodosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; //для зберігання фоток
use Illuminate\Support\Facades\Input; //для двох різних функцій на одній формі

class TodosController extends Controller
{
    public function index(){

    //$todos = Todo::all();

    	return view('todos')->with('todos', Todo::all());
    	//return view('todos');
    	
    }

   /* public function show(Todo $todo)
    {
    	//$todo = Todo::find($todoId);
    	return view('show')->with('todo', $todo);
    }*/

    public function show(Todo $todo)
    {
        //$todo = Todo::find($todoId);
        return view('show')->with('todo', $todo);
    }

    public function create()
    {
    	return view('todos.create');
    }

    /*public function store()
    {
    	$this->validate(request(), [ //перевірка чи заповнені поля
    		'name' => 'required',
    		'description' => 'required'
    	]);

    	//dd(request()->all());
    	$data = request()->all();

    	$todo = new Todo();

    	$todo->name = $data['name'];// Пишемо
    	$todo->description = $data['description'];//Пишемо 
    	$todo->completed = false;// в БД є незаповнена ячейка

    	$todo->save();

        session()->flash('success', 'Todo Created');

    	return redirect('/todos'); // повертаємо вид
    }*/

    public function store(Request $request, Todo $todo)
    {

        $this->validate(request(), [ //перевірка чи заповнені поля
            'name' => 'required|min:2',
            'description' => 'required',
            //'images' => 'mimes:jpg,jpeg,png|max:2048'
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->file('images') !== null)
            {

        foreach($request->file('images') as $image)
            {
                $name = $image->getClientOriginalName();
                //$name = $image->
                $image->move(storage_path().'/app/public/todos', $name);  
                $images[] = $name;  
            }

        $todo->images = json_encode($images);

            }



        //dd($request->all()); //робив для тегів
        // upload the image
        //dd($request->image);
        //dd($request->image->store('posts')); //- спочатку дивимось чи залишає хеш
        /*Страндартно в ларавел всі файли кодуються і приватні. Щоб файли або фотки були для public треба зайти config\filesystems.php 'default' => env('FILESYSTEM_DRIVER', 'local'),
        це значить що файлова система закодована. В файлі filesystems.php нічого не міняємо, але в файлі в головній директорії .env після рядків про БД (необовязково) ставимо FILESYSTEM_DRIVER=public
        потім щоб зробити память доступною то треба написати php artisan storage:link */
        //dd($request->images->store('todos'));
       //$images = $request->images->store('todos');
        // create the post
        $todo = Todo::create([
            'name' => $request->name,
            'description' => $request->description,
            'images' => $todo->images,
            'completed' => false
                
        ]);       
       

        //flash the message

        session()->flash('success','Todo сворено');
        //redirect the user
        return redirect('/todos');

    }

    public function edit($todoId)
    {
         
    	$todo = Todo::find($todoId);

    	return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request,Todo $todo)
    {
    	$this->validate(request(), [ //перевірка чи заповнені поля
    		'name' => 'required|min:2',
    		'description' => 'required',
            //'images' => 'mimes:jpg,jpeg,png|max:2048'
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
    	]);

        $data = $request->only(['name','description']);

        if ($request->hasFile('images')){

            foreach($request->file('images') as $image)
            {
                $name = $image->getClientOriginalName();
                //$name = $image->
                $image->move(storage_path().'/app/public/todos', $name);  
                $images[] = $name;  
            }

        $todo->images = json_encode($images);

        }

        //$form = new Form();
        

        //обновляемо атрибути
        $todo->update($data);
    	

    	//$todo->name = $data['name'];// Перезаписуємо
    	//$todo->description = $data['description'];//Перезаписуємо
    	//$todo->description = $data->description;//Перезаписуємо 2ий спосіб походу працює для об'єктів

    	//$todo->save();
        session()->flash('success', 'Todo оновлено');

    	return redirect('/todos');
    	//return view('show')->with('todo', $todo);
    	//return view('todos.edit')->with('todo', $todo);


    }

    public function destroy($todoId)
    {
    	$todo = Todo::find($todoId);

    	$todo->delete();
        session()->flash('deleted', 'Todo deleted');
    	return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        session()->flash('completed', 'Completed');
        return redirect('/todos');
    }
    public function uncomplete(Todo $todo)
    {
        $todo->completed = false;
        $todo->save();

        session()->flash('uncomplete', 'Uncompleted');
        return redirect('/todos');
    }

    public function import() 
    {

    if(Input::get('Import')) {
        $this->validate(request(), [ //перевірка чи заповнені поля
            'excel' => 'required'
        ]);
        //Excel::import(new TodosImport, 'todos.xlsx');імпортує файл з /public
        Excel::import(new TodosImport, request()->file('excel'));//імпортувати файли з ікселя(обовязково поставитиформу, верифікацію @csrf кнопку submit)
        
        return redirect('/todos')->with('success', 'Імпортовано');
        

    } else if(Input::get('UpdateImport')) {

         $this->validate(request(), [ //перевірка чи заповнені поля
            'excel' => 'required'
        ]);
        
        //$todos = Excel::toCollection(new TodosImport(), $request->file('excel'));
        $todos = Excel::toCollection(new TodosImport, request()->file('excel'));
        //Excel::import(new TodosImport, request()->file('excel')); 

        foreach ($todos[0] as $todo) {
            Todo::where('id', $todo['id'])->update([
                'name'     => $todo['name'],
                'description'    => $todo['description'], 
                'completed' => $todo['completed']

            ]);
        }
        
        return redirect('/todos')->with('success', 'Оновлено імпорт');

    }


    }


    /*public function import() 
    {


        $this->validate(request(), [ //перевірка чи заповнені поля
            'excel' => 'required'
        ]);
        //Excel::import(new TodosImport, 'todos.xlsx');імпортує файл з /public
        Excel::import(new TodosImport, request()->file('excel'));//імпортувати файли з ікселя(обовязково поставитиформу, верифікацію @csrf кнопку submit)
        
        return redirect('/todos')->with('success', 'Імпортовано');


    }*/

    public function export() 
    {
       return Excel::download(new TodosExport, 'todosexport.xlsx');
    }

    public function updateImport(Request $request) 
    {
        $this->validate(request(), [ //перевірка чи заповнені поля
            'excel' => 'required'
        ]);
        
        //$todos = Excel::toCollection(new TodosImport(), $request->file('excel'));
        $todos = Excel::toCollection(new TodosImport, request()->file('excel'));
        //Excel::import(new TodosImport, request()->file('excel')); 

        foreach ($todos[0] as $todo) {
            Todo::where('id', $todo['id'])->update([
                'name'     => $todo['name'],
                'description'    => $todo['description'], 
                'completed' => $todo['completed']

            ]);
        }
        
        return redirect('/todos')->with('success', 'Оновлено імпорт');
    }

}
