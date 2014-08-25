<?php 

// if (Input::hasFile('image')) {
        // $file            = Input::file('image');
        // $destinationPath = public_path().'uploads/';
        // $filename        = str_random(6) . '_' . $file->getClientOriginalName();
        // $uploadSuccess   = $file->move($destinationPath, $filename);
    // }

//{{ "Upload: " . $_FILES["file"]["name"] }}
	
//{{ Redirect::action('CMS_ProfileController@showIndex') }}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

$name = $_FILES["file"]["name"];
$first = current(explode(".", $name));
$shuffled = str_shuffle($first);
// echo $shuffled . "." . $_FILES["file"]["type"];

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "public/uploads/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}


?>

{{ $user->id }}
{{ DB::table('users')
	->where('id', $user->id)
	->update(array('profile_image' => $name)); 
}}

{{ Redirect::action('CMS_ProfileController@showIndex') }}