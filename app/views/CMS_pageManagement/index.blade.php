@extends('layouts.base')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
@section('breadcrumb')
	{{ Breadcrumbs::render('paginabeheer') }}
@stop

@section('main')

<div id="menu-toggle">
	<img src="assets/menu.png" width=20 height=20 alt="Menu"></img>
</div>

<nav id="menu">
	<a href="{{ URL::route('add_page') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-plus pull-right"></span> pagina toevoegen</a>
	<a href="{{ URL::route('add_page') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-edit pull-right"></span> pagina weizigen</a>
	<a href="{{ URL::route('add_page') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-trash pull-right"></span> pagina verwijderen</a>
</nav>

@stop

@section('js')
	<script type="text/javascript">
		// Make pageManagement button active
		$("#pageManagementId").addClass("active");

		// Open/close side menu
		$('#menu-toggle').click(function(){
			if($('#menu').hasClass('open')){
				$('#menu').removeClass('open');
				$('#menu-toggle').removeClass('open');
			}else{
				$('#menu').addClass('open');
				$('#menu-toggle').addClass('open');
			}
		});
	</script>
@stop