<template>
	<nav class="navbar navbar-expand-lg" id="menu">
		<div class="container">
			<router-link :to="{ name: 'home'}" class="navbar-brand">Cambilo</router-link>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<router-link :to="{ name: 'home'}" class="nav-link">Home</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{ name: 'ayuda'}" class="nav-link">Ayuda</router-link>
					</li>
					<li class="nav-item">
						<router-link :to="{ name: 'contacto'}" class="nav-link">Contacto</router-link>
					</li>
					<li>
						<router-link :to="{ name: 'login'}" class="btn btn-info">Iniciar sesión</router-link>
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
		margin-bottom 30px
		.container
			a
				color #fff
				&:hover
					color #fff
			.navbar-collapse ul
				li a.active
					text-decoration underline
</style>