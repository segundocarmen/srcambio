<template>
	<nav class="navbar navbar-expand-lg" id="menu">
		<div class="container">
			<router-link :to="{ name: 'home'}" class="navbar-brand">Cambilo</router-link>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<router-link :to="{ name: 'inicioApp'}" class="nav-link">Inicio</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{ name: 'datosCuenta'}" class="nav-link">Datos de cuenta</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{ name: 'cuentas'}" class="nav-link">Cuentas Bancarias</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{ name: 'historial'}" class="nav-link">Historial</router-link>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a href="./logout" class="nav-link dropdown-item">Cerrar sesión</a>
						</div>
					</li>					
				</ul>
			</div>
		</div>
	</nav>
</template>

<style lang="stylus" scoped>
	nav#menu
		padding-top 20px
		background transparent
		.container
			a
				color #fff
				&:hover
					color #fff
			.navbar-collapse ul
				li a.active
					text-decoration underline
			.dropdown-menu a
				color #283750
	.dropdown-item.active, .dropdown-item:active
		background #283750
		color #fff !important
</style>