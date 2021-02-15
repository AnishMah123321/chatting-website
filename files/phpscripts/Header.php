<!--HEADER PAGE-->
<!--
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	 <div class="navbar-header">
		 <button type="button" class="navbar-toggle" data-toggle="collapse"
		 data-target="#example-navbar-collapse">
			 <span class="sr-only">chat</span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
			 <span class="icon-bar"></span>
		 </button>
		 <a class="navbar-brand" href="#">?php echo TITLE;?></a>
	</div>
	<div class="collapse navbar-collapse navbar-right">
		 <ul class="nav navbar-nav">
			 <li class="dropdown">
				 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				 ?php echo $_SESSION['UName'];?>
				 <b class="caret"></b>
				 </a>
				 <ul class="dropdown-menu">
					 <li><a href="#">Friends</a></li>
					 <li class="divider"></li>
					 <li><a href="?pagename=Logout">Logout</a></li>
				 </ul>
			</li>
		 </ul>
	 </div>
</nav>-->
<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="login.html">Chat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="HOMES.php">Home <span class="sr-only">(current)</span></a>
      </li>
    
      
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>--><!--
    </ul>
    <button type="button" class="btn btn-default" aria-label="Left Align">
  		<span class="material-icons">message </span>  		
	</button>
	 <button type="button" class="btn btn-default" aria-label="Left Align">
  		<span class="material-icons">group </span>
  		
	</button>
	 <button type="button" class="btn btn-default" aria-label="Left Align">
  		<span class="material-icons">call </span>
  		
	</button>

    <form class="form-inline my-2 my-lg-0" method="POST" action="?php echo PHPS;?>search.php">

      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

    </form>-->
<!--
    <a href="?pagename=Search" class="btn btn-outline-success my-2 my-sm-0">Search</a>
  </div>
</nav>
--><!--
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse"
     data-target="#example-navbar-collapse">
       <span class="sr-only">chat</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="#">?php echo TITLE;?></a>
  </div>
  <div class="collapse navbar-collapse navbar-right">
     <ul class="nav navbar-nav">
       <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         ?php echo $_SESSION['UName'];?>
         <b class="caret"></b>
         </a>
         <ul class="dropdown-menu">
           <li><a href="#">Friends</a></li>
           <li class="divider"></li>
           <li><a href="?pagename=Logout">Logout</a></li>
         </ul>
      </li>
     </ul>
   </div>
</nav>
-->

<nav class="navbar navbar-light bg-primary ">
  <a href = "/chat"class="navbar-brand" style="color:white;">Chat</a>
    
    <form class="form-inline my-2 my-lg-0">    

      <input class="form-control mr-sm-2" id="search" placeholder="Search friends" aria-label="Search" style="width: 40%;">
      
      <a  class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#searchModal" style="color:white; margin-right: 30px;" id = "searchButton"><!-- <button id="enterSearchButton"> --> <u>S</u>earch</button></a>

      <a class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#optionModal" style="color:white; margin-right: 5px;" id="Option_button"><u>O</u>ptions</a>

      <a class="btn btn-outline-danger my-2 my-sm-0" id="logoutButton" style="color:white;" href="?pagename=Logout"><u>L</u>ogout</a>

    </form>

</nav>


<div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden = "true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="optionModalLabel">Options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="accordion" id="accordionExample1">
             <div class="list-group ">  
               <div class="settings">
                  <a href="#" class="list-group-item list-group-item-action" id="headingTwo-options" data-toggle="collapse" data-target="#collapseTwo-options" aria-expanded="false" aria-controls="collapseTwo-options" ><i class="fas fa-user-cog" style="padding-right: 5px;"></i>Settings</a>

                  <div id="collapseTwo-options" class="collapse" aria-labelledby="headingTwo-options" data-parent="#accordionExample1">
                     <span class = "btn btn-light" id="fileSend" data-toggle="modal" data-target="#avatarUploadModal" title="send a file" style="font-size: 25px; margin-left: 10px; color: Dodgerblue;">
                             Upload Avatar <i class="fas fa-file-upload"></i>
                          </span>

                          <!-- End Avatar Upload -->  

                  </div>

              </div>
              <div class="others">
                  <a href="#" class="list-group-item list-group-item-action" id="headingThree-options" data-toggle="collapse" data-target="#collapseThree-options" aria-expanded="false" aria-controls="collapseThree-options" >Others</a>
                 
                  <div id="collapseThree-options" class="collapse" aria-labelledby="headingThree-options" data-parent="#accordionExample1">
                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat                   skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3.</p>
                  </div>
               </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Avatar Upload Modal -->
