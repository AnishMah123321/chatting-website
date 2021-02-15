
<div class="row">
    <div class="col-md-6">
    <h3>Showing Result For <?php echo $GLOBALS['cli']['search'];?></h3>
    <br>
    <ul>
<?php

    $database = $GLOBALS['database']->Database();
    $searchkey=$GLOBALS['cli']['search'];
    $tabledata = $database->query("SELECT * FROM users WHERE FName LIKE '%$searchkey%' OR LName LIKE '%$searchkey%'") or die("Could not search!");
            foreach ($tabledata as $row){
                echo "<li>".$row["FNAME"]." ".$row["LNAME"]."</li>";
            }
?>﻿
</ul>
</div>
<div class="col-md-6">
<h3>People Near You</h3>
    <ol style="">
<?php
    //$database = $GLOBALS['database']->Database();
    $SQL ="SELECT (SELECT CONCAT(`users`.`FName`,\" \",`users`.`LName`) FROM `users` WHERE `users`.`ID`= `UserId`) AS FULLNAME FROM `currentlocation` WHERE Latitude>((SELECT Latitude FROM currentlocation WHERE `UserId`=".$MyID.")-0.100) && Latitude<((SELECT Latitude FROM currentlocation WHERE `UserId`=".$MyID.")+0.100) && Longitude>((SELECT Longitude FROM currentlocation WHERE `UserId`=".$MyID.")-0.100) && Longitude<((SELECT Longitude FROM currentlocation WHERE `UserId`=".$MyID.")+0.100) && `IsOnline`=1;";
            $tabledata = $database->query($SQL);
            foreach ($tabledata as $row){
                echo "<li>".$row["FULLNAME"]."</li>";
            }

?>
</ol>
</div>
