<!doctype html>
<html lang="en">
<HEAD>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<TITLE><?php echo TITLE;?></TITLE>


	<link rel="stylesheet" href="<?php echo BOOTSTRAP;?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BOOTSTRAP;?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BOOTSTRAP;?>css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BOOTSTRAP;?>css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="<?php echo BOOTSTRAP;?>css/login.css">

	
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="<?php echo BOOTSTRAP;?>jquery.min.js"></script>
    <script src="<?php echo BOOTSTRAP;?>js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    	<!--
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/open-iconic-bootstrap.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->




</HEAD>

	<BODY>
		<?php
		//Board File
			if($Login_Proc->LoginCheck()){
				include PHPS."Header.php";
				//echo '<div style="width:100%;height:100px;"></div>';
			}
			 
			include PHPS.$PageName;
		?>
	</BODY>
</HTML>