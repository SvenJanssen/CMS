<!DOCTYPE html>
<html>
	{{ stylesheet_link_tag() }}

    <body>
        @section('header')
            <div id="header">
				<div id="welcomeText">
					<ul class="nav nav-pills" id="profielDropdown">
						<li class="dropdown">
							<button type="button" class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown" style="height: 45px;">
								<img src="/assets/{{ $user->profile_image}}" alt="..." class="img-circle" width="35" height="35"/>
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
						<ul class="dropdown-menu" role="menu">
							@foreach($user->customer->websites as $website)
								<?php 
									// Get database name without top domain('.nl/.com')
									list($database, $notneeded) = explode(".", $website->name); 
								?>
								<li ><a href='{{ URL::route('website.select', $database) }}'>{{ $website->name }}</a></li>
								 
							@endforeach
							<?php
								$dbName = Session::get('database');
								if($dbName == null){
									echo "";	
								}else{
							?>
								<li class="divider"></li>
							<?php
									echo '<li class="active text-center"><a href="#">' . $dbName . '</a></li>';
								}
							?>
						</ul>
					 </li>
				</ul>
			</div>
        @show
		
		@section('sidebar')
		<div id="sidebar">
			<div class="btn-group-vertical" style="width: 100%;">
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
				<a href="{{ URL::route('pageManagement.select', $database) }}" type="button" class="btn btn-default active" style="text-align: left;"><span class="glyphicon glyphicon-file"></span> Paginabeheer</a>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-calendar"></span> Calendar</button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-inbox"></span> E-mails <span class="badge pull-right" style="background: #30a0ff">42</span></button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="badge pull-right" style="background: #30a0ff">19</span></button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-log-out"></span> Apps</button>
			</div>
			
			<hr/>
			
			<div class="btn-group-vertical" style="width: 100%;">
				<a href="{{ URL::route('add_page', $database) }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-plus"></span> pagina toevoegen</a>
			</div>
		</div>
		@show
		
		@section('breadcrumb')
		
		@show	
		
        @yield('main')

    </body>
    {{ javascript_include_tag() }}
	@yield('js')
</html>