<html>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}

    <body>
        @section('header')
            <div id="header">
				<div id="welcomeText">
					<ul class="nav nav-pills" id="profielDropdown">
						<li class="dropdown">
							<button type="button" class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown" style="height: 45px;">
								<img src="uploads/{{ $user->profile_image}}" alt="..." class="img-circle" width="35" height="35"/>
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
        @show
		
		@section('sidebar')
		<div id="sidebar">
			<div class="btn-group-vertical" style="width: 100%;">
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
				<a href="{{ URL::to('page_management') }}" type="button" class="btn btn-default active" style="text-align: left;"><span class="glyphicon glyphicon-file"></span> Paginabeheer</a>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-calendar"></span> Calendar</button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-inbox"></span> E-mails <span class="badge pull-right" style="background: #30a0ff">42</span></button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="badge pull-right" style="background: #30a0ff">19</span></button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-log-out"></span> Apps</button>
			</div>
			
			<hr/>
			
			<div class="btn-group-vertical" style="width: 100%;">
				<button type="button" class="btn btn-primary" style="text-align: left;" onclick="makeBtnActive();" id="addPageButton"><span class="glyphicon glyphicon-plus"></span> pagina toevoegen</button>
			</div>
		</div>
		@show
		
		@section('breadcrumb')
		<ol class="breadcrumb">
			<li style="margin-left: 200px;"><span class="glyphicon glyphicon-home"></span><a href="{{ URL::to('users') }}"> Home</a></li>
			<li class="active">{{ Request::url() }}</li>
		</ol>
		@show
		
		<!-- <div id="sidepanel">
			<span class="glyphicon glyphicon-plus"></span>
		</div>
		-->
		
        @yield('main')
		
    </body>
	
	<script type="text/javascript">
		
	</script>
	
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::script('js/pageManagement.js') }}
</html>