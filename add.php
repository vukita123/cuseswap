<?php
        session_start();
?>

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
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <p><input type="file" name="fileToUpload" id="fileToUpload"></p>
            <p><input type="text" name="itemname" value="" placeholder="Item name"></p>
            <label for="categories">Choose a category:</label>
            <select id="categories" name="itemcategory">
                <option value="bicycles">Bicycle</option>
                <option value="skateboards">Skateboard</option>
                <option value="rollerblades">Rollerblades</option>
                <option value="outdoorsports">Outdoor Sports</option>
                <option value="laptops">Laptop</option>
                <option value="monitors">Monitor</option>
                <option value="consoles">Console</option>
                <option value="speakers">Speaker</option>
                <option value="games">Video Game</option>
                <option value="fridges">Fridge</option>
                <option value="microwaves">Microwave</option>
                <option value="fans">Fan</option>
                <option value="acunits">AC Unit</option>
                <option value="humidifiers">Humidifier</option>
                <option value="hoodies">Hoodie</option>
                <option value="shirts">Shirts</option>
                <option value="tshirts">T-shirts</option>
                <option value="shorts">Shorts</option>
                <option value="jackets">Jacket</option>
                <option value="shoes">Shoes</option>

            </select>
            <!--<p><input type="text" name="itemcategory" value="" placeholder="Item category"></p>-->
            <p><input type="text" name="itemcondition" value="" placeholder="Condition"></p>
            <p><input type="text" name="itemvalue" value="" placeholder="Perceived monetary value"></p>
            <input type="submit" value="Upload" name="submit">
        </form>
        <?php print_r($_SESSION);
            print_r($_SESSION["user_id"]);
         ?>
    </div>
</body>
</html>