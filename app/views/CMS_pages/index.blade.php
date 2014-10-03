@extends('layouts.base')

@section('breadcrumb')
	{{ Breadcrumbs::render('paginabeheer') }}
@stop

@section('main')
	@include('partials.notification')
	<div id="menu-toggle">
		<img src="/assets/menu.png" width=20 height=20 alt="Menu"></img>
	</div>

	<nav id="menu">
		<a href="{{ URL::route('pages.create') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-plus pull-right"></span> Pagina toevoegen</a>
		<!-- <a href="{{ URL::route('pages.edit') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-edit pull-right"></span> Pagina wijzigen</a> -->
		<!-- <a href="{{ URL::route('pages.destroy') }}" type="button" class="btn btn-primary" onclick="makeActive();" style="text-align: left;" id="addPageButton"><span class="glyphicon glyphicon-trash pull-right"></span> pagina verwijderen</a> -->
	</nav>

	<div class="row">
			<div class="well">
				 <div class="checkbox">
				 	<a href="#" type="button" class="btn btn-primary" style="text-align: left;" id="th"><span class="glyphicon glyphicon-th"></span></a>
				 	<a href="#" type="button" class="btn btn-primary" style="text-align: left;" id="list"><span class="glyphicon glyphicon-list"></span></a>
				 	<hr/>
					<label>
						<input type="checkbox" id="checkbox" onclick="selectAll()"> Selecteer alles
					</label>
					{{ Form::open() }}
						<button class="btn btn-danger pull-right" id="delBtn" style="margin-top:-20px;">Verwijder geselecteerde</button>
					{{ Form::close() }}
				</div>
			</div>
			@foreach($pages as $page)
				<div class="thumbnail col-md-4">
			  		<div class="caption">
		   				<h3>{{ $page->firstname }}<span class="checked "></span></h3>
		   				<hr/>
		    			<div class="pageDiv">{{ $page->lastname }}</div>
			    		<p><a href="#" class="btn btn-warning" role="button">Bewerken</a> <a href="#" class="btn btn-danger" role="button">Verwijderen</a></p>
			  		</div>
				</div>
			@endforeach
		</div>
	</div>

@stop

@section('js')
	<script type="text/javascript">

		function showTh(){
			$('.thumbnail').addClass("col-md-4");
			$('#th').attr('class', 'btn btn-primary active');
			$('#list').attr('class', 'btn btn-primary');
			$('.pageDiv').show();
			$.cookie('showTh', 'grid');
		}

		function showList(){
			$('.thumbnail').removeClass("col-md-4");
			$("#list").attr('class', 'btn btn-primary active');
			$('#th').attr('class', 'btn btn-primary');
			$('.pageDiv').hide();
			$.cookie('showList', 'list');
		}

		function selectAll(){
			if($('#checkbox').prop('checked')){
				// active button
				$('#delBtn').prop('disabled', false);
				$('.caption').css('background', '#cecece');
				$('.checked').attr('class', 'checked glyphicon glyphicon-ok pull-right');
			}else{
				// disable button
				$('#delBtn').prop('disabled', true)
				$('.caption').css('background', '#ffffff');
				$('.checked').attr('class', 'checked ');
			}
		}

		// Standaard selected view
		$('#th').attr('class', 'btn btn-primary active');

		// Disable button
		$('#delBtn').prop('disabled', true);

		// Make pageManagement button active
		$("#pageManagementId").addClass("active");

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
			.on('click', '#th', showTh)
			.on('click', '#list', showList)
	</script>
@stop