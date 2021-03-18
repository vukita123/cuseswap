<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuse Swaps</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css" media="screen"/>
</head>

<body>
    <?php         
        $db = mysqli_connect('localhost','root','','oes')
        or die('Error connecting to MySQL server.');

        $email = $_POST["email"];
        $name = $_POST["login"];
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $number = $_POST["number"];

        $sql = "INSERT INTO Users (user_email_address,user_first_name,user_last_name,user_password,user_phone_number) values
        ('$email', '$name', '$lastname', '$password', '$number')";

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
        
        $db->close();
    ?>

    <div class="login">
        <h1>Welcome to Cuse Swaps!</h1>
        <a href="login.php">Log in</a>
    </div>
    
</body>
</html>