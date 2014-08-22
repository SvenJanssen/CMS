@extends('layouts.base')

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}

@section('main')
<!-- -->
<div id="header">
	<div id="welcomeText">
		<ul class="nav nav-pills" id="profielDropdown">
			<li class="dropdown">
				<button type="button" class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown" style="height: 45px;">
					<img src="images/DSC_0208.jpg" alt="..." class="img-circle" width="35" height="35"/>
					{{ "Welkom, " . "<b>" . $user->first_name . " " . $user->last_name . "</b>"}} 
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="{{ URL::to('profile') }}"><span class="glyphicon glyphicon-user"></span> Profiel</a></li>
					<li class="divider"></li>
					<li><a href="{{ URL::to('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Uitloggen</a></li>
				</ul>
			</li>
		</ul>
	</div>
		
	<ul class="nav nav-pills" id="websiteDropdown">
		 <li class="dropdown">
			<button type="button" class="btn btn-info dropdown-toggle btn-lg btn-block" data-toggle="dropdown" style="height: 45px;">
				Kies website <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				@foreach($user->customer->websites as $website)
					<li><a href="http://www.nu.nl">{{ $website->name }}</a></li>
				@endforeach
				</a></li>
			</ul>
		 </li>
	</ul>
</div>

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