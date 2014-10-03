<?php
	// Home
	Breadcrumbs::register('home', function($breadcrumbs) {
		$breadcrumbs->push('Home', route('users.index'));
	});
	
	// Profile
	Breadcrumbs::register('profiel', function($breadcrumbs) {
		$breadcrumbs->parent('home');
		$breadcrumbs->push('Profiel', route('users.index'));
	});
	
	// Home->Paginabeheer
	Breadcrumbs::register('paginabeheer', function($breadcrumbs) {
		$breadcrumbs->parent('home');
		$breadcrumbs->push('Paginabeheer', route('pages.index'));
	});

	// Home->Paginabeheer->add page
	Breadcrumbs::register('add_page', function($breadcrumbs) {
		$breadcrumbs->parent('paginabeheer');
		$breadcrumbs->push('Pagina toevoegen', route('pages.create'));
	});

	// Home->Paginabeheer->edit page
	Breadcrumbs::register('edit_page', function($breadcrumbs) {
		$breadcrumbs->parent('paginabeheer');
		$breadcrumbs->push('Pagina wijzigen', route('pages.edit'));
	});

	// Home->Paginabeheer->delete page
	Breadcrumbs::register('delete_page', function($breadcrumbs) {
		$breadcrumbs->parent('paginabeheer');
		$breadcrumbs->push('Pagina verwijderen', route('pages.destroy'));
	});