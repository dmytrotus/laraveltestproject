import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from '.components/main'

Vue.use(Vuerouter)

const router = new VueRouter({
	routes: [
	{
		path: "/main",
		component: Main
	}
	]
})

export default