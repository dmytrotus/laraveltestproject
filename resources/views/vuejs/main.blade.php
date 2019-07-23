@extends('vuejs.index')
@section('content')
<div id="app">

<div class="card-header text-center"><h1>Головна</h1></div>
<input type="" name="" v-bind:value="{{'inputmassage'}}">
@{{message}}

<div class="inputvalue">Тут значення з інпут: @{{inputmassage}}</div>

<h2 v-if="status == 245">Истина</h2>
<h2 v-else="status == 244">Ложь потому что статус:@{{status}}</h2>

<template v-if="lipsum == 1">
	<h3>Lipsum</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum totam laborum obcaecati quisquam nulla cum doloribus ab non praesentium sunt. Harum modi alias eaque maxime vero nesciunt minus nisi ipsam.</p>
</template>

<template v-else="lipsum == 2">
	<h3>Lipsum = 2 </h3>
	<p>2222222</p>
</template>

<h5 v-show="vshow">Заголовок з v-show</h5>

<div v-bind:class="{yellow: isYellow, 'btn-warning col-2': isBtn }">Тут буде класс yellow</div>

<div class="dafault" :class="[ isActive ? 'active' : 'disabled', 'onlyclass']">isActive</div>

<ul>
	<li v-for="item in list">@{{item}}</li>
</ul>

<ul>
	<li v-for="user in users">@{{user.name}}</li>
</ul>
<button class="btn btn-danger" @click="MyFunction">Виконання функції</button>

<button class="btn btn-success" @click="changeName">Поміняти Імя Сірожа на Васьок</button>
<button class="btn btn-warning" @click="high">@{{counter}}</button>


</div>

<script type="text/javascript">
	new Vue({   //var app = new Vue({ якщо присвоїти перемінну то можна звертатись потім до елемента app.message app.data і так далі
		el:'#app',
		data: { 

		message: 'Hello Vuejs',
		inputmassage: 'Input',
		status: 244,
		lipsum: 2,
		vshow: 1,
		isYellow: 0,
		isBtn: 1,
		isActive : 1,
		list: ['один', 'два', 'три'],
		users: [
			{ id:1, name: 'Іван' },
			{ id:2, name: 'Сірожа' }
				],
		counter: 1
		},

		methods: {

			MyFunction() {
				alert ('Натиснув на кнопку "Виконання функції"');
			},
			changeName(){

				users[1].name = 'Васьок';
				alert ('Імя змінено');
			},
			high(){
				this.counter++;
			}
		}
	})


</script>
@endsection