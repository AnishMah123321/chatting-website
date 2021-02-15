

<style type="text/css">
    .messages{
        margin-bottom: 20px;
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
        margin: 2px;
        border-radius: 10px;
    }
    .chatReciever >.mess{
        max-width: 55%;
        clear: left;
        float: left;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 0.2); 
        margin: 2px;  
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
        width: 95%;
        position: absolute;
        min-height: 80%;
    }

</style>

    <div class="d-flex flex-row d-flex justify-content-center">
        <div class="card-group">

                <div class="card col-md-3 text-center">
                    <div class="card-header" style="background-color: white; text-align: center; font-weight: bold;">
                        Recents
                    </div>
                    <div class="card-body">
                        <div class="list-group" id="LatestMessegerDIV" latestContact = "">

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
                                   echo "<a href=\"#\" onclick=\"contact_choose(this);\" UserId=\"".$ID."\" class=\"list-group-item list-group-item-action RecentContacts\" UserName= \"".$FNAME." ".$LNAME."\"><img src=\"../images/img.jpg\" class=\"mr-3 mt-3 rounded-circle\" style=\"width:45px; float:left;\">".$FNAME." ".$LNAME." </a> " ;
                               }
                               
                               $tabledata = $database->database()->exec("DROP TABLE MYLATESTMESSENGERS;");
                               //$database->database()->($SQL);
                           ?>
                           <input type="hidden" id="CurrTopMsgDateTime" value='<?php
                                $sql="select LOCALTIMESTAMP as TS;";
                                $data = $database->database()->query($sql);
                                foreach ($data as $d){
                                    echo $d["TS"];
                                }
                            ?>'/>
                        </div>

                    </div>
                </div>

                <div class="card col-md-6 text-center">
                    
                    <div class="card-header" id="current_recept" style="background-color: white; text-align: center; font-weight: bold;">
                            Converstation
                    </div>
                    <div class="card-body">

                            <form class="form-horizontal login_board" role="form" method="get" action="" >
                                <input type="hidden" name="req" value="1">
                                <input type="hidden" name="UserId" value="0" id="UserId"> 
                                <input type="hidden" name="MessageCursor" value="0" id= "MessageCursor">
                                <br><br><br>
                                <div class="list-group" id="conversation" speech_toggle="false" speech_play="false"style="position:absolute;top:10px;margin-top:40px;  width:95%; height: 75%;                 overflow-y:scroll;">
                                </div>
<!--                 
                                <div class="input-group" style="position: absolute; bottom: 0px; width: 90%;">
                                  <!--   <textarea name="Message" id="speech" class="form-control" style="margin-bottom: 5px; max-height: 50px; min-height: 50px;" placeholder="Type your message here for speech"></textarea> 
                                    <span class="btn btn-default" style="padding-left: 5px;" onclick="speech();">speak</span> --
                                    <textarea name="Message" id="Message" class="form-control" style="margin-bottom: 5px; max-height: 50px; min-height: 50px;" placeholder="Type your message here"></textarea>
                                    <span class="input-group-addon" style="padding-left: 5px;"><input type="button" id="Sender" class="btn btn-default glyphicon " value="&#xe144;" style=""></span>
                                    <FORM method="post" action="index.php" enctype="multipart/form-data">
                                        <input type="file" name="file"><br><br>
                                        <input type="hidden" name="isfile" value="1">
                                        <input type="submit" value="submit">
                                    </FORM>
                                    <span class="input-group-addon" style="padding-left: 5px;"><input type="button" id="FileSender" class="btn btn-default glyphicon " value="&#xe155;" style=""></span>                                      
                                                    <!--<input type="text" class="form-control" placeholder="Type your message here">--
                                </div> -->
                            <div class="input-group" style="position: absolute; bottom: 0px; width: 90%;">

                                    <textarea name="Message" id="Message" class="form-control" style="margin-bottom: 5px; max-height: 50px; min-height: 50px;" placeholder="Type your message here"></textarea>

                                    <span class = "btn btn-light" id="Sender" data-toggle="tooltip" data-placement="left" title="send a message" style="font-size: 25px; margin-left: 10px; color: Dodgerblue;" >
                                      <i class="fas fa-paper-plane"></i>
                                    </span>
                                    <span class = "btn btn-light" id="fileSend" data-toggle="modal" data-target="#fileUploadModal" title="send a file" style="font-size: 25px; margin-left: 10px; color: Dodgerblue;">
                                        <i class="fas fa-file-upload"></i>
                                    </span>


                                    <span class = "btn btn-light" id="imageSend" data-toggle="tooltip" data-placement="right" title="send an image" style="font-size: 25px; margin-left: 10px; color: Dodgerblue;" onclick="sendImage()">
                                      <i class="fas fa-image"></i>
                                    </span>



