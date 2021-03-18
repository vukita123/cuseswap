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
                <?php echo date('l, F jS, Y'); ?>
				Welcome <?php echo $_POST["login"]; ?>!
				<?php  ?>
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
						<?php $sql = "SELECT * FROM users WHERE user_first_name = 'login'";
						$result = $db->query($sql);
						$id = 	$result['user_id'];
						$name = $result['user_first_name'];
						$number = $result['user_phone'];
						// uses the user_id to fetch the interests (form?) from the interests table database   
						$smt = "SELECT * FROM interests WHERE user_id = '$id'";
						$items = $db->query($smt);
                        $current = 'rollerblades';
						//this needs to be implemented to generate posts on the feed!!!
						$test = "SELECT * FROM items WHERE category = $current";
						$itemrow = $db->query($test);
								
								
                            while($row = $itemrow->fetch_assoc()) {
                                echo '<div class="feedblock"> ';
                                echo '<div class="pic">';
                                echo '<img src='.$row["url"].'>';
                                echo '</div>';
                                echo '<div class="postbottom">';
                                echo '<div class="name"> '.$row["user_name"]. '</div>';
                                echo '<div class="number"> '.$row["user_phone"].'</div>';
                                echo '</div>';										
                                echo '</div>';
                            }
						$db->close();
						
						?>
						<!--<div class="feedblock"> 
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
                            
                        </div>-->
                        
						
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
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Monitors</a></li>
						<li><a href="#">Consoles</a></li>
						<li><a href="#">Speakers</a></li>
						<li><a href="#">Games</a></li>
					</ul>
					<h3>Appliances</h3>
					<ul>
						<li><a href="#">Refridgerators</a></li>
						<li><a href="#">Microwaves</a></li>
						<li><a href="#">Fans</a></li>
						<li><a href="#">AC Units</a></li>
						<li><a href="#">Humidifiers</a></li>
					</ul>
                    <h3>Clothes</h3>
					<ul>
						<li><a href="#">Hoodies</a></li>
						<li><a href="#">Shirts</a></li>
						<li><a href="#">T Shirts</a></li>
						<li><a href="#">Pants</a></li>
						<li><a href="#">Shorts</a></li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Shoes</a></li>
					</ul>
				</div>
			</nav>
		
		</div>
		
		<footer id="footer">
			<div class="innertube">
				<p>Footer...</p>
			</div>
		</footer>
	
	</body>
</html>