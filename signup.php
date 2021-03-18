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
    ?>

    <div class="login">
        <h1>Welcome to Cuse Swaps!</h1>
        <form action="signupconf.php" method="post">
            <p><input type="text" name="email" value="" placeholder="Email"></p>
            <p><input type="text" name="login" value="" placeholder="First Name"></p>
            <p><input type="text" name="lastname" value="" placeholder="Last Name"></p>
            <p><input type="password" name="password" value="" placeholder="Password"></p>
            <p><input type="text" name="number" value="" placeholder="Phone Number"></p>           
            <p class="submit"><input type="submit" name="commit" value="Sign Up"></p>
        </form>
    </div>
    
</body>
</html>