<!--                                                     
                                    
                                    <span class="input-group-addon" style="padding-left: 5px;"><input type="button" id="Sender" class="btn              btn-default glyphicon" value="&#xe144;" style=""></span> -->
                                                    <!--<input type="text" class="form-control" placeholder="Type your message here">-->
                                </div>
                            </form>

                                    <div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="fileUploadModalLabel" aria-hidden = "true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="fileUploadModalLabel">Upload</h5>
                                          </div>
                                          <div class="modal-body">

                                            <form method="POST" id="data_file" action ="" enctype="multipart/form-data">
                                                <input type="hidden" value="data_file" name="<?php echo ini_get('session.upload_progress.name'); ?>" />
                                                <input type="hidden" name="UserId" value="0" id="UserId_File"> 
                                                <input type="file" name="file" name="fileToUpload">
                                                <input type="hidden" name="isfile" value="1">
                                                <!-- <input type="submit" value="Upload file" onclick="sendFile()" name="submit "> -->
                                              <!--   <button onclick="sendFile();">Submit</button> -->
-->                                            
                                                <input type="hidden" name="req" value="1" id="req"/>
                                                <input type="hidden" name="Requests" value="sendFile" id="Requests"/><input type='submit' value='Submit' onclick='return sendFile();'>
                                            </form>
                                                                      <iframe id="hidden_iframe" name="hidden_iframe" src="about:blank" style="display: none;"></iframe>
                                          </div>
                                        </div>
                                       </div>
                                     </div>                        
                    </div>
                </div>
                <div class="card col-md-3">
                    <div class="card-header" style="background-color: white; text-align: center; font-weight: bold;">
                    Options
                    </div>
                    <div class="card-body">

                        <div class="accordion" id="accordionExample">
                            <div class="list-group ">
                                <div class="options">
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Starred friend names<i class="fas fa-angle-right" style="padding-left: 5px;"></i></a>
                                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="list-group list-group-flush">
                                            <?php
                                                $cursor = 0;
                                                    $SQL = "SELECT `stared`.`ToStar`,(SELECT CONCAT(`users`.`FName`,' ',`users`.`LName`) FROM `users` WHERE `users`.`ID`=`stared`.`ToStar`) AS StaredFriendName FROM `stared` WHERE  `FromStar` = ".$MyID." && `ID`>".$cursor." ORDER BY StaredFriendName ASC;";
                                                        //SELECT MessageFrom, MessageTo FROM `messageregister` INNER JOIN `users` ON `messageregister`.`MessageFrom`= `users`.`ID` || `messageregister`.`MessageTo` = `users`.`ID` WHERE MessageFrom='".$MyID."' || MessageTo='".$MyID."' ORDER BY `messageregister`.`Date` ASC";
                                                        //$database->Database()->query($SQL);MYLATESTMESSENGERS
                                                        //$database->database()->exec($SQL);
                                                        //$SQL = "SELECT * FROM MYLATESTMESSENGERS;";
                                                        $tabledata = $database->database()->query($SQL);
                                                        foreach ($tabledata as $row){
                                                        $ID = $row['TOSTAR'];
                                                        $NAME=$row['STAREDFRIENDNAME'];
                                                        echo "<a href=\"#\" onclick=\"contact_choose(this);\" UserId=\"".$ID."\" class=\"btn list-group-item list-group-item-action \">".$NAME."</a>";
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
    </div>



<input type="hidden" id="NowLatitude"><input type="hidden" id="NowLongitude">



<script type="text/javascript">


    /*
    $(document).ready(function(){
        ('[data-toggle="popover"]').popover();   
    });
    */

    //$("[data-toggle=popover]").popover({html: true});
/*
     $('[data-toggle="popover"]').popover({
    alert( "POPOVER AAAAAA");
      html: true,
      trigger: 'click',
      placement: 'bottom',
      content: function () { return '<a href="example.com" />;' }
    });*/

/*    $(function () {
        $('[data-toggle="popover"]').popover()
    })*/

    //problem, not initialized when page created?
    $('[data-toggle="popover"]').popover();

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

        CID.classList.add("active");
    }
    function new_contact_to_chat(CID){
        document.getElementById("MessageCursor").value = 0;
        document.getElementById("UserId").value = CID.getAttribute("UserId");
        document.getElementById("current_recept").innerHTML = CID.getAttribute("UserName");

        document.getElementById("conversation").innerHTML="";

        alert(CID.getAttribute("UserId")+" "+CID.getAttribute("UserName"));
    }
    function staring_choose(SID){
    	var UID;
    	UID=SID.getAttribute("UserId");

        if (!xmlhttp){
            xmlhttp = XMLReq();
        }

        xmlhttp.open("GET", "?req=1&Requests=addFriend&friendUser="+UID, true);

        xmlhttp.send();
    
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
                    // alert(this.responseText);
                    var myObj = JSON.parse(this.responseText);

                    if(document.getElementById("conversation").getAttributeNode("speech_toggle").value == "true" && document.getElementById("MessageCursor").value !=myObj.CURSOR){
                        document.getElementById("conversation").getAttributeNode("speech_play").value = "true";
                    }else{
                        document.getElementById("conversation").getAttributeNode("speech_play").value = "false";
                    }

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

    setInterval(function(){
        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // alert(this.responseText);
                var respObj = JSON.parse(this.responseText);
                var length = Object.keys(respObj).length;
                $new_curr_date = respObj[length-1]["CurrTopMsgDateTime"];
                document.getElementById("CurrTopMsgDateTime").value = $new_curr_date;
                for (var i = 0; i <length-1; i++) {
                    var id = respObj[i]["ID"];
                    var fname = respObj[i]["FName"];
                    var lname = respObj[i]["LName"];
                    var newItem = document.createElement("a");
                    var attrib = document.createAttribute("onclick");
                    attrib.value = "contact_choose(this);";
                    newItem.setAttributeNode(attrib);
                    attrib = document.createAttribute("UserId");
                    attrib.value = id;
                    newItem.setAttributeNode(attrib);
                    attrib = document.createAttribute("UserName");
                    attrib.value = respObj[i]["FName"]+" "+respObj[i]["LName"];
                    newItem.setAttributeNode(attrib);
                    newItem.classList.add("list-group-item");
                    newItem.classList.add("list-group-item-action");
                    newItem.classList.add("RecentContacts");
                    var newItem1 = document.createElement("img");
                    attrib = document.createAttribute("src");
                    attrib.value = "../images/img.jpg";
                    newItem1.setAttributeNode(attrib);
                    attrib = document.createAttribute("style");
                    attrib.value = "width:45px; float:left;";
                    newItem1.setAttributeNode(attrib);
                    newItem1.classList.add("mr-3");
                    newItem1.classList.add("mt-3");
                    newItem1.classList.add("rounded-circle");
                    newItem.appendChild(newItem1);
                    newItem.appendChild(document.createTextNode(fname+" "+lname));
                    var list = document.getElementById("LatestMessegerDIV");
                    var RecentContacts = document.getElementsByClassName("RecentContacts");

                    for(var j=0;j<RecentContacts.length;j++){
                        if(RecentContacts[j].getAttribute("UserId")==id){
                            RecentContacts[j].remove();
                        }
                    }
                    list.insertBefore(newItem, list.childNodes[0]);

                }

                document.getElementById("LatestMessegerDIV").getAttributeNode("latestContact").value = respObj[0]["FName"]+" "+respObj[0]["LName"];
            }
        }
        var CurrTopMsgDateTime = document.getElementById("CurrTopMsgDateTime");

        xmlhttp.open("GET", "?req=1&Requests=UpdateLatestMessager&CurrTopMsgDateTime="+CurrTopMsgDateTime.value, true);
        xmlhttp.send();
    },2000);
    // <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
    
    function PutMessages(myObj){

       

        var Length = Object.keys(myObj).length;

        // alert(myObj[0]["MESSAGES"]);

        for (var i=0;i<Length-1; i++)
        {
            var newdiv = document.createElement("DIV");
            var newnextdiv = document.createElement("DIV");
            var newSpan = document.createElement("div");


            newSpan.classList.add('btn');
            newSpan.classList.add('btn-default');

            newnextdiv.classList.add('mess');

            var messageID = document.createAttribute('messageID');
            messageID.value = myObj[i]["ID"];

            newSpan.setAttributeNode(messageID);

            if (myObj[i]["MFROMME"]==1){

                newdiv.classList.add('chatSender');
                newSpan.classList.add('SenderMsg');

                var data_toggle = document.createAttribute('data-toggle');
                var href = document.createAttribute('href');
                var data_content = document.createAttribute('data-content');
                var title = document.createAttribute('title');
                var data_placement = document.createAttribute('data-placement');
                var data_html = document.createAttribute('data-html');

            /*    var onclick = document.createAttribute('onclick');
                onclick.value = "deleteMessage(this)";
                var delete_obj = document.createElement('div');
                delete_obj.setAttributeNode(onclick);
            */


                data_toggle.value = "popover";
                href.value = "#";
                data_content.value = "<div class='btn' onclick='deleteMessage(" + myObj[i]["ID"] + ")'>Delete Message</div>";
                
                title.value = "POPOVER HEADER";
                data_html.value = "true";
                
               
                data_placement.value = "top";

                newSpan.setAttributeNode(data_toggle);
                newSpan.setAttributeNode(data_content);
                newSpan.setAttributeNode(title);
                //newSpan.setAttributeNode(onclick)
                newSpan.setAttributeNode(data_placement);
                newSpan.setAttributeNode(data_html);
                // //
                // var onclick_attrib = document.createAttribute('onclick');
                // onclick_attrib.value = "callback_func()";
                // newSpan.setAttributeNode(onclick_attrib);
                //

            }else {
                if(document.getElementById("conversation").getAttributeNode("speech_play").value == "true"){
                    TextToSpeech(myObj[i]["MESSAGES"]);
                }
                newdiv.classList.add('chatReciever');
                newSpan.classList.add('RecieverMsg');
            }

            if(myObj[i]["DeleteStatus"] == 1){
                disabled = document.createAttribute("disabled");
                disabled.value = "true";
                style = document.createAttribute("style");
                style.value = "background-color: grey; pointer-events: none;"

               newSpan.setAttributeNode(disabled);
                newSpan.setAttributeNode(style);
            }
            if(myObj[i]["Message_Type"]=="T"){
                newSpan.appendChild(document.createTextNode(myObj[i]["MESSAGES"]));
            }else if(myObj[i]["Message_Type"]=="I"){
                var img = document.createElement("img");
                var src_attrib = document.createAttribute("src");
                img.setAttributeNode(src_attrib);
                src_attrib.value = myObj[i]["MESSAGES"];
                img.classList.add("img-thumbnail");
                img.classList.add("rounded");
                img.classList.add("mx-auto");
                img.classList.add("d-block");
                newSpan.appendChild(img);
            }else if(myObj[i]["Message_Type"]=="F"){
                var img = document.createElement("a");
                var src_attrib = document.createAttribute("href");
                img.setAttributeNode(src_attrib);
                src_attrib.value = myObj[i]["MESSAGES"];
                var style = document.createAttribute("style");
                style.value = "color : white";
                img.setAttributeNode(style);
                var text = myObj[i]["MESSAGES"];
/*                var text_position = /\//.exec(text).index;
                text = text.substring(text_position+10, text.length)*/
                img.appendChild(document.createTextNode("File "+text));
                newSpan.appendChild(img);
            }
            newnextdiv.appendChild(newSpan);
            newdiv.appendChild(newnextdiv);
            var conversation = document.getElementById("conversation");
            conversation.appendChild(newdiv);
            conversation.scrollTop = conversation.scrollHeight - conversation.clientHeight;            
        } 



        $('[data-toggle="popover"]').popover();       
    }

    document.getElementById("Sender").addEventListener("click",function(e){
        var to = document.getElementById("UserId").value;
        var Message = document.getElementById("Message").value;  
        $Sender=document.getElementById("Sender");

        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $inputArray = this.responseText;
                alert($inputArray);
                if ($inputArray==1){
                    console.log("Message Sent");
                    document.getElementById("Message").value="";
                }else if ($inputArray==-10)
                    alert ("Error");
             }
        };

        /*var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;*/
        xmlhttp.open("GET", "?req=1&Requests=SendMessage&UserId="+to+"&Messages="+Message+"&Latitude="+document.getElementById("NowLatitude").value+"&Longitude="+document.getElementById("NowLongitude").value, true);

        xmlhttp.send();
