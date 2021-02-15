

<style type="text/css">

    .messages{
        margin-bottom: 15px;
        position: relative;   
        min-height: 20px;
        width:100%;
        display: inline-block; 
    }

    .chatSender{
        margin-right:15px; 
        text-align: right;
        word-wrap: break-word;
    }
    .chatReciever{
        margin-left: 15px;
        text-align: left;
        word-wrap: break-word;
    }

    .chatSender >.mess{
        max-width: 55%;
        clear: right;
        float: right;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 1);    
        padding: 5px;   
        border-radius: 10px;
    }
    .chatReciever >.mess{
        max-width: 55%;
        clear: left;
        float: left;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 0.2); 
        padding: 5px;   
        border-radius: 10px;
    }
    .RecieverMsg{
        word-wrap: break-word;
        color:black;
    }
    .SenderMsg{
        word-wrap: break-word;
        color:white;
    }




    #oncolor{
        color:green;
    }



    #offcolor{
        color:red;
    }

    .row{
        max-width: 100%;
        height: 100%;
    }

    .card-group{
        margin-top: 1%;
        margin-left: 4%;
        width: 95%;
        position: absolute;
        min-height: 80%;
    }

</style>

    <div class="row">
        <div class="card-group">
            <div class="card col-md-3 text-center shadow p-3 mb-5 bg-white rounded">
                <div class="card-header" style="background-color: white; text-align: center; font-weight: bold;">
                    Recents
                </div>
              <div class="card-body">
                <div class="list-group" id="LatestMessegerDIV">
                    <?php
                        $SQL = "SET @p0='".$MyID."'; CALL `LatestMesseger`(@p0);";
                        //SELECT MessageFrom, MessageTo FROM `messageregister` INNER JOIN `users` ON `messageregister`.`MessageFrom`= `users`.`ID` || `messageregister`.`MessageTo` = `users`.`ID` WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER BY `messageregister`.`Date` ASC";
                        //$database->Database()->query($SQL);MYLATESTMESSENGERS
                        $database->database()->exec($SQL);
                        $SQL = "SELECT DISTINCT * FROM MYLATESTMESSENGERS;";
                        $tabledata = $database->database()->query($SQL);
                        foreach ($tabledata as $row){
                            $ID = $row['USERID'];
                            $FNAME=$row['FNAME'];
                            $LNAME=$row['LNAME'];
                            echo "<a href=\"#\" onclick=\"contact_choose(this);\" UserId=\"".$ID."\" class=\"list-group-item list-group-item-action \">".$FNAME." ".$LNAME." <span class=\"input-group-addon\"><input type=\"button\" id=\"staring\" onclick=\"staring_choose(this);\" UserId=\"".$ID."\" class=\"btn btn-default glyphicon\" value=\"&#xe006;\" style=\"float:right;\"></span></a> " ;
                        }
                    
                    $tabledata = $database->database()->exec("DROP TABLE MYLATESTMESSENGERS;");
                    //$database->database()->($SQL);
                    ?>
                </div>
              </div>
            </div>
            <div class="card col-md-6 text-center shadow p-3 mb-5 bg-white rounded">
                <div class="card-header" id="current_recept" style="background-color: white; text-align: center; font-weight: bold;">
                    Coverstation
                </div>                
              <div class="card-body">
                <div style="padding-top: 50%;">
                <form class="form-horizontal login_board" role="form" method="get" action="">
                    <input type="hidden" name="req" value="1">
                    <input type="hidden" name="UserId" value="0" id="UserId"> 
                    <input type="hidden" name="MessageCursor" value="0" id= "MessageCursor">
                    <br><br><br>
                    <div class="list-group" id="conversation" style="position:absolute;top:10px; margin-top:40px;  width:94%; height: 75%; overflow-y:scroll;">
                    </div>

                    <div class="input-group" style="position: absolute; bottom: 0px; width: 90%;">
                                    
                        <textarea name="Message" id="Message" class="form-control" style="margin-bottom: 5px;" placeholder="Type your message here"></textarea>
                        <span class="input-group-addon" style="padding-left: 5px;"><input type="button" id="Sender" class="btn btn-default glyphicon" value="&#xe144;" style=""></span>
                                    <!--<input type="text" class="form-control" placeholder="Type your message here">-->
                    </div>
                </form>
            </div>
              </div>
            </div>
            <div class="card col-md-3 shadow p-3 mb-5 bg-white rounded">
                <div class="card-header" style="background-color: white; text-align: center; font-weight: bold;">
                    Details
                </div>                
              <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="list-group list-group-flush">
                        <div class="options">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >Starred friend name</a>
                            
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="list-group">
                                     <?php
                                         $cursor = 0;
                                         $SQL = "SELECT `stared`.`ToStar`,(SELECT CONCAT(`users`.`FName`,' ',`users`.`LName`) FROM `users` WHERE `users`.`ID`=`                 stared`.`ToStar`) AS StaredFriendName FROM `stared` WHERE  `FromStar` = ".$MyID." && `ID`>".$cursor." ORDER BY              StaredFriendName ASC;";
                                         //SELECT MessageFrom, MessageTo FROM `messageregister` INNER JOIN `users` ON `messageregister`.`MessageFrom`=                  `users`.`ID` || `messageregister`.`MessageTo` = `users`.`ID` WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER               BY `messageregister`.`Date` ASC";
                                         //$database->Database()->query($SQL);MYLATESTMESSENGERS
                                         //$database->database()->exec($SQL);
                                         //$SQL = "SELECT * FROM MYLATESTMESSENGERS;";
                                         $tabledata = $database->database()->query($SQL);
                                         foreach ($tabledata as $row){
                                             $ID = $row['TOSTAR'];
                                             $NAME=$row['STAREDFRIENDNAME'];
                                             echo "<a href=\"#\" onclick=\"contact_choose(this);\" UserId=\"".$ID."\" class=\"list-group-item                   list-group-item-action \">".$NAME."</a>";
                                         }
                                     
                                         //$tabledata = $database->database()->exec("DROP TABLE IF EXISTS MYLATESTMESSENGERS;");
                                         //$database->database()->($SQL);
                                     ?>
                                 </div> 
                            </div>
                        </div>
                        <div class="Files Shared">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >Files Shared</a>
                            
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf mooneiusmod. Brunch 3.</p>
                            </div>
                        </div>
                        <div class="Photos Shared">
                            <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" >Photos Shared</a>
                            
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat                   skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3.</p>
                            </div>
                        </div>
                    </div>
                </div>  
              </div>
            </div>
        </div>
                  
