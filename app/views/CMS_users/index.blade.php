@extends('layouts.base')

@section('main')
<div class="container">

	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		Welkom op de dashboard.
	</div>


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
								{{ Form::open(array('route' => 'select.db.post', 'role' => 'form')) }}
									{{ Form::hidden('dbname', $website->name) }}
									{{ Form::submit($website->name, array('class' => 'btn btn-success btn-block')) }}
								{{ Form::close() }}
								
								</br>
							@endforeach
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<?php			
			}else{
				return;
			}
		?>
		<?php
			$person = Session::get('persons');
			if($person == null){
				echo "";
			}else{
		?>
		<table class="table table-striped">
			<tr>
				<td>
					<?php
							foreach($person as $per){
								echo $per->firstname;
							}
						}	
					?>
				</td>
			</tr>
		</table>
	</div>
</div>
@stop

@section('js')
	<script type="text/javascript">
		// Make dashboard button active
		$("#dashboardId").addClass("active");

		$(document).ready(function(){
			//$("#myModal").modal('show');
		});
	</script>
@stop