<?php
        session_start();
?>


<?php
          
$db = mysqli_connect('localhost','root','','oes')
or die('Error connecting to MySQL server.');

if (checkLogin() == 'non-existing'){
            die('WRONG USERNAME OR PASSWORD');
}else{
    
    header("Location: bicycles.php"); 
}

?>


<?php echo date('l, F jS, Y'); 
function checkLogin(){
    global $db;
    $name = $_POST["login"];
    $password = $_POST["password"];
    $userdata = checkUserData("SELECT * FROM users WHERE (user_first_name = '$name') AND (user_password = '$password')");
    if(!$userdata){
        return 'non-existing';
    }
    else return 'all good';
}
function checkUserData($query){
    global $db;
    $result = $db->query($query);
    $row = $result -> fetch_row();
    return $row[0];
}

$name = $_POST["login"];
$password = $_POST["password"];
$_SESSION["name"] = $name;
$_SESSION["password"] = $password;
//$_SESSION["current"] = 'bicycles';
?>
Welcome <?php echo " name: ".$name." password: ".$password." "; 
    
?>!


<?php 
$testing = "SELECT * FROM users WHERE user_first_name = '$name' and user_password = '$password' ";
$testresult = $db->query($testing);

echo checkLogin();
while($row = $testresult -> fetch_assoc()){
    $_SESSION["user_id"] = $row["user_id"];
}
?>