<div class="modal fade" id="avatarUploadModal" tabindex="-1" role="dialog" aria-labelledby="avatarUploadModalLabel" aria-hidden = "true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="avatarUploadModalLabel">Upload Avatar</h5>
      </div>
      <div class="modal-body">

        <form method="POST" id="data_file_avatar" action ="" enctype="multipart/form-data">
          
            <input type="hidden" name="UserId" value="0" id="UserId_File"> 
            <input type="file" name="file" name="fileToUpload">
            <input type="hidden" name="isfile" value="1">
            <!-- <input type="submit" value="Upload file" onclick="uploadAvatar()" name="submit "> -->
          <!--   <button onclick="uploadAvatar();">Submit</button> -->                                           
            <input type="hidden" name="req" value="1" id="req"/>
            <input type="hidden" name="Requests" value="uploadAvatar" id="Requests"/><input type='submit' value='Submit' onclick='return uploadAvatar();'>
        </form>
        <iframe id="hidden_iframe" name="hidden_iframe" src="about:blank" style="display: none;"></iframe>
      </div>
    </div>
  </div>
</div>  
<!-- Avatar Upload Modal End -->


<div class="modal fade" id="friendAdded" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="list-group list-group-flush">Friend Added Successfully.
        </div>
      </div>
      <div class="modal-footer">
        <div class="list-group list-group-flush">Now you can send messages directly from Chat Box..
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>

<!-- Remove friend modal -->
<div class="modal fade" id="friendRemove" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="list-group list-group-flush">Friend Removed Successully.
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>
<!-- END -->


