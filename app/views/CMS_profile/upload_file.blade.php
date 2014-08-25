<?php 

$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "GIF", "PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

$name = $_FILES["file"]["name"];
$first = current(explode(".", $name));
$shuffled = str_shuffle($first);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    if (file_exists("uploads/" . $_FILES["file"]["name"])) {
      //echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"], "public/uploads/" . $_FILES["file"]["name"]);
    }
  }
} else {
  echo "Invalid file";
}
?>

{{ DB::table('users')
	->where('id', $user->id)
	->update(array('profile_image' => $name)); 
}}

{{ Redirect::action('CMS_ProfileController@showIndex') }}