<template>
	<div id="login">
		<div class="container">
			<div class="col-lg-4 col-md-8 col-xs-12 offset-lg-4 offset-md-2" id="wrapper">
				<figure>
					<img src="images/logo.png" width="100" alt="Logo">
				</figure>
				<div class="form">
					<form id="formLogin" method="post" v-on:submit="login" action="Logearse">
						<div class="form-group">
							<label for="correo">Ingrese su correo</label>
							<input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su correo" v-model="email">
						</div>
						<div class="form-group">
							<label for="password">Clave</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Ingrese su clave" v-model="password">
						</div>
						<div class="justify-content-center">
							<button class="btn btn-info btn-block" type="submit" >Ingresar</button>
						</div>
						<input type="hidden" name="_token" v-model="csrf" />
					</form>
				</div>
			</div>
		</div>
	</div>
</template>
<style lang="stylus" scoped>
	#wrapper
		margin-top 100px
		background #fff
		border-radius 9px
		padding 15px
		label
			color #283750
		button
			border-radius 25px
</style>
<script>
	import { VALIDATE,SERIALIZE } from '../help/validate';
	import { ServicePost,LOGUEARSE } from '../help/service';
	const formElements = ['correo','password'];
	const token = document.head.querySelector('meta[name="csrf-token"]');
	export default {
		data(){
			return {
				email: '',
				password: '',
				csrf: token.content
			}
		},
		created(){
			
		},
		methods: {
			login: (event) =>
			{
				event.preventDefault();
				var validar = VALIDATE(formElements);
				if(validar){
					document.getElementById("formLogin").submit();
				}
			}
		}
	}
</script>