@extends('layouts.base')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
@section('breadcrumb')
	{{ Breadcrumbs::render('edit_page') }}
@stop

@section('main')

@include('partials.notification')
<div id="menu-toggle">
	<img src="/assets/menu.png" width=20 height=20 alt="Menu"></img>
</div>

<nav id="menu">
	<a href="{{ URL::route('pages.create') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-plus pull-right"></span> Pagina toevoegen</a>
	<!-- <a href="{{ URL::route('pages.edit') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="editPageButton"><span class="glyphicon glyphicon-edit pull-right"></span> Pagina wijzigen</a>
	<a href="{{ URL::route('pages.destroy') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="deletePageButton"><span class="glyphicon glyphicon-trash pull-right"></span> pagina verwijderen</a>-->
</nav>

<!-- Body content -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<h1>Wijzig Route <small>van selecteerde website: <b><u> <?php echo Session::get('database') ?> </u></b></small></h1>
		</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			@foreach($websiteRoutes as $websiteRoute)
				{{ Form::open(array('route' => 'editRoute.post', 'role' => 'form')) }}
			<tr>
				<td>
						{{ Form::text('route', $websiteRoute->firstname, array('class' => 'form-control')) }}
				</td>
				<td>
					
						{{ Form::hidden('websiteRouteId', $websiteRoute->id) }}
						{{ HTML::decode(Form::button('<span class="glyphicon glyphicon-edit pull-right"></span><strong>Wijzig </strong> ', array('type' => 'submit',  'class' => 'btn btn-warning pull-right'))) }}
					{{ Form::close() }}
					
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@stop

@section('js')
	<script type="text/javascript">
		// Make pageManagement button active
		$("#editPageButton").addClass("active");

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