 <?php include_once PHPS.'chat.php';?>
<!--	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h2>Messages</h2>
				<div >-->
					<!--<div class="user">
						<h4  id="actve">Brajesh Raj Kayastha</h4>
						<h5 class="msg">sala</h5>
					</div>
					<div class="user">
						<h4 >Bipin Acharya</h4>
					</div>-->
					<!--<ul class="nav nav-tabs nav-stacked affix" id="myNav">
					 	<?php
					 		$SQL = "SELECT (SELECT users.FName FROM users WHERE users.ID=messageregister.`MessageFrom`) AS MFROMFname, (SELECT users.LName FROM users WHERE users.ID=messageregister.`MessageFrom`) AS MFROMLname, (SELECT users.FName FROM users WHERE users.ID=messageregister.`MessageTo`) AS MToFname, (SELECT users.LName FROM users WHERE users.ID=messageregister.`MessageTo`) AS MToLname,  MessageTo, MessageFrom FROM `messageregister`  WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER BY `messageregister`.`Date` ASC"
					 		;//SELECT MessageFrom, MessageTo FROM `messageregister` INNER JOIN `users` ON `messageregister`.`MessageFrom`= `users`.`ID` || `messageregister`.`MessageTo` = `users`.`ID` WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER BY `messageregister`.`Date` ASC";
				 			//$database->Database()->query($SQL);
				 			$tabledata = $database->database()->query($SQL);
							foreach ($tabledata as $row){
								echo "<li><a name='MessageFrom' data-mesagerId='".$row['MESSAGEFROM']."'>".$row['MFROMFNAME']." ".$row['MFROMLNAME']."</a></li>";
				        	}
					 		
					 	?>
					 </ul>
					
				</div >
			</div>
			<div class="col-sm-5">


			</div>	

			<div class="col-sm-3">
				<h2>Online</h2>
				<div class="Online">
					<h4>Brajesh Raj Kayastha</h4>
					<h4>Ganesh karki</h4>
					<h4>Bipin Acharya</h4>
					<h4>Nayana Shrestha</h4>
				</div>
			</div>
		</div>	
	</div>	-->