<template>
	<div class="page">
		<section class="banner">
			<MenuLoged></MenuLoged>
		</section>
		<section class="section container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-xs-12"></div>
				<div class="col-lg-6 col-md-12 col-xs-12">
					<h1>PASO 1/3: INICIAR UNA NUEVA TRANSACCIÓN</h1>
					<form id="formTransaccion">
						<div class="form-group">
							<label for="lstBankOrigen">¿Desde qué banco nos envías tu dinero?</label>
							<select name="lstBankOrigen" id="lstBankOrigen" class="form-control" v-on:change="cambiarOpcion" v-model="banco">
								<option 
									:value="banco.id" 
									v-for="banco in bancos" 
								>{{ banco.nombreCorto }} {{ banco.nombre }}</option>
							</select>
						</div>
						<div class="form-group">
							<label for="lstCuentaDestino">¿En que cuenta deseas recibir tu dinero?</label>
							<select name="lstCuentaDestino" id="lstCuentaDestino" class="form-control" v-on:change="cambiarOpcion" v-model="cuenta">
								<option 
									:value="cuenta.id" 
									v-for="cuenta in cuentas" 
								>{{ cuenta.nombre }} - {{ cuenta.nro_cuenta }}</option>
							</select>
						</div>
						<InputChangeCurrency :colorLabel="color" :paso="pasonumber"></InputChangeCurrency>
					</form>
				</div>
			</div>
		</section>
	</div>
</template>
<style lang="stylus" scoped>
	
</style>
<script>
	import { ServiceGet,GET_DATOS_CAMBIO } from '../help/service';
	export default {
		data(){
			return {
				color : 'black',
				pasonumber: 2,
				banco : 1,
				cuenta : 1,
				bancos: [],
				cuentas: []
			}
		},
		created(){
			this.getDatosCambio();
		},
		mounted: function () {
			
		},
		methods:{
			getDatosCambio:function()
			{
				ServiceGet(GET_DATOS_CAMBIO,'',this.mostrarDatos);
			},
			mostrarDatos: function(datos)
			{
				this.bancos=datos.bancos;
				this.cuentas=datos.cuentas;
				if(localStorage.getItem('lstBankOrigen')){
					var banco=parseInt(localStorage.getItem('lstBankOrigen'));
					var cuenta=parseInt(localStorage.getItem('lstCuentaDestino'));
				}else{
					var banco = this.bancos[0].id;
					var cuenta = this.cuentas[0].id;
				}
				this.banco=banco;
				this.cuenta=cuenta;
				localStorage.setItem('lstBankOrigen',banco);
				localStorage.setItem('lstCuentaDestino',cuenta);
			},
			cambiarOpcion:function(e){
				localStorage.setItem(e.target.id,e.target.value);
			}
		}
	}
</script>