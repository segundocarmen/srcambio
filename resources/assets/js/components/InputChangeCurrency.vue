<template>
	<div class="inputChangeCurency">
		<label :class="colorLabel">Tipo de cambio del dólar hoy en Perú
			<span><font-awesome-icon icon="info"/></span>
			<span>Compra: <strong v-text="compra"></strong></span>
			<span>Venta: <strong v-text="venta"></strong></span>
		</label>
		<div class="input-row">
			<div class="container_input firsth">
				<label for="txtEnvia">Envías</label>
				<input type="number" class="form-control txtHome" id="txtEnvia" v-model="envia" v-on:keyup="changeInputEnvia">
			</div>
			<div class="text-curency firsth">
				<p v-text="textoEnvia"></p>
			</div>
		</div>
		<button type="button" id="btnChange" v-on:click="cambiarMonedas"><font-awesome-icon icon="sync" :rotation="90"/></button>
		<div class="input-row">
			<div class="container_input">
				<label for="txtRecibe">Recibes</label>
				<input type="number" class="form-control txtHome" id="txtRecibe" v-model="recibe">
			</div>
			<div class="text-curency">
				<p v-text="textoRecibe"></p>
			</div>
		</div>
		<p class="tipo_cambio">Tipo de cambio del dólar usado: <span v-text="cambio"></span></p>
		<div v-if="paso == 2">
			<button class="btn btn-info btn-block" type="button" v-on:click="empezarOperacion">Empieza tu operación</button>
		</div>
		<div v-else>
			<router-link :to="{ name: 'inicioApp'}" class="btn btn-info btn-block" v-if="logueado">Empieza tu operación</router-link>
			<router-link :to="{ name: 'login'}" class="btn btn-info btn-block" v-else>Empieza tu operación</router-link>
		</div>
	</div>
</template>
<style lang="stylus" scoped>
	form
		#btnChange
			position absolute
			width 40px
			height 40px
			right 20px
			margin-top -20px
			border none
			background #fff
			border-radius 50%
			outline none
			cursor pointer
			svg
				width 20px
				height 40px
				color #283750
			&:hover
				background #ddd
		> div > label
			padding-right 30px
			color #fff
			font-weight 500
			text-align right
			width 100%
			font-size 0.8rem
			span
				margin-left 15px
		> div > label.black
			color #182233
		.tipo_cambio
			margin 25px 0
			padding 5px
			background rgba(0,0,0,0.4)
			color #fff
			text-align center
		.input-row
			display flex
			.container_input.firsth
				border-bottom 1px solid #ccc
				border-top-left-radius 5px
				border-bottom-left-radius 0
			.container_input
				background #fff
				padding 5px 20px
				border-left 5px solid #283750
				border-bottom-left-radius 5px
				width calc(100% - 120px)
				label
					color #283750
					margin-bottom 0
				.txtHome
					border none
					border-radius 0
					color #182233
					padding 0
					margin 0
					font-weight 800
					font-size 1.5rem
			.text-curency.firsth
				border-bottom 1px solid #ccc
				border-top-right-radius 5px
				border-bottom-right-radius 0
			.text-curency
				padding 5px 15px
				background #283750
				width 120px
				border-bottom-right-radius 5px
				p
					margin 0
					color #fff
					font-size 1.3rem
					line-height 60px
</style>
<script>
	import { ServiceGet,ServicePost,GET_CAMBIO,GET_ISLOGIN,SAVE_TRANSFERENCIA_STEP_1 } from '../help/service';
	import { library } from '@fortawesome/fontawesome-svg-core';
	import { faSync } from '@fortawesome/free-solid-svg-icons';
	import { faInfo } from '@fortawesome/free-solid-svg-icons';
	import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
	library.add(faSync,faInfo);
	Vue.component('font-awesome-icon', FontAwesomeIcon);
	const monedas=['Soles','Dólares'];
	const acciones=['venta','compra'];
	const cambios =[];

	if(localStorage.getItem('montoEnvia')){
		var montoenvia=parseFloat(localStorage.getItem('montoEnvia'));
		var montorecibe=parseFloat(localStorage.getItem('montoRecibe'));
	}else{
		var montoenvia=1500;
		var montorecibe=0;
	}
	console.log(montoenvia)
	export default {
		props: ['colorLabel','paso'],
		data(){
			return {
				textoEnvia: monedas[0],
				textoRecibe: monedas[1],
				accion: acciones[0],
				cambio: '',
				idcambio: 0,
				compra : '',
				venta: '',
				envia: montoenvia,
				recibe: montorecibe,
				logueado: 0,
				firsthSteep: 1
			}
		},
		created(){
			this.getCambio();
			this.getIsLogin();
		},
		mounted: function () {
			
		},
		methods:{
			getCambio:function()
			{
				ServiceGet(GET_CAMBIO,'',this.putCambio);
			},
			putCambio:function(data)
			{
				this.compra=data.compra;
				this.venta=data.venta;
				this.idcambio=data.id;
				cambios.push(data.venta);
				cambios.push(data.compra);
				this.cambio=cambios[0];
				this.calcula(this.accion,this.envia,this.cambio);
			},
			calcula: function(tipo,monto1,divisor)
			{
				if(tipo=='venta'){
					var monto = monto1/parseFloat(divisor)
				}else{
					var monto = monto1*parseFloat(divisor)
				}
				this.recibe = monto.toFixed(2);
				localStorage.setItem('montoEnvia',monto1);
				localStorage.setItem('montoRecibe',this.recibe);
				localStorage.setItem('cambio',this.cambio);
				localStorage.setItem('idcambio',this.idcambio);
			},
			changeInputEnvia: function()
			{
				this.calcula(this.accion,this.envia,this.cambio);
			},
			cambiarMonedas: function()
			{
				monedas.reverse();
				this.textoEnvia=monedas[0];
				this.textoRecibe=monedas[1];
				acciones.reverse();
				this.accion=acciones[0];
				cambios.reverse();
				this.cambio=cambios[0];
				this.calcula(this.accion,this.envia,this.cambio);
			},
			getIsLogin:function()
			{
				ServiceGet(GET_ISLOGIN,'',this.validaLogin);
			},
			validaLogin:function(data)
			{
				this.logueado=parseInt(data);
			},
			empezarOperacion:function()
			{
				var objEmpezar = new Object();
				objEmpezar.montoEnvia=this.envia;
				objEmpezar.montoRecibe=this.recibe;
				objEmpezar.idcambio=this.idcambio;
				objEmpezar.lstBankOrigen=localStorage.getItem('lstBankOrigen');
				objEmpezar.lstCuentaDestino=localStorage.getItem('lstCuentaDestino');
				ServicePost(SAVE_TRANSFERENCIA_STEP_1,objEmpezar,this.returnEmpezar);
			},
			returnEmpezar:function(data)
			{
				if(data.status=='ok'){
					localStorage.setItem('idTransaccion',data.id);
					this.$router.push('/transferencia')
				}
			}
		}
	}
</script>