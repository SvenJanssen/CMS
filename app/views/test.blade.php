@extends('layouts.pagemanagement')

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}

@section('breadcrumb')
	<span style="margin-left:200px;display:block;">{{ Breadcrumbs::render('paginabeheer') }}</span>
@stop

@section('main')
	<div class="container">
		voeg page toe
	</div>
@stop

<script>	
	alert('blaat');
</script>