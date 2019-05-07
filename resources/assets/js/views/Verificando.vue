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
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<h1>PASO 3/3: VERIFICAR TRANSFERENCIA</h1>
							<p>Luego de culminar la transferencia necesitamos <strong>comprobarla con el banco</strong>, para poder transferir <strong><span v-text="monto_recibido"></span></strong> a tu cuenta.</p>
							<div class="form">
								<div class="form-group">
									<label for="txtCodigoVerificacion">Escribe el código/número de operación de la transacción bancaria aqui</label>
									<input v-model="codigoverificacion" type="text" class="form-control" name="txtCodigoVerificacion" id="txtCodigoVerificacion">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-xs-12">
									<button class="btn btn-info btn-block" v-on:click="enviarVerificacion">Enviar verificación</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-xs-12">
									<button class="btn btn-info btn-block bg-white text-info" v-on:click="cancelarOperacion">Cancelar operación</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>
<style lang="stylus" scoped>
	button
		margin-bottom 10px
</style>
<script>
	import { ServiceGet,ServicePost,GET_DATOS_TRANSFERENCIA,CANCEL_OPERACION,SAVE_CODIGO_VERIFICACION } from '../help/service';
	export default {
		data(){
			return {
				banco_origen: '',
				banco_destino: '',
				monto_enviado: '',
				monto_recibido: '',
				tipo_cambio: '',
				codigoverificacion:'',
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
			},
			enviarVerificacion: function()
			{
				var objGuardarCodigo=new Object();
				objGuardarCodigo.idTransaccion=localStorage.getItem('idTransaccion');
				objGuardarCodigo.codigo=this.codigoverificacion;
				ServicePost(SAVE_CODIGO_VERIFICACION,objGuardarCodigo,this.returnVerificacion);
			},
			returnVerificacion: function(data)
			{
				if(data.status=='ok'){
					localStorage.clear();
					this.$router.push('/verificacion-enviada')
				}
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