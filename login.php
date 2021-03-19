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
        <form action="landingpage.php" method="post">
            <p><input type="text" name="login" value="" placeholder="Username"></p>
            <p><input type="password" name="password" value="" placeholder="Password"></p>
            <p class="remember_me">
            <label>
                <input type="checkbox" name="remember_me" id="remember_me">
                Remember me!
            </label>
            </p>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
        </form>
        <a class="signup" href="signup.php">Sign Up?</a>
    </div>
    
</body>
</html>