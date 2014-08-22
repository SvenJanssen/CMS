{{ "Upload: " . $_FILES["file"]["name"] }}
	
{{ Redirect::action('CMS_ProfileController@showIndex') }}