/*                xmlhttp.open("GET", "?req=1&Requests=try&UserId=123234234234", true);
        xmlhttp.send();*/

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

    function deleteMessage(messageID){

        if (!xmlhttp){
            xmlhttp = XMLReq();
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                alert (this.responseText);

/*                if (this.responseText){
                    console.log("Message Sent");
                    document.getElementById("Message").value="";
                }else if ($inputArray==-10){
                    alert ("Error");
                }*/
             }
        };

        //REMOVE CHILDREN NODES FROM DELETE_MSG_ID to CURSOR
        //REFRESH MESSAGES FROM THE DELETED ONE TO THE ONES DOWN
        var startID = messageID;
        var stopID = parseInt(document.getElementById("MessageCursor").value);

        var children = document.getElementById("conversation").children;
        for (var i = 0; i < children.length; i++) {
            var current_child_div = children[i]; //charReceiver div or chatSender div
            var internal_div = current_child_div.children[0];
            var span = internal_div.children[0];

            if (parseInt(span.getAttribute("messageid")) >= startID) {
                document.getElementById("conversation").removeChild(current_child_div);
            }
 
        }

        document.getElementById("MessageCursor").value = startID;

        //getting NULL
        alert("DELETING MESSAGE " + messageID);

        xmlhttp.open("GET", "?req=1&Requests=deleteMessage&messageId="+messageID, true);
        xmlhttp.send();
        alert("ECHO SENT");



    }
    
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
    });

