let mix = require('laravel-mix');

mix.scripts([
		'public/bower_components/jquery/dist/jquery.min.js',
		'public/bower_components/bootstrap/dist/js/bootstrap.min.js',
		'public/bower_components/toastr/toastr.min.js',
		'resources/assets/js/vue.js',
		'resources/assets/js/vue-router.js',
		'resources/assets/js/axios.js'
	], 'public/js/app.js')
	.js('resources/assets/js/App.js','public/js/Aplication.js')
	.stylus('resources/assets/css/cambilo.styl', 'public/css', {
	use: [
		require('rupture')()
	]})
	.styles([
		'public/bower_components/bootstrap/dist/css/bootstrap.min.css',
		'public/bower_components/toastr/toastr.min.css',
		'public/bower_components/components-font-awesome/css/font-awesome_4.css',
		'public/css/animate.css',
		'public/css/app.css',
		'public/css/cambilo.css',
		'public/css/fondos.css',
	], 'public/css/bundle/Cambilo.css',);

mix.browserSync({
	proxy: 'http://cambilo.test'
})

mix.disableNotifications();