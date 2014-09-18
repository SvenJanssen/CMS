<html>
	{{ stylesheet_link_tag() }}

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
    <body>
        @section('header')
			<nav class="navbar navbar-default" role="navigation">
	  			<div class="container-fluid">
			   		<!-- Brand and toggle get grouped for better mobile display -->
		    		<div class="navbar-header">
			      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        		<span class="sr-only">Toggle navigation</span>
			       			<span class="icon-bar"></span>
			        		<span class="icon-bar"></span>
			        		<span class="icon-bar"></span>
			      		</button>
			    	</div>

			    	<!-- Collect the nav links, forms, and other content for toggling -->
			    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      			<ul class="nav navbar-nav tooltip-examples list-inline">
			       	 		<li id="dashboardId"><a href="{{ URL::route('users.index') }}" data-toggle="tooltip" title="Dashboard"><span class="glyphicon glyphicon-dashboard" style="font-size: 1.5em"></span></a></li>
			        		<li id="pageManagementId"><a href="{{ URL::route('pageManagement.select') }}" data-toggle="tooltip" title="Paginabeheer"><span class="glyphicon glyphicon-file" style="font-size: 1.5em"></span></a></li>
			        		<li><a href="#" data-toggle="tooltip" title="Agenda"><span class="glyphicon glyphicon-calendar" style="font-size: 1.5em"></span></a></li>
			        		<li><a href="#" data-toggle="tooltip" title="E-mail inbox"><span class="glyphicon glyphicon-inbox" style="font-size: 1.5em"></span><span class="badge pull-right" style="background: #30a0ff">42</span></a></li>
			        		<li><a href="#" data-toggle="tooltip" title="Notificaties"><span class="glyphicon glyphicon-bell" style="font-size: 1.5em"></span><span class="badge pull-right" style="background: #30a0ff">19</span></a></li>
    					</ul>
			      		<ul class="nav navbar-nav navbar-right">
				       		<div id="welcomeText">
								<ul class="nav nav-pills" id="profielDropdown">
									<li class="dropdown">
									<button type="button" class="btn btn-primary dropdown-toggle btn-block" data-toggle="dropdown" style="height: 45px;">
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
									<button type="button" class="btn btn-default dropdown-toggle btn-lg btn-block" data-toggle="dropdown" style="height: 45px;">
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
	            		</ul>
	   				</div><!-- /.navbar-collapse -->
  				</div><!-- /.container-fluid -->
			</nav>
        @show

        @section('breadcrumb')
			
        @show

        <div class="container">
            @yield('main')
        </div>

        <script type="text/javascript">
			$(document).ready(function(){
			    $(".tooltip-examples a").tooltip({
			        placement : 'bottom'
			    });
			});
		</script>

		{{ javascript_include_tag() }}
		@yield('js')
    </body>
</html>