<?php

class Login_Proc{
    //private $UName;
    //private $PassWord;

    function __construct(){
        //session_start();

    }
	function Login(){
	       
		if(empty($_POST['UserLogin'])){
			return false;
		}

        	if(empty($_POST['UserName']))
        	{
            		return false;
        	}

        	if(empty($_POST['PassWord']))
        	{
            		return false;
        	}

        	$UName = strtoupper(trim($_POST['UserName']));
        	$password = $this->convertmd5($_POST['PassWord']);

		if(!$this->UserCheck($UName, $password)){
			header("Location: ./?loginInfo=false");
            return false;
		}
        	header("Location: ./");
            return true;
            //exit();
		}


    function LogOut(){
        $database = $GLOBALS['database']->Database();
        $database->exec("UPDATE `CurrentLocation` SET `Latitude`=0,`Longitude`=0,`IsOnline`=0 WHERE `UserId`=".$_SESSION['UId'].";");
        unset($_SESSION['UId']);
		unset($_SESSION['UName']);
		header("Location: ./");
    }

	function LoginCheck(){
       
         	if(empty($_SESSION['UId']))
         	{
            		return false;
         	}
         	
         	return true;

    	}

	function UserCheck($User_Name, $Pass_Word){
		$count = 0;
		$SQL = "SELECT * FROM user_authenication WHERE USERNAME='".$User_Name."' && PASSWORD='".$Pass_Word."';";
		//echo "asdda";
		$database = $GLOBALS['database']->Database();
		try{
			$tabledata = $database->query($SQL);
			foreach ($tabledata as $row){
	            $count+=1;
	            $UId=$row['ID'];
	            $UName=$row['USERNAME'];
        	}
		}catch(PDOException $e){
			//echo $e->getMessage();
		}
        //$data = $GLOBALS['database']->SELECT_STMT("employeeprivilege", $where);
        
        

        if($count!=1)
        {
            return false;
        }
        $LAT = (isset($GLOBALS['cli']['Latitude']) && $GLOBALS['cli']['Latitude'] != '') ? $GLOBALS['cli']['Latitude'] : 0;
        $LON = (isset($GLOBALS['cli']['Longitude']) && $GLOBALS['cli']['Longitude'] != '') ? $GLOBALS['cli']['Longitude'] : 0;
        $database->exec("UPDATE `CurrentLocation` SET `Latitude`=".$LAT.",`Longitude`=".$LON.",`IsOnline`=1 WHERE `UserId`=".$UId.";");
        //session_start();
        $_SESSION['UId']=$UId;	
        $_SESSION['UName']=$UName;

        //$database->exec("UPDATE `CurrentLocation` SET `Latitude`=".$GLOBALS['cli']['Latitude'].",`Longitude`=".$GLOBALS['cli']['Longitude'].",`IsOnline`=1 WHERE `UserId`=".$UId.";");
        return true;
    }


//Convert text to MD5
	function convertmd5($textt){
		$md = md5($textt);
		return $md;
	}

}
?>
