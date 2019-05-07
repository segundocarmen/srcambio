<template>
	<div id="homepage" class="page">
		<section class="banner">
			<MenuGuest></MenuGuest>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-xs-12">
						<h1>LA MEJOR PLATAFORMA PARA DE CAMBIAR DÓLARES EN EL PERÚ Y EN UN SOLO LUGAR. PRUÉBALO</h1>
					</div>
					<div class="col-lg-6 col-xs-12">
						<form class="form">
							<InputChangeCurrency :colorLabel="color" :paso="pasonumber"></InputChangeCurrency>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>
<style lang="stylus" scoped>
	#homepage
		.banner
			padding-bottom 50px
			h1
				color #fff
				letter-spacing 3px
				font-weight 800
				font-size 2.4rem
</style>
<script>
	export default {
		data(){
			return {
				color : 'white',
				pasonumber: 1
			}
		},
	}
</script>