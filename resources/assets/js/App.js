require('./Adds');

import router from './routes/Routes';
Vue.component('MenuGuest', require('./components/MenuGuest.vue'));
Vue.component('MenuLoged', require('./components/MenuLoged.vue'));
Vue.component('InputChangeCurrency', require('./components/InputChangeCurrency.vue'));
Vue.component('SidebarResume', require('./components/SidebarResume.vue'));

export const bus = new Vue();

const app = new Vue({
	el: '#app',
	router,
	created: function(){
		//this.getCambio();
	},
	data: {
		isLoged: 0,
		email: '',
		password: ''
	},
	methods:{
		getCambio: function()
		{
			//ServiceGet(GET_CAMBIO,'',this.putCambio);
		},
		putCambio:function(data)
		{
			//localStorage.setItem('cambioCompra',data.compra);
			//localStorage.setItem('cambioVenta',data.venta);
		}
	}
});
