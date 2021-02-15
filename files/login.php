
<CENTER>
	<div class="container-fluid" style="background-image: url('files/images/background.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;" >
		<div class="row">
			<div class="col-lg-4" style="z-index : 1;">
				<div class="Logo">
					<h1 class="display-3" style="margin-top:50%;">WAFP</h1>
				</div>
			</div>
			<div class="col-sm-4" style="z-index: 2;">
				<div class="form-horizontal board" role="form">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
					    <div class="navbar-nav">
					      <a class="nav-item nav-link" id="signIn" style="padding-left: 50px; color : #28a745  " href="#" onclick="signIn()" ><h4>Sign In</h4></a>
					      <a class="nav-item nav-link" id="signUp" style="padding-left: 50px;" href="#" onclick="signUp()"><h4>Sign Up</h4></a>
					    </div>
					</nav>
					<div class="signin" id="signindiv">
						<img src="<?php echo IMAGES;?>useravatar.jpg" alt="UserImage" class="img-thumbnail" id="userimg" style="">
						<div class="signinboard" >
							<form method="POST" id="signin">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="Username" name="UserName" required="">
								</div>					
								
								<div class="input-group mb-3">
									<div class="input-group-prepend">
								    	<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
								    </div>
									<input type="password" class="form-control" placeholder="Password" required="" name="PassWord">
									<div class="input-group-append">
										<input type="hidden" name="Longitude" value="" id="NowLongitude">
										<input type="hidden" name="Latitude" value="" id="NowLatitude">
									 	<!--<button class="btn btn-outline-secondary" type="button-->
									 	<INPUT TYPE="submit" class="btn btn-outline-success" value="Login">					
									</div>
								</div>
							</form>
						</div>	
					</div>
				</div>
				<div class="signup" id="signupdiv">
					 <form method="POST" id="signup" >
						
						<input type="hidden" name="pagename" value="SignUp">
						
						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fab fa-nimblr"></i></span>
						  </div>
						  <input type="text" class="form-control" id="validationDefault01" name="FName" placeholder="First Name" required="">
						</div>

						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1">L</span>
						  </div>
						  <input type="text" class="form-control" id="validationDefault02" name="LName" placeholder="Last Name" required="">
						</div>

						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
						  </div>
						  <input type="number" class="form-control" id="validationDefaultNumber" name="Age" placeholder="Age" required="">
						</div>

						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1">Address</span>
						  </div>
						  	<select name="Address">
								<?php 
										$SQL = "SELECT * FROM `addresses`;";
										//echo "asdda";
										$database = $GLOBALS['database']->Database();
										try{
											$tabledata = $database->query($SQL);
											foreach ($tabledata as $row){
												echo "<option value=".$row["ID"].">".$row["ADDRESS"]."</option>";
								        	}
										}catch(PDOException $e){
											//echo $e->getMessage();
										}
									 
								?>
							</select>

						  </div>
						
						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
						  </div>
						  <input type="email" class="form-control" id="validationDefaultEmail" name="Email" placeholder="Email Address" required="">
						</div>

						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class='fas fa-user'></i></span>
						  </div>
						  <input type="text" class="form-control" id="validationDefaultUsername" name="UserName" placeholder="Username" required="">
						</div>

						<div class="form-group">	
							<div class="input-group input-group-sm mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
							  </div>
							  <input type="password" class="form-control" status="false" id="validationDefaultPassword" name="Password" placeholder="Password">
							<div class="input-group-append">
							    <span class="btn input-group-text" id="basic-addon1" onclick="showPassword()" ><i class="fas fa-eye-slash" id="passView"></i></span>
							 </div>
							</div>


							<small id="passHelp" class="form-text text" style="color: black; font-size: small;">Password should atleast be 8 characters long. </small>
						</div>

						<div class="form-group">
							<div class="input-group input-group-sm mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
							  </div>
							  <input type="password" class="form-control" status="false" id="validationDefaultrePassword" placeholder="Confirm Password">
							</div>
							<small id="confirmPassHelp" class="form-text text" style="color: red; font-size: small;"></small>

						</div>	

						<input type="submit" class="btn btn-outline-success" id="SignUpButton" value="Submit" >
					</form> 
				</div>
			</div>
			<div class="col-lg-4" style="z-index: 3">
				<div class="jumbotron">
					<h1 class="display-4">WEB Appications for Proffessionals,</h1>
					<p class="lead">WAFP an  Messaging web based application.</p>
					<hr class="my-4">
					<p>SIMPLE - CONVENIENT - SECURED
	  				
					  
					<a href="#" class="btn btn-primary btn-lg list-group-item list-group-item-action" id="headingThree-options" data-toggle="collapse" data-target="#collapseThree-options" aria-expanded="false" aria-controls="collapseThree-options" >Get to Know us Better </a>
	             
	             	<div id="collapseThree-options" class="collapse" aria-labelledby="headingThree-options" data-parent="#accordionExample1">
	                	<p>Stay Tunned comming soon!.</p>
	          		</div> 
				</div>
			</div>
		</div>
	</div>		