<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">Search results</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="list-group list-group-flush" id="searchList">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  xmlhttp ='';
  function XMLReq(){
        if (window.XMLHttpRequest || window.ActiveXObject) {
            if (window.ActiveXObject) {
                try {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(exception) {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } else {
              xmlhttp = new XMLHttpRequest(); 
            }
            return xmlhttp;
        } else {
            alert("Your browser does not support XMLHTTP Request");
        }      
  }

  $('#searchModal').on('show.bs.modal', function (event) {


    var searchList = document.getElementById("searchList");

    var child = searchList.firstElementChild;

        while (child) { 
            searchList.removeChild(child); 
            child = searchList.firstElementChild; 
        } 
  

   if (!xmlhttp){
      xmlhttp = XMLReq();
    }

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
            var myObj = JSON.parse(this.responseText);
            var Length = Object.keys(myObj).length;
            //alert(myObj);
            var c=0;

            var frienddiv = document.createElement("div");
            var unknowndiv = document.createElement("div");

            var friendtitle = document.createElement("h4");
            friendtitle.classList.add("text","text-muted");

            var nfriendtitle = document.createElement("h4");
            nfriendtitle.classList.add("text","text-muted");


            var style = document.createAttribute("style");
            style.value=" margin-bottom : 15px ";

            frienddiv.setAttributeNode(style);
            frienddiv.appendChild(friendtitle);

           unknowndiv.appendChild(nfriendtitle);

           var titleFrnCount = 0;
           var titleUnkCount = 0;
              for (var i=0;i<Length; i++)
              {
                if(myObj[i]["STATUS"]=="FRIEND"){
                  
                  var UID = myObj[i]["UserID"];
                  var UserName = myObj[i]["FNAME"]+" "+myObj[i]["LNAME"];


                  var newdiv = document.createElement("a");

                  newdiv.classList.add("list-group-item");
                  newdiv.classList.add("list-group-item-action");
                  newdiv.classList.add("list-group-item-light");
                  newdiv.appendChild(document.createTextNode((i+1)+". "+myObj[i]["FNAME"]+" "+myObj[i]["LNAME"]));
                  
                //message button start
                  var msgbtndiv = document.createElement("a");

                  msgbtndiv.classList.add("btn");
                  msgbtndiv.classList.add("btn-outline-primary");

                  var style = document.createAttribute("style");
                  style.value = "float : right; margin-right: 5px;";

                  msgbtndiv.setAttributeNode(style);

                  var onclick = document.createAttribute("onclick");
                  onclick.value = "new_contact_to_chat(" + "\"" + UID + "\"" +",\""+ UserName +"\");";

                  var icon=document.createElement("i");
                  icon.classList.add("fas","fa-paper-plane");

                  msgbtndiv.setAttributeNode(onclick);
                  msgbtndiv.appendChild(icon);
                 //end

                 //Unfriend btn start
                  var unFriendbtndiv = document.createElement("a");

                  unFriendbtndiv.classList.add("btn");
                  unFriendbtndiv.classList.add("btn-outline-danger");

                  var onclick = document.createAttribute("onclick");
                  onclick.value = "remove_from_friendlist(" + "\"" + UID + "\");";
                  var style = document.createAttribute("style");
                  style.value = "float : right; ";

                  unFriendbtndiv.setAttributeNode(style);
                  unFriendbtndiv.setAttributeNode(onclick);
                  unFriendbtndiv.appendChild(document.createTextNode("unfriend"));
                  //end

                  var style = document.createAttribute("style");
                  style.value = "margin-bottom : 5px;";
                  
                  var data_UId = document.createAttribute("UserId");
                  data_UId.value = UID; 
                  var data_UName = document.createAttribute("UserName");
                  data_UName.value = UserName; 
                  
                  newdiv.setAttributeNode(style);
                  newdiv.setAttributeNode(data_UId);
                  newdiv.setAttributeNode(data_UName);

                  newdiv.appendChild(unFriendbtndiv);
                  newdiv.appendChild(msgbtndiv);

                  frienddiv.appendChild(newdiv);

                  if(titleFrnCount < 1){

                    friendtitle.append(document.createTextNode("Your friends:"));
                    titleFrnCount += 1;
                  }


                }
                else{

                  //not friendlist for search

                  
                   //creating a group div
                  var newdiv = document.createElement("a");


                  newdiv.classList.add("list-group-item");
                  newdiv.classList.add("list-group-item-action");
                  newdiv.classList.add("list-group-item-light");
                  
                  newdiv.appendChild(document.createTextNode((i+1)+". "+myObj[i]["FNAME"]+" "+myObj[i]["LNAME"]));

                  //button anchor start
                  var btndiv = document.createElement("a");

                  btndiv.classList.add("btn");
                  btndiv.classList.add("btn-outline-success");

                  var style = document.createAttribute("style");
                  style.value = "float : right; ";

                  btndiv.setAttributeNode(style);

                  btndiv.appendChild(document.createTextNode("Add Friend"));

                  var onclick = document.createAttribute("onclick");
                  onclick.value = "AddFriendClicked("+myObj[i]["UserID"]+","+"'"+myObj[i]["FNAME"]+" "+myObj[i]["LNAME"]+"');";

                  // "AddFriendClicked("+6+","+"'"+asd+" "+asd+"');"
                  btndiv.setAttributeNode(onclick);

                  //end

                  var style = document.createAttribute("style");
                  style.value = "margin-bottom : 5px; ";
                  
                  newdiv.setAttributeNode(style);
                  newdiv.appendChild(btndiv);

                  unknowndiv.appendChild(newdiv);

                    if(titleUnkCount < 1){

                      nfriendtitle.append(document.createTextNode("You can be friends with :"));
                      titleUnkCount += 1;
                    }
                }

                   

                  // var newdiv = document.createElement("DIV");
                  // var newnextdiv = document.createElement("DIV");
                  // var newSpan = document.createElement("SPAN");

                  // newnextdiv.classList.add('mess');
                  // if (myObj[i]["MFROMME"]==1){
                  //     newdiv.classList.add('chatSender');
                  //     newSpan.classList.add('SenderMsg');
                  // }else {
                  //     newdiv.classList.add('chatReciever');
                  //     newSpan.classList.add('RecieverMsg');
                  // }
                  // newSpan.appendChild(document.createTextNode());
                  // newnextdiv.appendChild(newSpan);
                  // newdiv.appendChild(newnextdiv);
                  // var conversation = document.getElementById("conversation");
                  // conversation.appendChild(newdiv);
                  // conversation.scrollTop = conversation.scrollHeight - conversation.clientHeight;        
                  c+=1;    
              } 
                  searchList.appendChild (frienddiv);
                  searchList.appendChild (unknowndiv);


              //alert(c);
         }

    };

    var searchVal = document.getElementById("search").value;

    var modal = $(this)

    xmlhttp.open("GET", "?req=1&Requests=SearchFriend&searchval="+searchVal, true);
    xmlhttp.send();
  })


  //enter to search



  // document.getElementsByClassName("collapse show")[0].style.color="#6c757d";

  function addFriend(){
    if (!xmlhttp){
      xmlhttp = XMLReq();
    }


    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var userid = this.responseText;
            //alert(userid);
        if (userid>0){

            addFriend(userid);

          }else if (userid==-15){
            alert ("Error : No such User found");
          }
       }
    };

    var Username = document.getElementById("Username").value;
    // alert(Username);
    xmlhttp.open("GET", "?req=1&Requests=addFriend&Username="+Username, true);
    xmlhttp.send();
  }

  function addFriend(FriendID){
    var friendID = FriendID;

     if (!xmlhttp){
      xmlhttp = XMLReq();
    }


    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText);

       }
    };
     alert("addFriend"+FriendID);
    xmlhttp.open("GET", "?req=1&Requests=addFriend&friendID="+friendID, true);
    xmlhttp.send();
  }

  function AddFriendClicked(UserID, Username){
    
    ajax = XMLReq();

    ajax.onreadystatechange = function()
    {
      if (this.readyState == 4 && this.status == 200)
      {
        new_contact_to_chat(UserID,Username);

        document.getElementById('current_recept').getAttributeNode('style').value = "background-color: white; color : #007bff ; text-align: center; font-weight: bold;"
        $('#searchModal').modal('hide');
        $('#friendAdded').modal('show');
        setTimeout(function() {$('#friendAdded').modal('hide');}, 3000);
       
      }
    }

    ajax.open("GET", "?req=1&Requests=AddFriendClicked&UserID="+UserID, true);
    ajax.send();
  }



