<template>
	<div class="page">
		<section class="banner">
			<MenuLoged></MenuLoged>
		</section>
		<section class="section container">
			<div class="row">
				<SidebarResume 
					:bancoorigen="banco_origen" 
					:bancodestino="banco_destino" 
					:montoenviado="monto_enviado" 
					:montorecibido="monto_recibido" 
					:tipocambio="tipo_cambio" 
				></SidebarResume>
				<div class="col-lg-9 col-md-8 col-xs-12" id="transfer">
					<h1>PASO 2/3: REALIZAR UNA TRANSFERENCIA</h1>
					<p>Por favor, desde la <strong>plataforma de tu banco</strong>, debes realizar una transferencia de <strong><span v-text="monto_enviado"></span></strong> a la cuenta indicada líneas abajo.</p>
					<div class="row">
						<div class="col-lg-6 col-md-12 col-xs-12">
							
						</div>
						<div class="col-lg-6 col-md-12 col-xs-12">
							<div class="item">
								<p class="item-title text-info">Banco:</p>
								<p class="item-content" v-text="banco_srcambio"></p>
							</div>
							<div class="item">
								<p class="item-title text-info">Tipo de cuenta:</p>
								<p class="item-content" v-text="tipo_cuenta_srcambio"></p>
							</div>
							<div class="item">
								<p class="item-title text-info">Número de cuenta:</p>
								<p class="item-content" v-text="nro_cuenta_srcambio"></p>
							</div>
							<div class="item">
								<p class="item-title text-info">Titular de la cuenta:</p>
								<p class="item-content" v-text="titular_srcambio"></p>
							</div>
							<div class="item">
								<p class="item-title text-info">RUC:</p>
								<p class="item-content" v-text="ruc_srcambio"></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-xs-12">
							<button class="btn btn-info btn-block bg-white text-info" v-on:click="cancelarOperacion">Cancelar operación</button>
						</div>
						<div class="col-lg-6 col-md-6 col-xs-12">
							<router-link :to="{ name: 'verificar'}" class="btn btn-info btn-block">Ya transferí</router-link>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>
<style lang="stylus" scoped>
	#transfer
		padding 15px
		.item
			margin-bottom 10px
			border-top-left-radius 2px
			border-bottom-left-radius 2px
			padding-left 10px
			border-left 3px solid #17a2b8
			background #e3e3c4
			p
				margin-bottom 0
</style>
<script>
	import { ServiceGet,ServicePost,GET_DATOS_TRANSFERENCIA,CANCEL_OPERACION } from '../help/service';
	import { library } from '@fortawesome/fontawesome-svg-core';
	import { faUniversity } from '@fortawesome/free-solid-svg-icons';
	import { faCoins } from '@fortawesome/free-solid-svg-icons';
	import { faMoneyBill } from '@fortawesome/free-solid-svg-icons';
	import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
	library.add(faUniversity,faCoins,faMoneyBill);
	Vue.component('font-awesome-icon', FontAwesomeIcon);
	export default {
		data(){
			return {
				banco_origen: '',
				banco_destino: '',
				monto_enviado: '',
				monto_recibido: '',
				tipo_cambio: '',
				banco_srcambio: '',
				tipo_cuenta_srcambio: '',
				nro_cuenta_srcambio: '',
				titular_srcambio: '',
				ruc_srcambio: '',
			}
		},
		created(){
			this.getDatosTransferencia();
		},
		mounted: function () {
			
		},
		methods:{
			getDatosTransferencia:function()
			{
				var objTransferencia=new Object();
				objTransferencia.banco_id=localStorage.getItem('lstBankOrigen');
				objTransferencia.cuenta_id=localStorage.getItem('lstCuentaDestino');
				ServiceGet(GET_DATOS_TRANSFERENCIA,objTransferencia,this.mostrarDatos);
			},
			mostrarDatos: function(datos)
			{
				this.banco_origen=datos.banco.nombreCorto+" - "+datos.banco.nombre;
				this.banco_destino=datos.cuenta.nombre+" - "+datos.cuenta.nro_cuenta;
				this.monto_enviado=localStorage.getItem('montoEnvia');
				this.monto_recibido=localStorage.getItem('montoRecibe');
				this.tipo_cambio=localStorage.getItem('cambio');
				this.banco_srcambio=datos.datos[0].banco;
				this.tipo_cuenta_srcambio=datos.datos[0].tipo_cuenta;
				this.nro_cuenta_srcambio=datos.datos[0].nro_cuenta;
				this.titular_srcambio=datos.datos[0].nombre;
				this.ruc_srcambio=datos.datos[0].ruc;
			},
			cancelarOperacion: function()
			{
				var objCancelar=new Object();
				objCancelar.idTransaccion=localStorage.getItem('idTransaccion');
				ServicePost(CANCEL_OPERACION,objCancelar,this.returnCancelar);
			},
			returnCancelar:function(data)
			{
				if(data.status=='ok'){
					localStorage.clear();
					this.$router.push('/')
				}
			}
		}
	}
</script>