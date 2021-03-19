<?php
        session_start();
?>

<?php
$db = mysqli_connect('localhost','root','','oes')
or die('Error connecting to MySQL server.');

$item = $_GET['itemid'];

$dropquery = "DELETE FROM items WHERE item_id = '$item'";

header("posts.php");

if ($db->query($dropquery) === TRUE) {
    echo "New record created successfully";
    //header("posts.php");
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}
header("Location: posts.php");
$db -> close();
?>