$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});


</script> 

<script type="text/javascript">
  document.addEventListener('keydown', function(event) {
    if ( event.code == 'KeyO' && (event.shiftKey || event.capsKey)){

      var option_button = document.getElementById("Option_button");
      option_button.click();
    }
    if ( event.code == 'KeyS' && (event.shiftKey)) {

      var option_button = document.getElementById("searchButton");
      option_button.click();
    }
    if ( event.code == 'KeyL' && (event.shiftKey)) {

      var option_button = document.getElementById("logoutButton");
      option_button.click();
    }
  
  })


var search_input = document.getElementById("search");
search_input.addEventListener("keyup",function(event){
  if (event.keyCode === 13){
    event.preventDefault();
    document.getElementById("searchButton").click();
  }
});

document.getElementById("search").addEventListener('keydown', function(event){
  if (event.keyCode === 13){
    event.preventDefault();
    $('#searchModal').modal('show');


  }
  
  });

/*Upload Avatar fun*/
function uploadAvatar(){

        var xmlhttp1 = XMLReq();

        xmlhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                alert (this.responseText);

                setTimeout(function() {$('#avatarUploadModal').modal('hide');}, 1000);
             }
        };

        var form = document.getElementById("data_file_avatar");
        // form.submit()

        //document.getElementById("UserId_File").value = document.getElementById("UserId").value
        var formData = new FormData(form);
        xmlhttp1.open("POST", "", true);
        xmlhttp1.send(formData); 
        //uploadAvatarProgression();       
        return false;
    }
/*END Upload avatar fun*/
</script>

<script language=”JavaScript”> 
  $('.popover-dismiss').popover({
  trigger: 'focus'
})
</script>
<!--
<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>-->