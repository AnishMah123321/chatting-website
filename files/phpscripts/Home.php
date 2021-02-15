<?php
	$MyID = $_SESSION['UId'];
?>

<div class="container">
	 <div>
		 <div class="col-md-3">
			 <ul class="nav nav-tabs nav-stacked affix" id="myNav">
			 	<?php
			 		$SQL = "SELECT (SELECT users.FName FROM users WHERE users.ID=messageregister.`MessageFrom`) AS MFROMFname, (SELECT users.LName FROM users WHERE users.ID=messageregister.`MessageFrom`) AS MFROMLname, (SELECT users.FName FROM users WHERE users.ID=messageregister.`MessageTo`) AS MToFname, (SELECT users.LName FROM users WHERE users.ID=messageregister.`MessageTo`) AS MToLname,  MessageTo, MessageFrom FROM `messageregister`  WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER BY `messageregister`.`Date` DESC"
			 		;//SELECT MessageFrom, MessageTo FROM `messageregister` INNER JOIN `users` ON `messageregister`.`MessageFrom`= `users`.`ID` || `messageregister`.`MessageTo` = `users`.`ID` WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER BY `messageregister`.`Date` ASC";
		 			//$database->Database()->query($SQL);
		 			$tabledata = $database->database()->query($SQL);
					foreach ($tabledata as $row){
						echo "<li><a name='MessageFrom' data-mesagerId='".$row['MESSAGEFROM']."'>".$row['MFROMFNAME']." ".$row['MFROMLNAME']."</a></li>";
		        	}
			 		
			 	?>
			 </ul>
		 </div>
		 <div class="col-md-6">
		 <input type="hidden" id="ActiveMessageFrom" value="<?php

		 ?>">
		 	<div id="MessageSection">
		 		
		 	</div>

		 </div>
		 <div class="col-md-3">
			 <ul class="nav nav-tabs nav-stacked affix" id="myNav2">
				 <li class="active"><a href="#one">Tutorial One</a></li>
				 <li><a href="#two">Tutorial Two</a></li>
				 <li><a href="#three">Tutorial Three</a></li>
			 </ul>
		 </div>
	 </div>
</div>
<script type="text/javascript">
 $(function () {
 $('#myNav').affix({
 offset: {
 top: 60 
 }
 });
 }); $(function () {
 $('#myNav2').affix({
 offset: {
 top: 60 
 }
 });
 });
</script>