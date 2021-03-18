<?php
           //Step1
            $db = mysqli_connect('localhost','root','','oes')
            or die('Error connecting to MySQL server.');
        ?>




<?php
    echo 'test';
    $id = 1 ;
    $smt = "SELECT * FROM items WHERE item_id = '$id'";
		$items = $db->query($smt);
        while($row = $items->fetch_assoc()) {
            echo "id: " . $row["item_id"]. " - Name: " . $row["item_name"]. " category: " . $row["item_category"]. "<br>";
    }
   
?>
