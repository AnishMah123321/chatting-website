

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
        padding: 5px;
    }
    .chatReciever >.mess{
        max-width: 55%;
        clear: left;
        float: left;
        word-wrap: break-word;   
        background-color:rgba(0, 100, 240, 0.2); 
        margin: 2px;  
        border-radius: 10px;
        padding : 5px;
    }
    .RecieverMsg{
        word-wrap: break-word;
        color:black;
    }
    .SenderMsg{
        word-wrap: break-word;
        color:white;
    }

    .RecieverMsg:hover
    {   
      text-decoration: none;
      color: white;
    }

    .SenderMsg:hover
    {   
      text-decoration: none;
      color: white;
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

                <div class="card col-md-3 text-center" style="overflow-y: scroll; ">
                    <div class="card-header" style="background-color: white; text-align: center; font-weight: bold; position: -webkit-sticky; position: sticky;">
                        Recents
                    </div>
                    <div class="card-body">
                        <div class="list-group" id="LatestMessegerDIV" latestContact = "" style=" position: absolute; margin-right: 5%;">

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
                                   $USERAVATAR=$row['USERAVATAR'];

                                   echo "<a href=\"#\" onclick=\"contact_choose(this);\" style=\"background-color : white\" UserId=\"".$ID."\" class=\"list-group-item list-group-item-action RecentContacts\"  Username".$ID."=\"".$FNAME." ".$LNAME."\" UserName= \"".$FNAME." ".$LNAME."\">  <img src=\"".$USERAVATAR."\" class=\"mr-3 mt-3 rounded-circle\" style=\"width:45px; height:45px; float:left;\">".$FNAME." ".$LNAME." </a> " ;
                                   
                                   
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

                            
                                <input type="hidden" name="req" value="1">
                                <input type="hidden" name="UserId" value="0" id="UserId"> 
                                <input type="hidden" name="MessageCursor" value="0" id= "MessageCursor">
                                <br><br><br>
                                <div class="list-group" id="conversation" latestMessageRecieved="" latestmessagedate="" speech_toggle="false" speech_play="false" style="position:absolute;top:10px;margin-top:40px;  width:95%; overflow-x: hidden; height: 75%; overflow-y:scroll;">
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
                                     <!-- edit on july 3 2019 -->

                                    <textarea name="Message" id="Message" class="form-control" style="margin-bottom: 5px; max-height: 50px; min-height: 50px;" placeholder="Type your message here"></textarea>

                                    <span class = "btn " href="#" id="Sender"  title="send a message" style="font-size: 25px; margin-left: 10px; color: Dodgerblue;" >
                                      <a href="#" class="fas fa-paper-plane"></a>
                                    </span>
                                    <span class = "btn " href="#" id="fileSend" data-toggle="modal" data-target="#fileUploadModal" title="send an image or a file" style="font-size: 25px; margin-left: 10px; color: Dodgerblue;">
                                        <a href="#" class="fas fa-file-upload"></a>
                                    </span>


                                     <!-- added new buttons & emoji box-->

                                    <span class = "btn " href="#" id="emojiList" data-trigger = "focus" title="Emoticons" data-toggle="popover" data-placement ="top" data-html ="true" style="font-size: 25px; margin-left: 10px; color: #FB8C00;">
                                      <a href="#">😃</a>
                                    </span>

                                    <span class = "btn " id="Option"  data-toggle="tooltip" data-original-title="options" title="<a class=&quot;fas fa-podcast&quot; title='Text to speech' href='#'onclick=&quot;changeStateTTS()&quot; style = 'font-size :25px; padding:10px; '></a><a class=&quot;fas fa-microphone-alt&quot; title='Speech to text' href='#' onclick=&quot;changeStateSTT()&quot; style = 'font-size :25px; ; padding:10px;'></a>"  data-placement="top" data-html="true" style="font-size: 25px; margin-left: 10px; color: #FB8C00;">
                                      <a href="#" class="fas fa-ellipsis-v"></a>
                                    </span>


<!--                                                     
                                    
                                    <span class="input-group-addon" style="padding-left: 5px;"><input type="button" id="Sender" class="btn              btn-default glyphicon" value="&#xe144;" style=""></span> -->
                                                    <!--<input type="text" class="form-control" placeholder="Type your message here">-->
                                </div>
                            




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
                                <div class="userInfo">
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingOne" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo">Info<i class="fas fa-angle-right" style="padding-left: 5px;"></i></a>
                                    <div id="collapseInfo" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="list-group list-group-flush" id="userInfo">

                                        </div>    
                                    </div>
                                </div>
                                <div class="filesShared">
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingTwo" data-toggle="collapse" data-target="#collapseFileShared" aria-expanded="false" aria-controls="collapseFileShared" >Files Shared</a>
                            
                                    <div id="collapseFileShared" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        
                                        <p id="fileSharedInfo">No file shared.</p>
                                        <div class="list-group list-group-flush" style = "overflow-y: scroll; max-height: 200px;" id="fileShared">
                                        </div> 
                                    </div>
                                </div>
                                <div class="photosShared">
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light" id="headingThree" data-toggle="collapse" data-target="#collapsePhotoShared" aria-expanded="false" aria-controls="collapsePhotoShared" >Photos Shared</a>
                            
                                    <div id="collapsePhotoShared" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <p id="photoSharedInfo">No photos shared.</p>
                                        <div class="sharedPhotos d-flex flex-wrap" style = "overflow-y: scroll; max-height: 200px;" id="photoShared">
                                            
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>    

                        
                    </div>

                
            </div>
        </div>        
    </div>

    <div class="modal fade" id="imageShowModal" tabindex="-1" role="dialog" aria-labelledby="imageShowModalLabel" aria-hidden = "true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageShowModalLabel">Image</h5>
          </div>
          <div class="modal-body">
            <img src="test" class="img-fluid" style="max-width: 100%; max-height: 100%;" id="imageShow"> 
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

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
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

        document.getElementById("fileShared").innerHTML="";
        document.getElementById("photoShared").innerHTML="";
        document.getElementById("fileSharedInfo").innerHTML="No file shared.";
        document.getElementById("photoSharedInfo").innerHTML="No photoshared.";    


        //for changing color of active recentlist edit on july 1st 2019
        CID.getAttributeNode("style").value = "background-color : #0062cc5e;";

        var RecentContacts = document.getElementsByClassName("RecentContacts");

        for(var i=0;i<RecentContacts.length;i++){
            if(RecentContacts[i].getAttribute("UserId")!=CID.getAttribute("UserId")){
                RecentContacts[i].getAttributeNode("style").value = "background-color : white;";
            }
        }

        //end
    }

    function new_contact_to_chat(UserID, Username){
        document.getElementById("MessageCursor").value = 0;
        document.getElementById("UserId").value = UserID;  //corrupted value suspected
        document.getElementById("current_recept").innerHTML = Username;

        document.getElementById("conversation").innerHTML="";

        //alert(UserID+" "+Username);

        $('#searchModal').modal('hide');
    }

    function remove_from_friendlist(UserID) {

        if (!xmlhttp){
            xmlhttp = XMLReq();
        }
    
        xmlhttp.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200)
          {
            $('#searchModal').modal('hide');
            $('#friendRemove').modal('show');
            setTimeout(function() {$('#friendRemove').modal('hide');}, 1000);
           
          }
        };

        xmlhttp.open("GET", "?req=1&Requests=deletefriend&UserId="+UserID, true);
        xmlhttp.send();
        
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
            element.scrollTop = element.scrollHeight;
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
                    
                    //alert(this.responseText);
                    
                    var myObj = JSON.parse(this.responseText);

                    if(document.getElementById("conversation").getAttributeNode("speech_toggle").value == "true" && (myObj.CURSOR - parseInt(document.getElementById("MessageCursor").value) <= 5)){
                        document.getElementById("conversation").getAttributeNode("speech_play").value = "true";
                    
                    }else{
                        document.getElementById("conversation").getAttributeNode("speech_play").value = "false";
                    }

                    document.getElementById("MessageCursor").value = myObj.CURSOR; 
                    PutMessages(myObj);       
                //document.getElementById("conversation").innerHTML=this.responseText;
                               
                 }
                //else{
                //     console.log("-1, no messages update.");

                // }
                updateScroll(document.getElementById("conversation"));
                
            }
        };
        var to = document.getElementById("UserId").value;
        var cursor = document.getElementById("MessageCursor").value;
        xmlhttp.open("GET", "?req=1&Requests=readmessage&UserId="+to+"&MessageCursor="+cursor, true);
        xmlhttp.send();
    },1000);

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

                    //edited on july 1st added attributes for getting value reqired for Text to speech latest msg.
                    
                    attrib = document.createAttribute("id");
                    attrib.value = "recentlist";
                    newItem.setAttributeNode(attrib);
                    attrib = document.createAttribute("username"+id);
                    attrib.value = fname+" "+lname;
                    newItem.setAttributeNode(attrib);
                    attrib = document.createAttribute("style");
                    attrib.value = "background-color :#0062cc5e ;"
                    newItem.setAttributeNode(attrib);

                    //end edit

                    newItem.classList.add("list-group-item");
                    newItem.classList.add("list-group-item-action");
                    newItem.classList.add("RecentContacts");
                    var newItem1 = document.createElement("img");
                    attrib = document.createAttribute("src");
                    attrib.value = "upload_files/avatar/User"+id+".jpg"; //change on july 3 2019
                    newItem1.setAttributeNode(attrib);
                    attrib = document.createAttribute("style");
                    attrib.value = "width:45px; height:45px; float:left;";
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
    },4000);
    // <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
    
    function PutMessages(myObj){

       

        var Length = Object.keys(myObj).length;

        var fileshared = document.getElementById("fileShared");

        var photoshared = document.getElementById("photoShared");
                        
        // alert(myObj[0]["MESSAGES"]);

        for (var i=0;i<Length-1; i++)
        {
            var newdiv = document.createElement("DIV");
            var newnextdiv = document.createElement("DIV");
            var newSpan = document.createElement("a");


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
                var data_id = document.createAttribute('id');
                // var data_trigger = document.createAttribute('data-trigger');

            /*    var onclick = document.createAttribute('onclick');
                onclick.value = "deleteMessage(this)";
                var delete_obj = document.createElement('div');
                delete_obj.setAttributeNode(onclick);
            */


                data_toggle.value = "popover";
                href.value = "#";
                data_content.value = "<div class='btn' onclick='deleteMessage(" + myObj[i]["ID"] + ")'>Delete Message</div>";
                // data_trigger.value='focus';
                data_html.value = "true";
                data_placement.value = "left";
                data_id.value = 'popoverMessage';
                title.value = "Options";

                newSpan.setAttributeNode(href);
                newSpan.setAttributeNode(data_toggle);
                newSpan.setAttributeNode(data_content);
                newSpan.setAttributeNode(title);
                newSpan.setAttributeNode(data_id)
                newSpan.setAttributeNode(data_placement);
                newSpan.setAttributeNode(data_html);

                // //
                // var onclick_attrib = document.createAttribute('onclick');
                // onclick_attrib.value = "callback_func()";
                // newSpan.setAttributeNode(onclick_attrib);
                //

            }else {

                newdiv.classList.add('chatReciever');
                newSpan.classList.add('RecieverMsg');

                
                 if(document.getElementById("conversation").getAttributeNode("speech_play").value == "true"){
                    var senderName = document.getElementById("current_recept").innerHTML;
                    
                    TextToSpeech("You have recieved message from "+senderName+" and message is "+myObj[i]["MESSAGES"]);
                 }
                //edit on july 1st 2019 for latest message & date of selected user to store in aatribute of conversation
                document.getElementById("conversation").getAttributeNode("latestMessageRecieved").value = myObj[i]["MESSAGES"];
                document.getElementById("conversation").getAttributeNode("latestmessagedate").value = myObj[i]["DATE"];

            }

            if(myObj[i]["DeleteStatus"] == 1){
                disabled = document.createAttribute("disabled");
                disabled.value = "true";
                style = document.createAttribute("style");
                style.value = "background-color: grey; pointer-events: none; max-width: 55%; word-wrap: break-word; margin: 2px; border-radius: 10px; padding : 5px;";
                newnextdiv.setAttributeNode(style);
                
                style1 = document.createAttribute('style');
                style1.value = "word-wrap: break-word; color:white;";
                newSpan.setAttributeNode(style1);
            }
            if(myObj[i]["Message_Type"]=="T"){
                newSpan.appendChild(document.createTextNode(myObj[i]["MESSAGES"]));
            }else if(myObj[i]["Message_Type"]=="I"){

                var img = document.createElement("img");
                var src_attrib = document.createAttribute("src");
                img.setAttributeNode(src_attrib);
                src_attrib.value = myObj[i]["MESSAGES"];

                var onclick = document.createAttribute("onclick");
                onclick.value = "imageShow('"+myObj[i]["MESSAGES"]+"')";

                img.setAttributeNode(onclick);
                
                img.classList.add("img-thumbnail");
                img.classList.add("rounded");
                img.classList.add("mx-auto");
                img.classList.add("d-block");
                newSpan.appendChild(img);

                //for photo shared

                        
                if(myObj[i]["MESSAGES"] != "Message is deleted."){
                    document.getElementById("photoSharedInfo").innerHTML="";
                
                    var photo = document.createElement('img');
                
                    var photo_src = document.createAttribute('src');   
                    photo_src.value = myObj[i]["MESSAGES"];
                    var photo_style = document.createAttribute('style');
                    photo_style.value = "width: 50px; height:50px; padding: 5px;";
                    var onclick = document.createAttribute('onclick');
                    onclick.value = "imageShow('"+myObj[i]["MESSAGES"]+"')";

                    photo.setAttributeNode(onclick);
                    photo.setAttributeNode(photo_src);
                    photo.setAttributeNode(photo_style);
                    photoshared.appendChild(photo);

                }
            


            }else if(myObj[i]["Message_Type"]=="F"){
                var file = document.createElement("a");
                var src_attrib = document.createAttribute("href");
                file.setAttributeNode(src_attrib);
                src_attrib.value = myObj[i]["MESSAGES"];
                var style = document.createAttribute("style");
                style.value = "color : white";
                file.setAttributeNode(style);
                var text = myObj[i]["MESSAGES"];
/*                var text_position = /\//.exec(text).index;
                text = text.substring(text_position+10, text.length)*/
                file.appendChild(document.createTextNode("File : "+text.substr(22,50)));
                newSpan.appendChild(file);


                //for files shared

                if(myObj[i]["MESSAGES"] != "Message is deleted."){
                    document.getElementById('fileSharedInfo').innerHTML ="";

                    var file_list = document.createElement('a');
                    file_list.classList.add("list-group-item");
                    var file_src = document.createAttribute('href');
                    file_src.value = myObj[i]["filename"];
                    file_list.setAttributeNode(file_src);
                    file_list.appendChild(document.createTextNode((i+1)+". "+myObj[i]["MESSAGES"].substr(22,50)));
                    fileshared.appendChild(file_list);
                                
                }


            }
            newnextdiv.appendChild(newSpan);
            newdiv.appendChild(newnextdiv);
            var conversation = document.getElementById("conversation");
            conversation.appendChild(newdiv);
            conversation.scrollTop = conversation.scrollHeight - conversation.clientHeight;            
        } 


        updateScroll();

        $("[data-toggle='popover']").popover({trigger:'hover', delay:{"show":50,"hide":800 }});      
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
                var inputArray = this.responseText;
                //alert($inputArray);

                    
                if (inputArray==1){

                    // //text to speech of the latest message sent.
                    if(document.getElementById("conversation").getAttributeNode("speech_toggle").value == "true"){

                        
                        //edit on july 1st 2019
                        TextToSpeech("You have sent a message to "+ document.getElementById("current_recept").innerHTML+" and message is " + Message );
                    }

                    console.log("Message Sent");
                    document.getElementById("Message").value = '';
                }else if (inputArray==-10)
                    alert ("Error: Message could not be sent.");
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
        // alert("DELETING MESSAGE " + messageID);

        xmlhttp.open("GET", "?req=1&Requests=deleteMessage&messageId="+messageID, true);
        xmlhttp.send();
        //alert("ECHO SENT");



    }
    
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
    });

