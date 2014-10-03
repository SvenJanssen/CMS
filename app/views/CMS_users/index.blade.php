@extends('layouts.base')

@section('main')
<div class="container">

	@include('partials.notification')

	<div class="row">
		<?php 
			$index = 0; 
			foreach($user->customer->websites as $website){
				$index++;
			}
			if($index > 1){
		?>
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Selecteer een website dat u wil bewerken</h4>
						</div>
						<div class="modal-body">
							@foreach($user->customer->websites as $website)
								<?php 
									// Get database name without top domain('.nl/.com')
									list($database, $notneeded) = explode(".", $website->name);
								?>
								<li class="btn btn-block"><a class="btn btn-warning btn-block" href='{{ URL::route('website.select', $database) }}'>{{ $website->name }}</a></li>
							@endforeach
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<?php			
			}else{
				return;
			}
		?>

		<div class="page-header">
			<h1 style="color: white;">Welkom op het Wiwi CMS <small>Subtext for header</small></h1>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-4">
		    	<div class="thumbnail">
		      		<img src="/assets/{{ $user->profile_image}}" alt="...">
		      			<div class="caption">
		        			<h3>Thumbnail label</h3>
		        				<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      			</div>
	    		</div>
	  		</div>
		</div>

		<ul class="list-group">
			<li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
			<li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
			<li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
			<li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
		</ul>
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
			<a href="#" class="list-group-item list-group-item-info">Cras sit amet nibh libero</a>
			<a href="#" class="list-group-item list-group-item-warning">Porta ac consectetur ac</a>
			<a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
		</div>

	</div>
</div>
@stop

@section('js')
	<script type="text/javascript">
	 	$("#dashboardId").addClass("active");
		
		$(document).ready(function(){
			var selectedWebsite = $.cookie('database') || '';
			console.log(selectedWebsite);

			if(selectedWebsite == ""){
				$("#myModal").modal('show');
			}
		});
	</script>
@stop 