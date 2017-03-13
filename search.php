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
        <div class="col-md-12" align="center">
          <h1>Search Page</h1>
        </div>
      </div>     
   </div>
 </section>
 <?php
 	if (isset($_POST['Search'])){
 		$zip=$_POST['zip'];
 		//$subject=$_POST['subject'];
 		$searchtut=searchtutors($zip);
 		if ($searchtut!=array()){
 			echo "The following are the result for your search";
 		?>
 		<table border="1" style="width:100%;padding: 15px;text-align: center">
 			<thead>
 				<td>Tutors Name</td>
 				<td>Email Id</td>
 				<td>Years Of Experience</td>
 			</thead>
 			<tbody>
 				<?php
 				foreach($searchtut as $searchtutor){
          if(isset($searchtutor['FirstName'])) {
 				?>
 					<tr>
 						<td><?php print $searchtutor['FirstName']." ".$searchtutor['LastName'];?></td>
 						<td><?php print $searchtutor['EmailId'];?></td>
 						<td><?php print $searchtutor['Experience'];?></td>
 						<td><a href="registration.php"><button>Register</button></a></td>
 					</tr>	
 				<?php } } ?>
 			</tbody>	
 		</table>	
        <?php
 		}
 		else {
 			echo "No searches as per your criteria";
 		}
 	}
 ?>
 </body>
 </html>