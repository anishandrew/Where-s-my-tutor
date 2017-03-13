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

    <title>Course Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <h1>Course Registration</h1>
        </div>
      </div>     
   </div>
 </section>
<?php
//if (isset($_POST['Register'])){
?>
<div class="container" align="center">

  <form class="courseregister_form" method="post" action="courseRegister.php" style="align-self: center;">
  <table style="margin-top: 15px; margin-left: 15px;">
  <tr>
    <td><label>First Name:</label></td>
    <td><input type="text" class="form-group" name="firstname" placeholder="Jon"> </td>
    </tr>
    <tr>
    <td><label>Last Name:</label></td>
    <td><input type="text" class="form-group" name="lastname" placeholder="Snow"> </td>
  </tr>
  <tr>
    <td><label>Email:</label></td>
    <td><input type="text" class="form-group" name="email" placeholder="@.com"> </td>
  </tr>
  <tr>
    <td><label>Contact:</label></td>
    <td><input type="text" class="form-group" name="contact" placeholder="0123456789"> </td>
  </tr>
  <tr>
    <td><label>Tutor Name:</label></td>
    <td><input type="text" class="form-group" name="tutorname"> </td>
  </tr>
  <tr>
  <td><input type="submit" value="Register" name="register"></td>  
  </tr>
  </table>
  </form>
  </div>
</body>
</html>
<?php 
//?>