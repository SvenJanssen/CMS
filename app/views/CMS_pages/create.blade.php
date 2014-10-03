@extends('layouts.base')

	<!-- include libries(jQuery, bootstrap, fontawesome) -->
	<script src="//code.jquery.com/jquery-1.9.1.min.js"></script> 
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css" />
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>

@section('breadcrumb')
	{{ Breadcrumbs::render('add_page') }}
@stop

@section('main')

<div id="menu-toggle">
	<img src="/assets/menu.png" width=20 height=20 alt="Menu"></img>
</div>

<nav id="menu">
	<a href="{{ URL::route('pages.create') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-plus pull-right"></span> pagina toevoegen</a>
	<!-- <a href="{{ URL::route('pages.index') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-edit pull-right"></span> Pagina wijzigen</a>
	<a href="{{ URL::route('pages.destroy') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-trash pull-right"></span> pagina verwijderen</a>-->
</nav>

	<div class="container">
		@include('partials.notification')
		{{ Form::open(array('route' => 'pages.store', 'role' => 'form', 'id' => 'pageForm')) }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<h1>Titel <small>/new_page/page_1</small></h1>

						<h4 class="pull-right" style="margin-top: -40px;">Geselecteerde website: <small><u><?php echo Session::get('database'); ?></u></small></h4>
					</h3>
				</div>
				<div class="panel-body">
					{{ Form::text('title', Input::old('title'), array('placeholder'=>'Vul hier je titel in','class' => 'form-control')) }}
					</br>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<h1>Pagina <small>maak uw pagina</small></h1>
					</h3>
				</div>
				<div class="panel-body">
					{{ Form::textarea('summernote', null, array('id' => 'summernote', 'class' => 'form-control')); }}
					</br>
				</div>
			</div>

			<div class="well">
					{{ Form::submit('Submit', array('class' => 'btn btn-primary btn-block')) }}
				{{ Form::close() }}
				<p class="btn btn-warning btn-block" id="openModal">Preview de pagina!</p>
			</div>
			
			<div id="myModal" class="modal fade large">
				<div class="modal-dialog" id="examplePageModal">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Voorbeeld</h4>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
	</div>
@stop

<script>
	function openPreview(){
		var modal = $("#myModal");
		var page = $('#pageForm').serializeObject();

		modal.find('.modal-body').html($('[name="summernote"]').code());
		modal.modal('show');	
	}

	

	$(document).ready(function() {
		// Make pageManagement button active
		$("#pageManagementId").addClass("active");

		// Make addPage Button active
		$("#addPageButton").addClass("active");

		// Show mini text editor (Summernote)
		$('#summernote').summernote({
			height: 350,
			minHeight: null,
  			maxHeight: null,
  			focus: true,
  			codemirror: {
			    theme: 'monokai'
		  	}
		});

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

		$(document)
			.on('click', '#openModal', openPreview)
	});
</script>