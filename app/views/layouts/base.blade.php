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
        @show
		
		@section('sidebar')
		<div id="sidebar">
			<div class="btn-group-vertical" style="width: 100%;">
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-picture"></span> Gallery</button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-calendar"></span> Calendar</button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-inbox"></span> E-mails <span class="badge pull-right" style="background: #30a0ff">42</span></button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="badge pull-right" style="background: #30a0ff">19</span></button>
				<button type="button" class="btn btn-default" style="text-align: left;"><span class="glyphicon glyphicon-log-out"></span> Apps</button>
			</div>
		</div>
		@show
		
		@section('breadcrumb')
		<ol class="breadcrumb">
			<li style="margin-left: 200px;"><a href="{{ URL::to('users') }}">Home</a></li>
			<li class="active">{{ Request::url() }}</li>
		</ol>
		@show

        <div class="container">
            @yield('main')
        </div>
    </body>
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</html>