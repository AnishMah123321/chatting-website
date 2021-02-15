<?php
	switch ($Requests){
	    case "SignUp":
	    	$Fname = $cli["FName"];
	    	$Lname = $cli["LName"];
	    	$Email = $cli["Email"];
	    	$UserName = $cli["UserName"];
	    	$Password = $cli["Password"];
	    	$rePassword = $cli["rePassword"];
	    	$Age = $cli["Age"];
	    	$Address = $cli["Address"];

	    	echo"<script>alert(".$Password." & ".$rePassword.");</script>";
	    	if($Password == $rePassword){

		    	$SQL = "SET @p0='".$Fname."'; SET @p1='".$Lname."'; SET @p2='".$Age."'; SET @p3='".$Address."'; SET @p4='".$Email."'; SET @p5='".$UserName."'; SET @p6='".md5($Password)."'; CALL `NewUser`(@p0, @p1, @p2, @p3, @p4, @p5, @p6);";
		    	$database->Database()->exec($SQL);
		    	
		    	header ("Location:./?signupInfo=true");

	    		exit;
	    	}else{
	    		header ("Location:./?signupInfo=false");
	    	}
	    	exit;
	    break;

	    case "SendMessage":
	    	$SQL = "INSERT INTO `messageregister` (`MessageFrom`, `MessageTo`,`Messages`,`Latitude`,`Longitude`)
        VALUES (".$MyID.", ".$_GET["UserId"].",'".$_GET["Messages"]."',0, 0);";
	    	if ($database->Database()->exec($SQL)){
	    		echo 1;
	    		exit;
	    	}
	    	echo -10;
	    	exit;
	    	
	    break;



	    

	    case "readmessage":

	    	$cursor = $GLOBALS['cli']['MessageCursor'];
	    	$messageArray = array();

	    	//error in $cli['UserId'], new_contact_to_chat
	    	//solution pending
	    	$SQL = "SELECT `ID`,`Date`, `Messages`, `Latitude`, `Longitude`,`DeleteStatus`,`Message_Type`,(CASE WHEN `MESSAGEFROM` = ".$MyID." THEN True WHEN `MESSAGETO` =".$MyID." THEN  False END ) AS MYMSG FROM `messageregister` WHERE ((`MESSAGEFROM`=".$cli['UserId']." && `MESSAGETO`=".$MyID.") || (`MESSAGETO`=".$cli['UserId']." && `MESSAGEFROM`=".$MyID.")) && ID>".$cursor.";";
	    	$tabledata = $database->database()->query($SQL);
	    	$count = 0;
	    	$maxCount = $cursor;
                    foreach ($tabledata as $row){
                    	
                    	$messageArray[$count]=array("ID"=>$row['ID'],"DATE"=>$row['DATE'], "MESSAGES"=>$row['MESSAGES'], "LAT"=>$row['LATITUDE'], "LONGI"=>$row['LONGITUDE'], "MFROMME"=>$row['MYMSG'], "DeleteStatus"=>$row['DELETESTATUS'],"Message_Type"=>$row['MESSAGE_TYPE']);
                    	//$messageArray[$count]["MESSAGES"]."<Br>";
                    	$count = $count+1;

                    	$maxCount=$row["ID"];
                    }
                    $messageArray["CURSOR"]=$maxCount;
                    $myJSON = json_encode($messageArray);
                    if ($maxCount!=$cursor)
						echo $myJSON;
					else 
						echo -1;
	    	exit;
	    break;

	   case 'LatestMesseger':
	   		
	   break;

	   case 'SearchFriend':
	   		$searchVal = $GLOBALS['cli']['searchval'];
	   		$searchArray = array();
	   		$tempNonFriendArray = array();
	   		$friendID;
	   		
 			$count = 0;
    		// $tabledata = $database->query("SELECT *,(SELECT UserId FROM users WHERE FName LIKE '%$searchVal%' OR LName LIKE '%$searchVal%') AS UserId,(SELECT UserID2 From `friend list` WHERE UserID1 = %$MyID%)) AS UserId1 FROM users WHERE UserId1=UserId;");
            $tabledata = $database->database()->query("SELECT * FROM users WHERE FName LIKE '%".$searchVal."%' OR LName LIKE '%".$searchVal."%' OR Username LIKE '%".$searchval."%' OR PhoneNo LIKE '%".$searchval."%' OR MobileNo LIKE '%".$searchval."%' OR EmailAddress LIKE '%".$searchval."%' ");
            
            $selectdata = $database->database()->query("SELECT x.UserID2 FROM (SELECT * FROM `friend list` WHERE UserID1 = '".$MyID."') as x;");

            $friendIDs = array();
            foreach ($selectdata as $sdatum) {
            	$friendIDs[$sdatum["USERID2"]] = "BLAH";   
           	}

          

           foreach ($tabledata as $row){
           		$friend_filtered_id = $row["ID"];
           		$friend_filtered_fname = $row["FNAME"];
           		$friend_filtered_lname = $row["LNAME"];


           		
       			if (!array_key_exists($friend_filtered_id, $friendIDs)) {
       				$searchArray[$count] = array("UserID"=>$friend_filtered_id, "FNAME"=>$friend_filtered_fname,
       												   "LNAME"=>$friend_filtered_lname, "STATUS"=>"STRANGER");
       				
       			} else {
       				$searchArray[$count] = array("UserID"=>$friend_filtered_id ,"FNAME"=>$friend_filtered_fname, "LNAME"=>$friend_filtered_lname, "STATUS"=>"FRIEND");
       			}
       			

       			$count += 1;


           			//unnecessary
/*           			$names_row = $database->database()->query("SELECT * from users WHERE ID = '".$temp_id."';");
           			if (!$names_row) {
           				echo "PHP Dbase error\n";
           			}

           			foreach ($names_row as $name_row) {
           				//echo "DEBUG XYZ<br>";
           				//print_r ($name_row);
	           			$searchArray[$count] = array("UserID"=>$temp_id ,"FNAME"=>$name_row["FNAME"], "LNAME"=>$name_row["LNAME"], "STATUS"=>"FRIEND");

	           			$count += 1;
           			}*/
           			/*foreach($friendlist as $row2){
           				 $row2["FName"]." ".$row2["LName"];
                		*/
           			
            }

                
            $myJSON = json_encode($searchArray);
            echo $myJSON;
            exit;
	   	break;

/*	   	case 'addFriend':

		   	$searchVal = $GLOBALS['cli']['Username'];
			$tabledata = $database->Database()->query("SELECT ID FROM users WHERE Username = '$searchVal'");
			
			if($tabledata != null){

				foreach ($tabledata as $row) {
					$friendID = $row["ID"];
	   				$SQL="INSERT INTO `friend list` (`UserID1`, `UserID2`) VALUES (".$MyID.", ".$row["ID"].")";
				}
	   			if ($database->Database()->exec($SQL)){
		    		$tabledata1 = $database->query("SELECT * FROM users WHERE ID = '%$friendID%'");
		    		echo $row["FNAME"]." ".$row["LNAME"];
	    		exit;
	    		}
			}
			else{
				echo -15;
			}
			exit;
	   		break;

		case 'searchUser':

			exit;
			break;*/

		case 'AddFriendClicked':
			$friendID = $_REQUEST["UserID"];
									
					$tabledatacheck = $database->Database()->query("SELECT * FROM `friend list` WHERE UserID1 = '$MyID' AND UserID2 = '$friendID';");
					
					if($tabledatacheck->rowCount() == 0 ){
			
			
	   					$SQL="INSERT INTO `friend list` (`UserID1`, `UserID2`) VALUES ('$MyID', '$friendID');";
	   					$SQL1="INSERT INTO `friend list` (`UserID1`, `UserID2`) VALUES ('$friendID', '$MyID');";
	   			
		   				if ($database->Database()->exec($SQL) && $database->Database()->exec($SQL1)){
			    			//$tabledata1 = $database->query("SELECT * FROM users WHERE ID = '%$friendID%'");
				    		//echo $row["FNAME"]." ".$row["LNAME"];
				    		
				    		//ANIL MILAU HAI SIGNUP ma USERNAME

				    		echo"Friend added";


			    			exit;
		    			}
			    		
					} else{
						echo "You are already Friends.";
					}
				
			


			exit;
			break;


		case "deletefriend":

	    	$fatah_user_id = $cli['UserId'];

	    	$SQL = "DELETE FROM `friend list` WHERE ((USERID1 = '$fatah_user_id') || (USERID2 = '$fatah_user_id'));";
	    	

	    	if ($database->database()->exec($SQL)){
	    			//$tabledata1 = $database->query("SELECT * FROM users WHERE ID = '%$friendID%'");
		    		//echo $row["FNAME"]." ".$row["LNAME"];
		
		    		echo "Friend Removed";


	    			exit;

			} else{
				echo "Friend already removed.";
			}
	    	exit;
	    	break;

		case 'UpdateLatestMessager':
			$count = 0;
			$CurrTopMsgDateTime = $_REQUEST["CurrTopMsgDateTime"];
			$current_latest = 0;
			$SQL = "SELECT `messageregister`.`MessageFrom`, `messageregister`.`MessageTo` FROM `messageregister` WHERE `Date`>'$CurrTopMsgDateTime' AND (`messageregister`.`MessageFrom`='$MyID' OR `messageregister`.`MessageTo`='$MyID') ORDER BY `messageregister`.`Date` DESC;";

			$tabledata = $database->database()->query($SQL);

			$latest_messengers = array();
			foreach ($tabledata as $row){

				//set CurrTopMsgDateTime
				$id_from = $row['MESSAGEFROM'];
				$id_to = $row['MESSAGETO'];
				$id = $id_from==$MyID ? $id_to : $id_from;

				$SQL1 = "SELECT FName, LName FROM users WHERE ID = '$id';";
				$singrow = $database->database()->query($SQL1);

				foreach ($singrow as $single_row) {
					$fname = $single_row["FNAME"];
					$lname = $single_row["LNAME"];
					$latest_messengers[$count] = array("ID"=>$id, "FName"=>$fname, "LName"=>$lname);

				}

				$count += 1;

				// $FNAME=$row['FNAME'];
				// $LNAME=$row['LNAME'];
				// echo "<a href=\"#\" onclick=\"contact_choose(this);\" UserId=\"".$ID."\" class=\"list-group-item list-group-item-action RecentContacts\" UserName= \"".$FNAME." ".$LNAME."\"><img src=\"../images/img.jpg\" class=\"mr-3 mt-3 rounded-circle\" style=\"width:45px; float:left;\">".$FNAME." ".$LNAME." </a> " ;
			}
			$DaTeTiMe = "";
            $sqlss="select LOCALTIMESTAMP as TS;";
            $datass = $database->database()->query($sqlss);
            foreach ($datass as $d){
                $DaTeTiMe = $d["TS"];
            }
			$latest_messengers[$count] = array("CurrTopMsgDateTime"=>$DaTeTiMe);
			// print_r ($latest_messengers[$count]);
            $myJSON = json_encode($latest_messengers);
            echo $myJSON;
           

			exit;
			break;

		case 'deleteMessage' :
			$messageID = $_REQUEST["messageId"];
			echo "MESSAGE IDENTITY " . $messageID;

			$SQL = "UPDATE `messageregister` SET `DeleteStatus`='1', `Messages`='Message is deleted.', `Message_Type`='T' WHERE `ID`=$messageID;";

			if($database->Database()->exec($SQL)){
				echo "Message deleted successfully.";
			}else{
				echo "Failed to delete the message.";
			}


			exit;

			break;	

		case 'sendFile':
			
			//echo ini_get("session.upload_progress.name");
			$file_name=$_FILES['file']['name'];
			/*echo "MYFILENAME " . $file_name;
			print_r($_SESSION);
			echo "111";*/

			if(isset($file_name)&&!empty($file_name)){
				$file_size=$_FILES['file']['size'];
				$file_type=$_FILES['file']['type'];
				$file_tmp_name=$_FILES['file']['tmp_name'];
				$location = "upload_files/";
				$new_file_name = $location.mt_rand(100000000,999999999).$file_name;

				/*echo "MERO GEDA " . $GLOBALS['cli']['UserId']; // got */
				$visavis = $_REQUEST["to_user_id"];
			
				if(move_uploaded_file($file_tmp_name, $new_file_name)){
					$SQL = "";

					if($file_type=="image/gif"||$file_type=="image/jpeg"||$file_type=="image/png"){
				    	$SQL = "INSERT INTO `messageregister` (`MessageFrom`, `MessageTo`,`Messages`,`Latitude`,`Longitude`,`Message_Type`)
					        VALUES (".$MyID.", ".$visavis.",'".$new_file_name."',0, 0,'I');";	
					}else{
				    	$SQL = "INSERT INTO `messageregister` (`MessageFrom`, `MessageTo`,`Messages`,`Latitude`,`Longitude`,`Message_Type`)
					        VALUES (".$MyID.", ".$visavis.",'".$new_file_name."',0, 0,'F');";	
					}

			    	if ($database->Database()->exec($SQL)){
			    		echo 'Uploaded successfully';	
			    	};
				}
				else{
					echo 'Error: Could not upload file. Check filename for special Charaters.';
				}
			}
			exit;
			break;

		case 'sendFileProgression':


			$key = ini_get("session.upload_progress.prefix") . "data_file";
			echo "Printing session data: ";
			print_r($_SESSION);

			if (!empty($_SESSION[$key])) {
			    $current = $_SESSION[$key]["bytes_processed"];
			    $total = $_SESSION[$key]["content_length"];
			    echo $current < $total ? ceil($current / $total * 100) : 99.99999;
			}
			else {
			    echo 100;
			}

			exit;
			break;


		/*Avatar Upload SQL*/	
		case 'uploadAvatar':
			//echo ini_get("session.upload_progress.name");
			$file_name=$_FILES['file']['name'];
			//print_r($_SESSION);

			if(isset($file_name)&&!empty($file_name)){
				
				$file_type=$_FILES['file']['type'];
				$file_tmp_name=$_FILES['file']['tmp_name'];
				$location = "upload_files/avatar/";
				$new_file_name = $location."User".$MyID.".jpg";
				//echo $file_type;


				if($file_type=="image/gif"||$file_type=="image/jpeg"||$file_type=="image/png"){
					if(move_uploaded_file($file_tmp_name, $new_file_name)){
						$SQL = "";
						$SQL = "UPDATE `users` SET `UserAvatar` ='".$new_file_name."' WHERE ID = '".$MyID."'; ";
				    	/*$SQL = "INSERT INTO `users` (`UserAvatar`)
					        	VALUES (".$new_file_name.") WHERE `ID` ='".$MyID."';";	*/
				    	if ($database->Database()->exec($SQL)){
				    		echo "Uploaded successfully";	
				    	};
					}
					else{
						echo -1;
					}
				} else {
					echo "Invalid file format. Image filename should not contain any symbols";
				}
			}
			exit;
			break;

		/*case 'showFilesShared':
			$userId = $_REQUEST['filesharedUserId'];
			//echo $userId." ".$MyID;

			$SQL = "SELECT `Messages` FROM `messageregister` WHERE ((`MESSAGEFROM`=".$userId." && `MESSAGETO`=".$MyID.") || (`MESSAGETO`=".$userId." && `MESSAGEFROM`=".$MyID.")) && `Message_Type`='F'";

			$tabledata = $database->database()->query($SQL);
			

			$message = array();
			$count = 0;
			if($tabledata->rowCount() > 0){
				foreach ($tabledata as $row) {
					$message[$count] = array("filename" => $row['MESSAGES']);
					$count +=1;
				}

				$fileJSON = json_encode($message);
				echo $fileJSON;
				exit;
			}
			else{
				echo "-1";
			}
			exit;
		break;	
	
		case 'showPhotosShared':
			$userId = $_REQUEST['photossharedUserId'];
			//echo $userId." ".$MyID;

			$SQL = "SELECT `Messages` FROM `messageregister` WHERE ((`MESSAGEFROM`=".$userId." && `MESSAGETO`=".$MyID.") || (`MESSAGETO`=".$userId." && `MESSAGEFROM`=".$MyID.")) && `Message_Type`='I'";

			$tabledata = $database->database()->query($SQL);
			

			$message = array();
			$count = 0;
			if($tabledata->rowCount() > 0){
				foreach ($tabledata as $row) {
					$message[$count] = array("photo" => $row['MESSAGES']);
					$count +=1;
				}

				$fileJSON = json_encode($message);
				echo $fileJSON;
				exit;
			}
			else{
				echo "-1";
			}
			exit;
		break;	*/
	}


?>