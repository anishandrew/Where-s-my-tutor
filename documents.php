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
    </head>
    <body>
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
          <h1>Tutor Documentation Page</h1>
        </div>
      </div>     
    </div>
    </section>
    <?php
        $documents=fetchdocument();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 login" style="width:20%" id="tabs"> 
                <ul>
                    <li style="border:1px outset white"><a href="tutor.php/acc-students">Accept/Reject Students</a></li> 
                    <li style="border:1px outset white"><a href="tutor.php/add-subject">Add New Subject</a></li>
                    <li style="border:1px outset white"><a href="tutor.php/list-students">My Students</a></li>
                    <li style="border:1px outset white"><a href="tutor.php/documents">Course Documents</a></li>
                </ul> 
            </div>
            <div class="col-md-8 uploadeddocuments" style="width:80%">
                <div style="display:block" id="uploadeddocuments">
                    <center><h4>The documents Uploaded By You</h4></center>
                    <table border="1" style="width:100%;padding: 15px;text-align:right">
                        <thead>
                            <td>Subject Name</td>
                            <td>Subject Description</td>
                            <td>Uploaded Date</td>
                        </thead> 
                        <tbody>
                            <?php foreach($documents as $document){
                            ?>
                                <td><?php print $document['subject'];?></td>
                                <td><?php print $document['subject.description'];?></td>
                                <td><?php print $document['date.uploaded'];?></td>
                            <?php
                                }
                            ?>    
                        </tbody>  
                    </table>
                    <a href="comment.html">
                        <button class="btn btn-default">Comment</button>
                    </a>   
                </div>    
            </div>    
        </div>    
    </div>    
    </body>
</html>        