<!--         <div class="col-md-3" id=" Messages">
            <div class="panel panel-default ">
                <div class="panel-heading"><h4><b>CONTACTS</b></h4></div>
                        ul class="list-group">
                

            </div>
        </div>


                <div class="col-md-6" style="border-style: groove;">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="current_recept"><h4><b>CONVERSATION</b></h4></div>
                        <div style="padding-top: 50%;">

                            </div>
                    </div>
                </div>
                <div class="col-md-3" style="    border-style: groove;">
                    <div class="panel panel-default ">
                        <div class="panel-heading"><h4><b>Favorites</b></h4></div>
                        <ul class="list-group">



                    </div>
                </div> -->
                
    </div>

<input type="hidden" id="NowLatitude"><input type="hidden" id="NowLongitude">



    <script type="text/javascript">
    $("#conversation").fadeIn(3000);
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
    XMLReq();
    function contact_choose(CID){
        
        document.getElementById("MessageCursor").value = 0;
        document.getElementById("UserId").value = CID.getAttribute("UserId");
        document.getElementById("current_recept").innerHTML = CID.getAttribute("UserName");

        document.getElementById("conversation").innerHTML="";
    }

    function staring_choose(SID){
    	var UID;
    	UID=SID.getAttribute("UserId");
    
    }
    var scrolled = false;
    function updateScroll(){
        if(!scrolled){
            var element = document.getElementById("conversation");
            //element.scrollTop = element.scrollHeight;
            var isScrolledToBottom = element.scrollHeight - element.clientHeight <= element.scrollTop + 1;
            if(isScrolledToBottom)
                element.scrollTop = element.scrollHeight - element.clientHeight;
        }
    }
    document.getElementById("conversation").addEventListener('scroll', function(){
        scrolled=true;
    });
    setInterval(function(){
        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {   
                if (this.responseText!=-1){
                    var myObj = JSON.parse(this.responseText);
                    document.getElementById("MessageCursor").value = myObj.CURSOR; 
                    PutMessages(myObj);       
                //document.getElementById("conversation").innerHTML=this.responseText;
                               
                }else{
                    console.log("-1");
                }
                //updateScroll(document.getElementById("conversation"));
                //updateScroll();
            }
        };
        var to = document.getElementById("UserId").value;
        var cursor = document.getElementById("MessageCursor").value
        xmlhttp.open("GET", "?req=1&Requests=readmessage&UserId="+to+"&MessageCursor="+cursor, true);
        xmlhttp.send();
    },500);

    function PutMessages(myObj){
        var Length = Object.keys(myObj).length;
        for (var i=0;i<Length-1; i++)
        {
            var newdiv = document.createElement("DIV");
            var newnextdiv = document.createElement("DIV");
            var newSpan = document.createElement("SPAN");

            newnextdiv.classList.add('mess');
            if (myObj[i]["MFROMME"]==1){
                newdiv.classList.add('chatSender');
                newSpan.classList.add('SenderMsg');
            }else {
                newdiv.classList.add('chatReciever');
                newSpan.classList.add('RecieverMsg');
            }
            newSpan.appendChild(document.createTextNode(myObj[i]["MESSAGES"]));
            newnextdiv.appendChild(newSpan);
            newdiv.appendChild(newnextdiv);
            var conversation = document.getElementById("conversation");
            conversation.appendChild(newdiv);
            conversation.scrollTop = conversation.scrollHeight - conversation.clientHeight;            
        }        
    }

    document.getElementById("Sender").addEventListener("click",function(e){
        var to = document.getElementById("UserId").value;
        var Message = document.getElementById("Message").value;  
        document.getElementById("Message").value="";      
        $Sender=document.getElementById("Sender");
        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $inputArray = this.responseText;
                if ($inputArray==1){
                    console.log("Message Sent");
                    document.getElementById("Message").value="";
                }else if ($inputArray==-1)
                    alert ("Error");
             }
        };

        /*var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;*/
        xmlhttp.open("GET", "?req=1&Requests=SendMessage&UserId="+to+"&Messages="+Message+"&Latitude="+document.getElementById("NowLatitude").value+"&Longitude="+document.getElementById("NowLongitude").value, true);

        xmlhttp.send();
    });
    window.onload = function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        function showPosition(position) {
            document.getElementById("NowLatitude").value =  position.coords.latitude;
            document.getElementById("NowLongitude").value = position.coords.longitude;
        }
    };

</script><!--
<div id="map" style="width:400px;height:400px"></div><script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script type="text/javascript">
function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(51.5, -0.12),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
myMap();
</script>-->
