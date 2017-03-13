<?php
require_once("db-connection.php");
require_once("db-functions.php");

global $username,$Username,$state,$password,$user,$firstname,$lastname,$address1,$address2,$city,$postal,$country,$User,$email,$hometel,$celltel,$yourself,$regpassword,$conpassword;
if (isset($_POST['Submit'])){
    $username=($_POST['username']);
    $password=($_POST['psw']);
    $user=($_POST['user']);

	if ($username!=''&&$password!=''){
      if ($user=="student"){
        include('student.html');
      }
      else{
        include('tutor.php');
    
      }
	}
	else{
		$message="You have entered wrong credentials";
    echo "<script type='text/javascript'>alert('$message')</script>";
	}
}
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
<?php
if (isset($_POST['Register'])){
?>

 <section id="title-bar">
   <div class="container">
      <div class="row">
        <div class="col-md-12" align="center">
          <h1>Registration!!</h1>
        </div>
      </div>     
   </div>
 </section>
<div class="container" align="center">

	<form class="register_form" method="post" action="login-page-2.php" style="align-self: center;">
	<table style="margin-top: 15px; margin-left: 15px;">
	  <tr>
	 	<td><label>Username:</label></td>
		<td><input type="text" class="form-group" name="Username" placeholder="@username"> </td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td><label>First Name:</label></td>
		<td><input type="text" class="form-group" name="firstname" placeholder="Jon"> </td>
		<td><label>Last Name:</label></td>
		<td><input type="text" class="form-group" name="lastname" placeholder="Snow"> </td>
	</tr>
	<tr>
		<td><label>Address Line 1:</label></td>
		<td><input type="text" class="form-group" name="address1"> </td>
		<td><label>	Address Line 2:</label>	</td>
		<td>
		<input type="text" class="form-group" name="address2"> 
		</td>
	</tr>
	<tr>
		<td>
	 	<label>
		City:
		</label>
		</td>
		<td>
		<input type="text" class="form-group" name="city"> 
		</td>
		<td>
	 	<label>
		State:
		</label>
		</td>
		<td>
		<input type="text" class="form-group" name="state"> 
		</td>
	</tr>
	<tr>
		<td>
	 	<label>
		Postal:
		</label>
		</td>
		<td>
		<input type="text" class="form-group" name="postal"> 
		</td>
		<td>
	 	<label>
		Country:
		</label>
		</td>
		<td>
		<input type="text" class="form-group" name="country" placeholder="USA"> 
		</td>
	</tr>
	<tr>
		<td>
	 	<label>
		User Type:
		</label>
		</td>
		<td>
		<input type="radio" name="User" value="student" checked> Student <br>
  		<input type="radio"  name="User" value="tutor"> Tutor
  		</td>
  		<td>
  			
  		</td>
  		<td></td>
	</tr>
	<tr>
		<td>
               <label>Email Address:</label>
               </td>
               <td>
               <input type="email" class="form-control" name="email" placeholder="xyz@pqr.com">
               </td>
               
               <td>

               <label>Cell No:</label>
               </td>
               <td>
               <input type="tel" class="form-control" name="celltel" placeholder="0123456789">
               </td>      
        </tr>
        <tr>
		<td>
               <label>Password:</label>
               </td>
               <td>
               <input type="password" class="form-control" name="pwd">
       </td>
       <td>
               <label>Confirm Password:</label>
               </td>
               <td>
               <input type="password" class="form-control" name="conpwd">
               </td>
       
	</tr>
	<tr>
		<td>		<label>Experience(if tutor):</label>
		</td>
<td>

							<select name="experience">
  								<option value="1">1</option>
  								<option value="2">2</option>
  								<option value="3">3</option>
  								<option value="4">4</option>
  								<option value="5">5</option>
  								<option value="6">6</option>
  								<option value="7">7</option>
  								<option value="8">8</option>
  								<option value="9">9</option>
  								<option value="10">10</option>
							 </select>
							 </td> 
							 <td>
		<label>
		About Yourself:</label>
		</td>
		<td>
		<textarea name="yourself" v class="form-group" placeholder="Jon Snow! You know Nothing!"></textarea>
		</td>
		</tr>
		</table>
		<input type="submit" value="Register" name="register">	
	</form>
	</div>

</body>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <ul>
         <li><a href="index.html">Home</a></li>
           <li><a href="about.html">About</a></li>
        </ul>

      </div>
      <div class="col-md-6">
        <p> Copyright &copy; 2016, All Rights Reserved</p>
      </div>
    </div>
  </div>
</footer>
<?php
 }
?>	
