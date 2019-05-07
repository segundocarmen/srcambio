<template>
	<div class="col-lg-3 col-md-4 col-xs-12" id="adds">
		<p class="title text-center bold">Horario de atención</p>
		<p class="pmin text-center">Lunes a Viernes de 9:00 am a 7:00 pm</span>
		<p class="pmin text-center">Sábados de 11:00 am a 2:00 pm</span>
		<p class="text-info bold">Detalles de tu operación</p>
		<div class="details">
			<p><font-awesome-icon icon="university"/><strong>Banco:</strong></p>
			<p><strong>Origen:</strong>  <span v-text="bancoorigen"></span></p>
			<p><strong>Destino:</strong>  <span v-text="bancodestino"></span></p>
		</div>
		<div class="details">
			<p><font-awesome-icon icon="money-bill"/><strong>Monto:</strong></p>
			<p><strong>Enviado:</strong>  <span v-text="montoenviado"></span></p>
			<p><strong>Recibido:</strong>  <span v-text="montorecibido"></span></p>
		</div>
		<div class="details">
			<p><font-awesome-icon icon="coins"/><strong>Tipo de cambio:</strong></p>
			<p><strong>Cambio:</strong>  <span v-text="tipocambio"></span></p>
		</div>
	</div>
</template>
<style lang="stylus" scoped>
	#adds
		p.pmin
			font-size 0.6rem
			font-weight normal
			margin-bottom 0
		p
			font-weight 600
			margin-bottom 0.5rem
		div.details
			margin-bottom 30px
			p:nth-child(1)
				text-decoration underline
			p
				margin-bottom 0
				padding-left 35px
				position relative
				svg
					position absolute
					margin-top 5px
					left 10px
				span
					font-weight normal
					font-size 0.7rem
</style>
<script>
	export default {
		props: ['bancoorigen','bancodestino','montoenviado','montorecibido','tipocambio']
	}
</script>