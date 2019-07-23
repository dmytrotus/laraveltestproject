const Main = {template: '<h1>Головна сторінка </h1>'}
const Contact = {template: '<h1>Контакт </h1>' }
const AboutUs = {template: '<h1>Про нас </h1>' }
const Blog = {template: '<h1>Блог </h1>' }

const routes = [

	{ path: '/main', component: Main },
	{ path: '/contact', component: Contact },
	{ path: '/about-us', component: AboutUs },
	{ path: '/blog', component: Blog }

]

const router = new VueRouter({
	routes
})

const routeapp = new Vue({
	router
}).$mount('#routeapp')