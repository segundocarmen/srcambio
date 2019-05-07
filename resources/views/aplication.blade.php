@extends('layouts.cambilo.index')

@section('content')
<div class="jumbotron">
	<router-view :key="$route.fullPath"></router-view>
</div>
@endsection