document.addEventListener('keydown', function(event) {
  if (event.code == 'KeyF' && (event.shiftKey || event.capsKey)) {
    if(document.getElementById("conversation").getAttributeNode("speech_toggle").value =="true"){
            document.getElementById("conversation").getAttributeNode("speech_toggle").value ="false";
            TextToSpeech("Text to speech has been deactivated");
    }
    else{
        document.getElementById("conversation").getAttributeNode("speech_toggle").value ="true";
        TextToSpeech("Text to speech has been activated");

    }
  }

  if(event.code == 'KeyS' && (event.shiftKey || event.capsKey)){
        latestMsgSpeech();
  }
});
    

    //edit on july 1st 2019
    function TextToSpeech(text){
        if('speechSynthesis' in window){

            var msg = new SpeechSynthesisUtterance();
            var voices = window.speechSynthesis.getVoices();
            msg.voice = voices[1]; // Note: some voices don't support altering params
            msg.voiceURI = 'native';
            msg.volume = .7; // 0 to 1
            msg.rate = 0.5; // 0.1 to 10
            msg.pitch = 1; //0 to 2
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

            //edit on july 1st 2019

            var msg = new SpeechSynthesisUtterance();
            var voices = window.speechSynthesis.getVoices();
            msg.voice = voices[1]; // Note: some voices don't support altering params
            msg.voiceURI = 'native';
            msg.volume = 1; // 0 to 1S
            msg.rate = 0.7; // 0.1 to 10
            msg.pitch = 2; //0 to 2


            var date = document.getElementById("conversation").getAttributeNode("latestmessagedate").value;
            var name = document.getElementById("current_recept").innerHTML;

            msg.text = "You have latest message from "+ name +" and message is "+document.getElementById("conversation").getAttributeNode("latestMessageRecieved").value + " recieved on date "+ date.substr(0,10);

            msg.lang = 'en-US';

            speechSynthesis.speak(msg);

        }
        else{
            alert("No Speech to Text available in browser.")
        }
    }


    function changeStateTTS(){
    if(document.getElementById("conversation").getAttributeNode("speech_toggle").value ==="true"){
            document.getElementById("conversation").getAttributeNode("speech_toggle").value ="false";
            TextToSpeech("Text to speech has been deactivated");
    }
    else{
        document.getElementById("conversation").getAttributeNode("speech_toggle").value ="true";
        TextToSpeech("Text to speech has been activated");
    }

    }

    var STT = "false";
    function changeStateSTT(){
        if(STT ==="true"){
                STT ="false";
                TextToSpeech("Speech to text has been deactivated");
        }
        else{
            STT ="true";
            TextToSpeech("Speech to Text has been activated. You can now Talk to enter message in the message box.");
        }   
    }

    function sendFile(){

        var xmlhttp1 = XMLReq();

        xmlhttp1.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                alert (this.responseText);
                
                setTimeout(function() {$('#fileUploadModal').modal('hide');}, 100);
             }
        };

        var form = document.getElementById("data_file");
        // form.submit()

        // alert("DEBUG: chat.php: SENDFILE call'd");
        // alert("DEBUG: chat.php: " + document.getElementById("UserId").value);

        document.getElementById("UserId_File").value = document.getElementById("UserId").value; //val remains 0
        var formData = new FormData(form);
        formData.append("to_user_id", document.getElementById("UserId").value);
        xmlhttp1.open("POST", "" , true);
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


    //emoji data
    var emojiJSON = '[{"codes":"1F600","char":"😀","name":"grinning face","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F603","char":"😃","name":"grinning face with big eyes","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F604","char":"😄","name":"grinning face with smiling eyes","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F601","char":"😁","name":"beaming face with smiling eyes","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F606","char":"😆","name":"grinning squinting face","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F605","char":"😅","name":"grinning face with sweat","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F923","char":"🤣","name":"rolling on the floor laughing","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F602","char":"😂","name":"face with tears of joy","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F642","char":"🙂","name":"slightly smiling face","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F643","char":"🙃","name":"upside-down face","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F609","char":"😉","name":"winking face","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F60A","char":"😊","name":"smiling face with smiling eyes","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F607","char":"😇","name":"smiling face with halo","category":"Smileys & Emotion (face-smiling)"},{"codes":"1F970","char":"🥰","name":"smiling face with hearts","category":"Smileys & Emotion (face-affection)"},{"codes":"1F60D","char":"😍","name":"smiling face with heart-eyes","category":"Smileys & Emotion (face-affection)"},{"codes":"1F929","char":"🤩","name":"star-struck","category":"Smileys & Emotion (face-affection)"},{"codes":"1F618","char":"😘","name":"face blowing a kiss","category":"Smileys & Emotion (face-affection)"},{"codes":"1F617","char":"😗","name":"kissing face","category":"Smileys & Emotion (face-affection)"},{"codes":"263A FE0F","char":"☺️","name":"smiling face","category":"Smileys & Emotion (face-affection)"},{"codes":"263A","char":"☺","name":"smiling face","category":"Smileys & Emotion (face-affection)"},{"codes":"1F61A","char":"😚","name":"kissing face with closed eyes","category":"Smileys & Emotion (face-affection)"},{"codes":"1F619","char":"😙","name":"kissing face with smiling eyes","category":"Smileys & Emotion (face-affection)"},{"codes":"1F60B","char":"😋","name":"face savoring food","category":"Smileys & Emotion (face-tongue)"},{"codes":"1F61B","char":"😛","name":"face with tongue","category":"Smileys & Emotion (face-tongue)"},{"codes":"1F61C","char":"😜","name":"winking face with tongue","category":"Smileys & Emotion (face-tongue)"},{"codes":"1F92A","char":"🤪","name":"zany face","category":"Smileys & Emotion (face-tongue)"},{"codes":"1F61D","char":"😝","name":"squinting face with tongue","category":"Smileys & Emotion (face-tongue)"},{"codes":"1F911","char":"🤑","name":"money-mouth face","category":"Smileys & Emotion (face-tongue)"},{"codes":"1F917","char":"🤗","name":"hugging face","category":"Smileys & Emotion (face-hand)"},{"codes":"1F92D","char":"🤭","name":"face with hand over mouth","category":"Smileys & Emotion (face-hand)"},{"codes":"1F92B","char":"🤫","name":"shushing face","category":"Smileys & Emotion (face-hand)"},{"codes":"1F914","char":"🤔","name":"thinking face","category":"Smileys & Emotion (face-hand)"},{"codes":"1F910","char":"🤐","name":"zipper-mouth face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F928","char":"🤨","name":"face with raised eyebrow","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F610","char":"😐","name":"neutral face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F611","char":"😑","name":"expressionless face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F636","char":"😶","name":"face without mouth","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F60F","char":"😏","name":"smirking face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F612","char":"😒","name":"unamused face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F644","char":"🙄","name":"face with rolling eyes","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F62C","char":"😬","name":"grimacing face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F925","char":"🤥","name":"lying face","category":"Smileys & Emotion (face-neutral-skeptical)"},{"codes":"1F60C","char":"😌","name":"relieved face","category":"Smileys & Emotion (face-sleepy)"},{"codes":"1F614","char":"😔","name":"pensive face","category":"Smileys & Emotion (face-sleepy)"},{"codes":"1F62A","char":"😪","name":"sleepy face","category":"Smileys & Emotion (face-sleepy)"},{"codes":"1F924","char":"🤤","name":"drooling face","category":"Smileys & Emotion (face-sleepy)"},{"codes":"1F634","char":"😴","name":"sleeping face","category":"Smileys & Emotion (face-sleepy)"},{"codes":"1F637","char":"😷","name":"face with medical mask","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F912","char":"🤒","name":"face with thermometer","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F915","char":"🤕","name":"face with head-bandage","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F922","char":"🤢","name":"nauseated face","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F92E","char":"🤮","name":"face vomiting","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F927","char":"🤧","name":"sneezing face","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F975","char":"🥵","name":"hot face","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F976","char":"🥶","name":"cold face","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F974","char":"🥴","name":"woozy face","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F635","char":"😵","name":"dizzy face","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F92F","char":"🤯","name":"exploding head","category":"Smileys & Emotion (face-unwell)"},{"codes":"1F920","char":"🤠","name":"cowboy hat face","category":"Smileys & Emotion (face-hat)"},{"codes":"1F973","char":"🥳","name":"partying face","category":"Smileys & Emotion (face-hat)"},{"codes":"1F60E","char":"😎","name":"smiling face with sunglasses","category":"Smileys & Emotion (face-glasses)"},{"codes":"1F913","char":"🤓","name":"nerd face","category":"Smileys & Emotion (face-glasses)"},{"codes":"1F9D0","char":"🧐","name":"face with monocle","category":"Smileys & Emotion (face-glasses)"},{"codes":"1F615","char":"😕","name":"confused face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F61F","char":"😟","name":"worried face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F641","char":"🙁","name":"slightly frowning face","category":"Smileys & Emotion (face-concerned)"},{"codes":"2639 FE0F","char":"☹️","name":"frowning face","category":"Smileys & Emotion (face-concerned)"},{"codes":"2639","char":"☹","name":"frowning face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F62E","char":"😮","name":"face with open mouth","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F62F","char":"😯","name":"hushed face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F632","char":"😲","name":"astonished face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F633","char":"😳","name":"flushed face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F97A","char":"🥺","name":"pleading face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F626","char":"😦","name":"frowning face with open mouth","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F627","char":"😧","name":"anguished face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F628","char":"😨","name":"fearful face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F630","char":"😰","name":"anxious face with sweat","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F625","char":"😥","name":"sad but relieved face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F622","char":"😢","name":"crying face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F62D","char":"😭","name":"loudly crying face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F631","char":"😱","name":"face screaming in fear","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F616","char":"😖","name":"confounded face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F623","char":"😣","name":"persevering face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F61E","char":"😞","name":"disappointed face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F613","char":"😓","name":"downcast face with sweat","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F629","char":"😩","name":"weary face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F62B","char":"😫","name":"tired face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F971","char":"🥱","name":"yawning face","category":"Smileys & Emotion (face-concerned)"},{"codes":"1F624","char":"😤","name":"face with steam from nose","category":"Smileys & Emotion (face-negative)"},{"codes":"1F621","char":"😡","name":"pouting face","category":"Smileys & Emotion (face-negative)"},{"codes":"1F620","char":"😠","name":"angry face","category":"Smileys & Emotion (face-negative)"},{"codes":"1F92C","char":"🤬","name":"face with symbols on mouth","category":"Smileys & Emotion (face-negative)"},{"codes":"1F608","char":"😈","name":"smiling face with horns","category":"Smileys & Emotion (face-negative)"},{"codes":"1F47F","char":"👿","name":"angry face with horns","category":"Smileys & Emotion (face-negative)"},{"codes":"1F480","char":"💀","name":"skull","category":"Smileys & Emotion (face-negative)"},{"codes":"2620 FE0F","char":"☠️","name":"skull and crossbones","category":"Smileys & Emotion (face-negative)"},{"codes":"2620","char":"☠","name":"skull and crossbones","category":"Smileys & Emotion (face-negative)"},{"codes":"1F4A9","char":"💩","name":"pile of poo","category":"Smileys & Emotion (face-costume)"},{"codes":"1F921","char":"🤡","name":"clown face","category":"Smileys & Emotion (face-costume)"},{"codes":"1F479","char":"👹","name":"ogre","category":"Smileys & Emotion (face-costume)"},{"codes":"1F47A","char":"👺","name":"goblin","category":"Smileys & Emotion (face-costume)"},{"codes":"1F47B","char":"👻","name":"ghost","category":"Smileys & Emotion (face-costume)"},{"codes":"1F47D","char":"👽","name":"alien","category":"Smileys & Emotion (face-costume)"},{"codes":"1F47E","char":"👾","name":"alien monster","category":"Smileys & Emotion (face-costume)"},{"codes":"1F916","char":"🤖","name":"robot","category":"Smileys & Emotion (face-costume)"},{"codes":"1F63A","char":"😺","name":"grinning cat","category":"Smileys & Emotion (cat-face)"},{"codes":"1F638","char":"😸","name":"grinning cat with smiling eyes","category":"Smileys & Emotion (cat-face)"},{"codes":"1F639","char":"😹","name":"cat with tears of joy","category":"Smileys & Emotion (cat-face)"},{"codes":"1F63B","char":"😻","name":"smiling cat with heart-eyes","category":"Smileys & Emotion (cat-face)"},{"codes":"1F63C","char":"😼","name":"cat with wry smile","category":"Smileys & Emotion (cat-face)"},{"codes":"1F63D","char":"😽","name":"kissing cat","category":"Smileys & Emotion (cat-face)"},{"codes":"1F640","char":"🙀","name":"weary cat","category":"Smileys & Emotion (cat-face)"},{"codes":"1F63F","char":"😿","name":"crying cat","category":"Smileys & Emotion (cat-face)"},{"codes":"1F63E","char":"😾","name":"pouting cat","category":"Smileys & Emotion (cat-face)"},{"codes":"1F648","char":"🙈","name":"see-no-evil monkey","category":"Smileys & Emotion (monkey-face)"},{"codes":"1F649","char":"🙉","name":"hear-no-evil monkey","category":"Smileys & Emotion (monkey-face)"},{"codes":"1F64A","char":"🙊","name":"speak-no-evil monkey","category":"Smileys & Emotion (monkey-face)"},{"codes":"1F48B","char":"💋","name":"kiss mark","category":"Smileys & Emotion (emotion)"},{"codes":"1F48C","char":"💌","name":"love letter","category":"Smileys & Emotion (emotion)"},{"codes":"1F498","char":"💘","name":"heart with arrow","category":"Smileys & Emotion (emotion)"},{"codes":"1F49D","char":"💝","name":"heart with ribbon","category":"Smileys & Emotion (emotion)"},{"codes":"1F496","char":"💖","name":"sparkling heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F497","char":"💗","name":"growing heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F493","char":"💓","name":"beating heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F49E","char":"💞","name":"revolving hearts","category":"Smileys & Emotion (emotion)"},{"codes":"1F495","char":"💕","name":"two hearts","category":"Smileys & Emotion (emotion)"},{"codes":"1F49F","char":"💟","name":"heart decoration","category":"Smileys & Emotion (emotion)"},{"codes":"2763 FE0F","char":"❣️","name":"heart exclamation","category":"Smileys & Emotion (emotion)"},{"codes":"2763","char":"❣","name":"heart exclamation","category":"Smileys & Emotion (emotion)"},{"codes":"1F494","char":"💔","name":"broken heart","category":"Smileys & Emotion (emotion)"},{"codes":"2764 FE0F","char":"❤️","name":"red heart","category":"Smileys & Emotion (emotion)"},{"codes":"2764","char":"❤","name":"red heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F9E1","char":"🧡","name":"orange heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F49B","char":"💛","name":"yellow heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F49A","char":"💚","name":"green heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F499","char":"💙","name":"blue heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F49C","char":"💜","name":"purple heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F90E","char":"🤎","name":"brown heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F5A4","char":"🖤","name":"black heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F90D","char":"🤍","name":"white heart","category":"Smileys & Emotion (emotion)"},{"codes":"1F4AF","char":"💯","name":"hundred points","category":"Smileys & Emotion (emotion)"},{"codes":"1F4A2","char":"💢","name":"anger symbol","category":"Smileys & Emotion (emotion)"},{"codes":"1F4A5","char":"💥","name":"collision","category":"Smileys & Emotion (emotion)"},{"codes":"1F4AB","char":"💫","name":"dizzy","category":"Smileys & Emotion (emotion)"},{"codes":"1F4A6","char":"💦","name":"sweat droplets","category":"Smileys & Emotion (emotion)"},{"codes":"1F4A8","char":"💨","name":"dashing away","category":"Smileys & Emotion (emotion)"}]';  

    

    //edit on july 2 2019
    $('#emojiList').on('show.bs.popover', function () {

        emojiList = document.getElementById("emojiList");

        var data_content = document.createAttribute('data-content');

    /*    var onclick = document.createAttribute('onclick');
        onclick.value = "deleteMessage(this)";
        var delete_obj = document.createElement('div');
        delete_obj.setAttributeNode(onclick);
*/
        

        var emojiObj = JSON.parse(emojiJSON);

        data_content.value = "<div style='max-height :250px; overflow-y:scroll;'>"
        for(var i =0 ; i < Object.keys(emojiObj).length ; i++){
            data_content.value = data_content.value + "<a href='#'onclick=\"emojiClicked('"+emojiObj[i]["codes"]+"')\" style = 'font-size :large; padding : 5px; '>"+emojiObj[i]["char"]+"</a>" 
        }
        data_content.value = data_content.value + "</div>";
            
       

        // data_content.value = "<div style='max-height :250px; overflow-y:scroll;'><a href='#'onclick=\"emojiClicked('1F354')\" style = 'font-size :large; padding : 5px; '>&#x1F354</a></div>";

        emojiList.setAttributeNode(data_content);

        $('[data-toggle="popover"]').popover();
    })
    
    //edit on july 3 2019
    function emojiClicked(emojiCode){
        var emojiObj = JSON.parse(emojiJSON);

        for(var i =0; i < Object.keys(emojiObj).length ; i++){
            if(emojiCode === emojiObj[i]["codes"]){
                document.getElementById('Message').value = document.getElementById('Message').value + emojiObj[i]['char'];
            }
        }
    }

    document.getElementById("Message").addEventListener('keydown', function(event){
         if (event.keyCode === 13){
            event.preventDefault();
            document.getElementById("Sender").click();
          }
    });

    function imageShow(src){
        var element = document.getElementById("imageShow");
        element.getAttributeNode("src").value=src;
        document.getElementById("imageShowModalLabel").innerHTML = src.substr(22,60);
        $('#imageShowModal').modal('show');
    }
    /*$('#collapseFileShared').on('show.bs.collapse', function () {
        

        if (!xmlhttp){
            xmlhttp = XMLReq();
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {   
                    
                    
                    if(this.responseText != "-1"){
                        var myObj = JSON.parse(this.responseText);
                        
                        var fileshared = document.getElementById("fileShared");
                        
                        for(var i = 0 ; i < Object.keys(myObj).length-1 ; i++){
                            if(myObj[i]["filename"] != "Message is deleted."){
                                var list = document.createElement('a');
                                list.classList.add("list-group-item");
                                var file = document.createAttribute('href');
                                file.value = myObj[i]["filename"];
                                list.setAttributeNode(file);
                                list.appendChild(document.createTextNode((i+1)+". "+myObj[i]["filename"].substr(22,50)));
                                fileshared.appendChild(list);
                                
                            }
                        }

                        document.getElementById('fileSharedInfo').innerHTML="";
                    }
                    else{
                        document.getElementById('fileSharedInfo').innerHTML="No file shared";
                    }


            }
        };

        var userId = document.getElementById("UserId").value;
        
        xmlhttp.open("GET", "?req=1&Requests=showFilesShared&filesharedUserId="+userId, true);
        xmlhttp.send();
    });

    $('#collapsePhotoShared').on('show.bs.collapse', function () {
        

        if (!xmlhttp){
            xmlhttp = XMLReq();
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {   
                    
                    if(this.responseText != "-1"){
                        var myObj = JSON.parse(this.responseText);
                        
                        var photoshared = document.getElementById("photoShared");
                        
                        for(var i = 0 ; i < Object.keys(myObj).length ; i++){
                            if(myObj[i]["photo"] != "Message is deleted."){
                                var img = document.createElement('img');
                            
                                var img_src = document.createAttribute('src');   
                                img_src.value = myObj[i]["photo"];
                                var style = document.createAttribute('style');
                                style.value = "width: 50px; height:50px; padding: 5px;";

                                img.setAttributeNode(img_src);
                                img.setAttributeNode(style);
                                photoshared.appendChild(img);

                            }
                        }
                        document.getElementById('photoSharedInfo').innerHTML="";
                    }
                    else{
                        document.getElementById('photoSharedInfo').innerHTML="No photos shared";
                    }


            }
        };

        var userId = document.getElementById("UserId").value;
        
        xmlhttp.open("GET", "?req=1&Requests=showPhotosShared&photossharedUserId="+userId, true);
        xmlhttp.send();
    });*/
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
