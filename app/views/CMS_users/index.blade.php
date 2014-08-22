@extends('layouts.base')

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}

@section('main')
<!-- -->
<div class="container">
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
								<a href="http://www.nu.nl">{{ $website->name }}</a>
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
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
@stop