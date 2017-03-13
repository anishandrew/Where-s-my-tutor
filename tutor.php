<?php
  require_once("db-connection.php");
  require_once("db-functions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Where's My Tutor</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">
        <script>
            function accstudents(){
                document.getElementById("acc-students").style.display="block";
                document.getElementById("add-subject").style.display="none";
                document.getElementById("list-students").style.display="none";
                document.getElementById("documents").style.display="none";
            }
            function addsubject(){
                document.getElementById("acc-students").style.display="none";
                document.getElementById("add-subject").style.display="block";
                document.getElementById("list-students").style.display="none";
                document.getElementById("documents").style.display="none";
            }
            function liststudents(){
                document.getElementById("acc-students").style.display="none";
                document.getElementById("add-subject").style.display="none";
                document.getElementById("list-students").style.display="block";
                document.getElementById("documents").style.display="none";
            }
            function documents(){
                document.getElementById("acc-students").style.display="none";
                document.getElementById("add-subject").style.display="none";
                document.getElementById("list-students").style.display="none";
                document.getElementById("documents").style.display="block";
            }
        </script>
    </head>
    <body onload="accstudents();">
     <?php
      //fetching the details that are required in tthe page that needs to be displayed
     
     $allrecords=fetchtherequestedstudents($username);

     //$allstudents=fetchtheadmittedstudents();
     //$alldocuments=fetchnewdocuments();
     ?> 
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand color-text" href="#"><strong>WheresMyTutor</strong></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="About.html">About</a></li>
          
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <section id="title-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Tutor Login Page</h1>
        </div>
      </div>     
    </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 login" style="width:20%" id="tabs"> 
                <ul>
                    <li style="border:1px outset white"><a href="#acc-students" onclick="accstudents();">Accept/Reject Students</a></li> 
                    <li style="border:1px outset white"><a href="#add-subject" onclick="addsubject();">Add New Subject</a></li>
                    <li style="border:1px outset white"><a href="#list-students" onclick="liststudents();">My Students</a></li>
                    <li style="border:1px outset white"><a href="#documents" onclick="documents();">Course Documents</a></li>
                </ul> 
            </div>
            <div class="col-md-8 acc-students" style="width:80%">
                <div style="display:block" id="acc-students">
                <center><h4>Students That Have Requested Your Assistance</h4></center>
                <table border="1" style="width:100%;padding: 15px;text-align:center">
                    <thead>
                        <th>Student's Name</th>
                        <th>Student's Email Address</th>
                        <th>Student's Contact </th>
                        <th>Student Accept / Reject </th>
                    </thead>    
                    <tbody>
                        <?php
                            foreach($allrecords as $displayRecords){
                              if(isset($displayRecords['FirstName'])) {
                ?>
                                  
                            <tr>
                                <td><?php print $displayRecords['FirstName']." ".$displayRecords['LastName'] ;?></td>
                                
                                <td><?php print $displayRecords['EmailId'] ;?></td>
                                <td><?php print $displayRecords['ContactNo'] ;?></td>
                                <td><input type="button" onclick="<? php accept($displayRecords['FirstName']) ?>"></input>
                                <a href="Accept.php"><button>Accept</button></a><a href="Reject.php>"><button>Reject</button></a></td>
                            </tr>   
                        <?php
                            } }
                        ?>
                    </tbody>    
                </table>
                </div>  
            </div><br><br><br>  
            <div class="col-md-8 add-subject" style="width:80%">
                <div style="display:block;border:1px solid black;padding:10px;margin:5px;" id="add-subject" >
                    <center><h4>Enter the details of the subjects that you are interested to teach</h4></center>
                    <form method="post" action="subject-registration.php">
                        Course Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <textarea name="course" rows="1" cols="80"></textarea><br><br>
                        Course Description:&nbsp;<textarea name="description" rows="4" cols="80"></textarea>
                    </form> 
                </div>
            </div>  
            <div class="col-md-8 list-students" style="width:80%">
                <div style="display:block" id="list-students">
                    <center><h4>Students and the Subjects they have enlisted</h4></center>
                    <table border="1" style="width:100%;padding: 15px;text-align:right">
                        <thead>
                            <th style="padding:1px">Student's Name</th>
                            <th style="padding:1px">Subject Taken by student</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($allstudents as $allstudent){ ?>
                                    <tr>
                                        <td><?php print $allstudent['firstName']." ".$allstudent['lastName'];?></td>
                                        <td><?php print $allstudent['subject'];?></td>
                                    </tr>   
                            <?php
                              }
                            ?>  
                        </tbody>    
                    </table>    
                </div>  
            </div>  
            <div class="col-md-8 documents" style="width:80%">
                <div style="display:block" id="documents">
                    <center><h4>The Documents uploaded as per the subjects</h4></center>
                    <table border="1" style="width:100%;padding: 15px;text-align:right">
                        <thead>
                            <th style="padding:1px">Subject Name</th>
                            <th style="padding:1px">Documents Uploaded</th> 
                            <th style="padding:1px">Uploaded Date</th> 
                        </thead>
                        <tbody>
                            <?php foreach($alldocuments as $newdocument){?>
                                <tr>
                                    <td><?php print $newdocument['subject'];?></td>
                                    <td><a href="documents.php?subject="<?php print $newdocument['document.topic'];?>>
                                    <?php print $newdocument['document.topic'];?></a></td>
                                    <td><?php print $newdocument['dateuploaded']?></td>
                                </tr>
                            <?php
                                }
                            ?>      
                        </tbody>    
                    </table>    
                </div>  
            </div>  
        </div>
    </div>      
    </body>
</html>