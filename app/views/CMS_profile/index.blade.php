@extends('layouts.base')

@section('main')

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
			</ul>
		 </li>
	</ul>
</div>

<ol class="breadcrumb">
  <li><a href="{{ URL::to('users') }}">Home</a></li>
  <li class="active">Profiel</li>
</ol>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Profiel pagina</div>
		<div class="row">
			<div class="col-md-4">
				<div class="panel-body">
					<a class="example-image-link" href="images/DSC_0208.jpg" data-lightbox="example-1">
						<img class="img-thumbnail" src="images/DSC_0208.jpg" alt="image-1" width="250"/>
						<span class="glyphicon glyphicon-fullscreen" style="color:white;position:absolute;margin-top:25px;margin-left:-25px;"></span>
					</a>
					
					<p class="bg-primary text-center" style="max-width: 250px;">{{ $user->first_name . " " . $user->last_name }}</p>
					<button type="button" class="btn btn-block btn-info" style="max-width: 250px;" id="changeImg" data-toggle="modal" data-target="#myModal">Wijzig afbeelding</button>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<td><b>Voornaam</b></td><td>{{ $user->first_name }}</td>
						</tr>
						<tr>
							<td><b>Achternaam</b></td><td>{{ $user->last_name }}</td>
						</tr>
						<tr>
							<td><b>E-mail</b></td><td>{{ $user->email }}</td>
						</tr>
						<tr>
							<td><b>Voor het laatst ingelogd</b></td><td>{{ $user->last_login }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Wijzig uw profielafbeelding</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<input type="file"> 
					</div>
					<div class="col-md-4">
						<img class="img-thumbnail" src="images/DSC_0208.jpg" alt="image-1" width="250"/>
						</br></br>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Save change</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#changeImg').modal{
	});
</script>

@stop