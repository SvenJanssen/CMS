<?php

	Breadcrumbs::register('home', function($breadcrumbs) {
		$breadcrumbs->push('Home', route('users.index'));
	});
	
	Breadcrumbs::register('profiel', function($breadcrumbs) {
		$breadcrumbs->parent('home');
		$breadcrumbs->push('Profiel', route('users.index'));
	});
	
	Breadcrumbs::register('paginabeheer', function($breadcrumbs) {
		$breadcrumbs->parent('home');
		$breadcrumbs->push('Paginabeheer', route('pageManagement.select'));
	});

	Breadcrumbs::register('add_page', function($breadcrumbs) {
		$breadcrumbs->parent('paginabeheer');
		$breadcrumbs->push('Pagina toevoegen', route('users.index'));
	});