</CENTER>
<script type="text/javascript">

	function signUp(){
			document.getElementById("signupdiv").style.transform="translate(0%,-70%)";	
			document.getElementById("signindiv").style.transform="translate(-100%,30%)";
			document.getElementById("signIn").style.color="#6c757d";
			document.getElementById("signUp").style.color="#28a745";

			document.getElementById("signin").reset();
	}

	function signIn(){
			document.getElementById("signupdiv").style.transform="translate(100%,-70%)";	
			document.getElementById("signindiv").style.transform="translate(0%,30%)";

			document.getElementById("signup").reset();
			document.getElementById("signUp").style.color="#6c757d";
			document.getElementById("signIn").style.color="#28a745";	
	}

	document.getElementById("SignUpButton").addEventListener("click", function(event){

		passStatus = document.getElementById(validationDefaultPassword).getAttributeNode(status).value;
		confirmPassStatus = document.getElementById(validationDefaultrePassword).getAttributeNode(status).value;

		if(passStatus === 'true' && confirmPassStatus === 'true'){
			event.preventDefault();
			document.getElementById("signup").submit();
			document.getElementById("loginInfo").innerHTML = "Signup successful. You can login.";
		}
		else{
			document.getElementById("passHelp").value = "Error: Please check the passwords and try again.";
			document.getElementById("passHelp").getAttributeNode('style') = "color : red; font-size : small;";
		}	

	});

	document.getElementById("validationDefaultPassword").addEventListener("keyup", function(event){

		var pass = document.getElementById("validationDefaultPassword").value;

		if(pass.length < 8){
			document.getElementById("passHelp").getAttributeNode("style").value = "color : red; font-size: small;";
			document.getElementById("validationDefaultPassword").getAttributeNode("status").value = "false";

		}else{
			document.getElementById("passHelp").getAttributeNode("style").value = "color : green; font-size: small;";
			document.getElementById("validationDefaultPassword").getAttributeNode("status").value = "true";
		}
		
	});
	
	document.getElementById("validationDefaultrePassword").addEventListener("keyup", function(event){
	    var password = document.getElementById("validationDefaultPassword").value;
	    if (document.getElementById("validationDefaultrePassword").value===password){
	    	document.getElementById("confirmPassHelp").innerHTML = "Passwords matched";
	    	document.getElementById("validationDefaultrePassword").getAttributeNode("status").value = "true";
	    	document.getElementById("confirmPassHelp").getAttributeNode("style").value ="color : green; font-size: small;";
	    } else {
	    	document.getElementById("confirmPassHelp").innerHTML = "Passwords didnt matched";
	    	document.getElementById("validationDefaultrePassword").getAttributeNode("status").value = "false";
	    	document.getElementById("confirmPassHelp").getAttributeNode("style").value ="color : red; font-size: small;";
	    }
	});

	    window.onload = function(){

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);

        	navigator.geolocation.getCurrentPosition(function(a){});
            } else { 
                alert("Geolocation is not supported by this browser.");
            }
        function showPosition(position) {
            document.getElementById("NowLatitude").value =  position.coords.latitude;
            document.getElementById("NowLongitude").value = position.coords.longitude;
        }
    };

    //function to togle to show user password 
	function showPassword() {
	  var pass = document.getElementById("validationDefaultPassword");
	  var icon = document.getElementById("passView");

	  if (pass.type === "password") {
	    pass.type = "text";
	  	icon.classList.remove("fa-eye-slash");
	  	icon.classList.add("fa-eye");
	  } else {
	    pass.type = "password";
	    icon.classList.remove("fa-eye");
	  	icon.classList.add("fa-eye-slash");
	  }

	}
    function signUpBtnPressed(){

    }        	
</script>	