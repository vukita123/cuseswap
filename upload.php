<?php
        session_start();
?>

<?php
$db = mysqli_connect('localhost','root','','oes')
or die('Error connecting to MySQL server.');
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    // adding to items
    $user_id = $_SESSION["user_id"];
    $name = $_SESSION["name"];
    $user_number = $_SESSION["user_number"];
    $itemname = $_POST["itemname"];
    $itemcategory = $_POST["itemcategory"];
    $itemcondition = $_POST["itemcondition"];
    $itemworth = $_POST["itemvalue"];
    print_r($_SESSION);
    echo $itemname;
    echo $itemcategory;
    echo $itemworth;
    echo $itemcondition;
    echo $target_file;
    $query = "INSERT INTO items (item_name,item_category,item_worth,item_condition,item_user_id, item_url, item_user_name, item_user_number) values
    ('$itemname', '$itemcategory', '$itemworth', '$itemcondition', '$user_id', '$target_file', '$name', '$user_number' )";
    if ($db->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
    header("Location: bicycles.php");

    //header("Location: bicycles.php"); 
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>