document.addEventListener('keydown', function(event) {
  if (event.code == 'KeyF' && (event.shiftKey || event.capsKey)) {
    if(document.getElementById("conversation").getAttributeNode("speech_toggle").value =="true"){
            document.getElementById("conversation").getAttributeNode("speech_toggle").value ="false";
            TextToSpeechActivated("Text to speech has been deactivated");
    }
    else{
        document.getElementById("conversation").getAttributeNode("speech_toggle").value ="true";
        TextToSpeechActivated("Text to speech has been activated");

    }
  }

});


    function TextToSpeech(text){
        if('speechSynthesis' in window){

            var msg = new SpeechSynthesisUtterance();
            var voices = window.speechSynthesis.getVoices();
            msg.voice = voices[1]; // Note: some voices don't support altering params
            msg.voiceURI = 'native';
            msg.volume = 1; // 0 to 1
            msg.rate = 1; // 0.1 to 10
            msg.pitch = 2; //0 to 2
            msg.text = "Your new message is: "+text;
            msg.lang = 'en-US';

            speechSynthesis.speak(msg);

        }
        else{
            alert("No Speech to Text available in browser.")
        }

    }
    function TextToSpeechActivated(text){
        if('speechSynthesis' in window){

            var msg = new SpeechSynthesisUtterance();
            var voices = window.speechSynthesis.getVoices();
            msg.voice = voices[1]; // Note: some voices don't support altering params
            msg.voiceURI = 'native';
            msg.volume = 1; // 0 to 1
            msg.rate = 1; // 0.1 to 10
            msg.pitch = 2; //0 to 2
            msg.text = text;

            msg.lang = 'en-US';

            speechSynthesis.speak(msg);

        }
        else{
            alert("No Speech to Text available in browser.")
        }

    }

    function latestMsgSpeech(){
        if('speechSynthesis' in window){

            var msg = new SpeechSynthesisUtterance();
            var voices = window.speechSynthesis.getVoices();
            msg.voice = voices[1]; // Note: some voices don't support altering params
            msg.voiceURI = 'native';
            msg.volume = 1; // 0 to 1
            msg.rate = 1; // 0.1 to 10
            msg.pitch = 2; //0 to 2
            msg.text = "Your new message is: "+text;
            msg.lang = 'en-US';

            speechSynthesis.speak(msg);

        }
        else{
            alert("No Speech to Text available in browser.")
        }
    }
    function sendFile(){

        var xmlhttp1 = XMLReq();

        xmlhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                alert (this.responseText);
             }
        };
        var form = document.getElementById("data_file");
        // form.submit()

        document.getElementById("UserId_File").value = document.getElementById("UserId").value
        var formData = new FormData(form);
        xmlhttp1.open("POST", "", true);
        xmlhttp1.send(formData); 
        //sendFileProgression();       
        return false;
    }
    function sendFileProgression(){
        var xmlhttp2="";
        if (!xmlhttp2){
            xmlhttp2 = XMLReq();
        }
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Progreesion is "+this.responseText);
                setInterval(function(){sendFileProgression();},500);
             }
        };
        xmlhttp2.open("GET", "?req=1&Requests=sendFileProgression", true);
        xmlhttp2.send(); 
    }
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
