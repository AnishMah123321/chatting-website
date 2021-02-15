<?php
	require_once dirname(__FILE__).'\config.php';

	require_once CLASSES.'Database.php';


	$database = new Database();

	require_once CLASSES.'UserAuthenication.php';

	$Login_Proc = new Login_Proc();


    switch($_SERVER['REQUEST_METHOD'])
    {
    case 'GET':
        $cli= &$_GET;
        break;
    case 'POST':
        $cli = &$_POST;
        break;
    }


	$PageName= (isset($cli['pagename']) && $cli['pagename'] != '') ? $cli['pagename'] : '';
	$Requests = (isset($cli['req']) && $cli['req'] != '') ? $cli['Requests'] : '';
	// echo $Requests."      ".$PageName;
	// exit;
	if(!$Login_Proc->LoginCheck()){
    //if not loged in
    	if ($PageName=="SignUp"){
    		$Requests="SignUp";
    	}
   	 	$PageName = 'login.php';
	    echo $Login_Proc->Login();
	} else {
		$MyID = $_SESSION['UId'];
		switch ($PageName) {
			Case "Home":
			default:
				$PageName = "Homes.php";
			break;

			Case "Logout":
				$Login_Proc->LogOut();
				exit();
			break;

			Case "Chat":
				$PageName = "chat.php";
			break;
		}
	}
	if(isset($Requests)){
		include CLASSES.'requests.php';
	}
	//$Login_Proc->LogOut();

//Main Page
/**/

include FILES.'index.php';
?>