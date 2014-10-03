<?php

/**
*	@author: Sven Janssen(Intern Wiwi)
*	@version: 1.0
*	Description: PagesController, 
*
*	This controller show the following pages with there logic:
*		-	pageManagement
*		-	addPage
*		-	updatePage(Not in internship)
*		-	deletePage(Not in internship)
*/

class CMS_PagesController extends \BaseController
{
	public function index(){

		if(Session::get('database') == null || Session::get('database') == ""){
			
			Notification::error('Er is geen website geselecteerd om te bewerken');
			return Redirect::back();
		}else{
			$pages = DB::table('person')->get();

			Notification::success('De gewenste website is geselecteerd');
			return View::make('CMS_pages.index')->with(['user'=> $this->user, 'pages' => $pages]);
		}

		
	}

	public function create(){
		return View::make('CMS_pages.create')->with(['user'=> $this->user]);
	}

	public function show(){
		$websiteRoutes = DB::table('person')->get();

		return View::make('CMS_pages.destroy')->with(['user' => $this->user, 'websiteRoutes' => $websiteRoutes]);
	}

	public function store(){
		$slug = Str::slug(Input::get('title'));
		$summernote = Input::get('summernote');

		try{
			if($slug != "" || $slug != null){
				// Insert slug into database
				DB::table('person')->insert(
				    array('firstname' => $slug, 'lastname' => $summernote)
				);

				// Send Success notification back
				Notification::success('De slug is succesvol toegevoegd.');
				return Redirect::back()->withInput();
			}else{
				// Send Error notification back
				Notification::error('U heeft geen route ingevoerd.');
				return Redirect::back();
			}
		}catch(Exceptoin $e){
			// Send Error notification back
			Notification::error('De ingevoerde route is niet correct.');
			return Redirect::back()->withInput();
		}
	}

	public function edit(){
		$websiteRoutes = DB::table('person')->get();

		return View::make('CMS_pages.edit')->with(['user' => $this->user, 'websiteRoutes' => $websiteRoutes]);
	}

	public function postEditRoute(){
		$websiteRouteId = Input::get('websiteRouteId');
		$selectedRoute = Input::get('route');

		$websiteRoutes = DB::table('person')->where('id', $websiteRouteId)->update(array('firstname' => $selectedRoute, 'lastname' => 'Lol'));

		Notification::success('Route is succesvol gewijzigd!');
		return Redirect::back();
	}

	public function postDeleteRoute(){
		$websiteRouteId = Input::get('websiteRouteId');

		DB::table('person')->where('id', $websiteRouteId)->delete();

		Notification::success('Route is succesvol verwijderd!');
		return Redirect::back();
	}
}
//$slug = Str::slug($pageTitle);