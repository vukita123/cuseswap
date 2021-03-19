<?php
        session_start();
?>

<?php
$db = mysqli_connect('localhost','root','','oes')
or die('Error connecting to MySQL server.');

$cat = $_GET['category'];
$_SESSION["current"] = $cat;
header("Location: bicycles.php");
?>