
export default new VueRouter({
	routes: [
		{
			name: 'home',
			path: '/',
			component: require('./../views/Home')
		},
		{
			name: 'ayuda',
			path: '/ayuda',
			component: require('./../views/Help')
		},
		{
			name: 'contacto',
			path: '/contacto',
			component: require('./../views/Contact')
		},
		{
			name: 'login',
			path: '/login',
			component: require('./../views/Login')
		},
		{
			name: 'inicioApp',
			path: '/cambiar',
			component: require('./../views/ChangeMoney')
		},
		{
			name: 'transferir',
			path: '/transferencia',
			component: require('./../views/Transferencia')
		},
		{
			name: 'verificar',
			path: '/verificando',
			component: require('./../views/Verificando')
		},
		{
			name: 'verificado',
			path: '/verificacion-enviada',
			component: require('./../views/Confirmado')
		},
		{
			name: 'datosCuenta',
			path: '/datos-de-cuenta',
			component: require('./../views/DatosCuenta')
		},
		{
			name: 'cuentas',
			path: '/cuentas-bancarias',
			component: require('./../views/CuentasBancarias')
		},
		{
			name: 'historial',
			path: '/historial',
			component: require('./../views/Historial')
		},
		{
			path: '*',
			component: require('./../views/404')
		}
	],
	linkExactActiveClass: 'active',
	mode: 'history'
});