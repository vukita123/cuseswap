<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Cuse Swaps</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        </style>

        <script type="text/javascript">
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown menu if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {
                                    openDropdown.classList.remove('show');
                                }
                        }
                    }
                }
        </script>
	
	</head>
	
	<body>		

        <?php
           //Step1
            $db = mysqli_connect('localhost','root','','oes')
            or die('Error connecting to MySQL server.');
        ?>



		<header id="header">
			<div class="innertube">
				<a href="index.php"><h1>Cuse Swaps</h1></a>
                
			</div>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Menu</button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="#">About Us</a>
                  <a href="#">Help</a>
                  <a href="#">Log Out</a>
                </div>
            </div>
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="feed">
						<!-- uses the login (username) to fetch the user_id from the user table database   -->
						
						<?php $sql = "SELECT * FROM users WHERE user_first_name = 'login' ";
						$result = $db->query($sql);
						$resulttest =  $result->fetch_array(MYSQLI_ASSOC);
						// uses the user_id to fetch the interests (form?) from the interests table database   
						$smt = "SELECT * FROM items WHERE item_user_id = '$id'";
						$items = $db->query($smt);
						//this needs to be implemented to generate posts on the feed!!!
						$categoryvals=['bicycles','skateboards','rollerblades','outdoor'];
						$arrayLength = count($categoryvals);
						$i = 0;
						while ($i < $arrayLength)//might need to adjust depending on colums for user_id (change initial i value)
						{
							if ($items[$i] == 'true')
							{
								$test = "SELECT * FROM items WHERE category = categoryvals[$i]";
								$itemrow = $db->query($test);
								
								
								while($row = $itemrow->fetch_assoc()) {
									echo '<div class="feedblock"> ';
									echo '<div class="pic">';
									echo '<img src='.$row["item_url"].'>';
									echo '</div>';
									echo '<div class="postbottom">';
									echo '<div class="name"> '.$row["item_user_id"].' </div>';
									echo '<div class="number"> '.$row["item_user_id"].'</div>';
									echo '</div>';										
									echo '</div>';
								}
								
								
							}
						}
						$db->close();
						
						?>
						<div class="feedblock"> 
                            <div class="pic">
                                <img src="img/test.jpg">
                            </div>
                            <div class="postbottom">
                                <div class="name"> Andrew </div>
                                <div class="number"> 123456789</div>
                            </div>
                            
                        </div> 
                        <div class="feedblock"> 
                            <div class="pic">
                                <img src="img/test.jpg">
                            </div>
                            <div class="postbottom">
                                <div class="name"> Andrew </div>
                                <div class="number"> 123456789</div>
                            </div>
                            
                        </div>
                        <div class="feedblock"> 
                            <div class="pic">
                                <img src="img/test.jpg">
                            </div>
                            <div class="postbottom">
                                <div class="name"> Andrew </div>
                                <div class="number"> 123456789</div>
                            </div>
                            
                        </div>
                        <div class="feedblock"> 
                            <div class="pic">
                                <img src="img/test.jpg">
                            </div>
                            <div class="postbottom">
                                <div class="name"> Andrew </div>
                                <div class="number"> 123456789</div>
                            </div>
                            
                        </div>
                        
						
					</div>
				</div>
			</main>
			
			<nav id="nav">
				<div class="innertube">
					<h3>Outdoor</h3>
					<ul>
						<li><a href="bicycles.php">Bicycles</a></li>
						<li><a href="skateboards.php">Skateboards</a></li>
						<li><a href="rollerblades.php">Rollerblades</a></li>
						<li><a href="outdoor.php">Outdoor Sports</a></li>
						<!--<li><a href="#"></a></li>-->
					</ul>
					<h3>Tech</h3>
					<ul>
						<li><a href="laptops.php">Laptops</a></li>
						<li><a href="monitors/php">Monitors</a></li>
						<li><a href="consoles.php">Consoles</a></li>
						<li><a href="speakers.php">Speakers</a></li>
						<li><a href="games.php">Games</a></li>
					</ul>
					<h3>Appliances</h3>
					<ul>
						<li><a href="fridges.php">Refridgerators</a></li>
						<li><a href="microwaves.php">Microwaves</a></li>
						<li><a href="fans.php">Fans</a></li>
						<li><a href="ac.php">AC Units</a></li>
						<li><a href="humidifiers.php">Humidifiers</a></li>
					</ul>
                    <h3>Clothes</h3>
					<ul>
						<li><a href="hoodies.php">Hoodies</a></li>
						<li><a href="shirts.php">Shirts</a></li>
						<li><a href="tshirts.php">T Shirts</a></li>
						<li><a href="pants.php">Pants</a></li>
						<li><a href="shorts.php">Shorts</a></li>
                        <li><a href="jackets.php">Jackets</a></li>
                        <li><a href="shoes.php">Shoes</a></li>
					</ul>
				</div>
			</nav>
		
		</div>
		
		<footer id="footer">
			<div class="innertube">
				<p></p>
			</div>
		</footer>
	
	</body>
</html>