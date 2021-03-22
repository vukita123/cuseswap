<?php
        session_start();
?>

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
          
        $db = mysqli_connect('localhost','root','','oes')
        or die('Error connecting to MySQL server.');
        ?>


		<header id="header">
			<div class="innertube">
				<a href="bicycles.php"><h1>Cuse Swaps</h1></a>
                <?php
                $name = $_SESSION["name"];
                $user_id = $_SESSION["user_id"];
                ?>
			</div>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Menu</button>
                <div id="myDropdown" class="dropdown-content">
                  <a href="#">About Us</a>
                  <a href="#">Help</a>
                  <!--<button onclick="endFunction()"><a onClick="endFunction()" href="">Log Out</a></button>-->
                  <a href="destroy.php">Log Out</a>
                </div>
            </div>
		</header>

        <div class="upperbar">
            <div class="addbtn">
				<form action="add.php">
					<button class="addbutton">Add a post!</button>
				</form>
			</div>
			
        </div>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="feed">
                        
						<?php
                        $current = 'bicycles';    
                        $smt = "SELECT * FROM items WHERE item_user_id = '$user_id'";
                        $items = $db->query($smt);
                        
                        function dropFunction($itemid){
                            $dropquery = "DELETE * FROM itmes WHERE item_id = '$itemid'";
                            $db = mysqli_connect('localhost','root','','oes');
                            $db->query($dropquery);
                        };
                                                                
                        while($row = $items->fetch_assoc()) {
                            echo '<div class="feedblock"> ';
                            echo '<div class="pic">';
                            echo '<img src="'.$row["item_URL"].'">';
                            echo '</div>';
                            echo '<div class="postbottom">';
                            echo '<div class="postbottomleft">';
                            echo '<div class="name"> '.$row["item_user_name"]. '</div>';
                            echo '<div class="number"> '.$row["item_worth"].'</div>';
                            echo '</div>';
                            echo '<div class="postbottomright">';
                            echo '<div class="bottomrightname">';
                            echo '<a href="dropitem.php?itemid='.$row["item_id"].'">Drop</a>';
							echo '</div>';
							echo '<div>';
                            echo '';
							echo '</div>';
                            echo '</div>';
                            echo '</div>';										
                            echo '</div>';
                        }
                        
                        $db->close();
						
						?>
						
                        
						
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
						<li><a href="monitors.php">Monitors</a></li>
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
				<p>Footer...</p>
			</div>
		</footer>
	
	</body>
</html>