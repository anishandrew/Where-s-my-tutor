<?php
	require_once("db-connection.php");
	require_once("db-functions.php");
	global $username,$Username,$state,$password,$user,$firstname,$lastname,$address1,$address2,$city,$postal,$country,$User;
	global $email,$celltel,$yourself,$regpassword,$conpassword,$experience;

	if (isset($_POST['register'])){
		$firstname=($_POST['firstname']);
		$lastname=($_POST['lastname']);
		$address1=($_POST['address1']);
		$address2=($_POST['address2']);
		$city=($_POST['city']);
		$postal=($_POST['postal']);
		$User=($_POST['User']);
		$country=($_POST['country']);
		$email=($_POST['email']);
		$celltel=($_POST['celltel']);
		$yourself=($_POST['yourself']);
		$regpassword=($_POST['pwd']);
		$conpassword=($_POST['conpwd']);
		$Username=($_POST['Username']);
		$state=($_POST['state']);
		$experience=($_POST['experience']);

		if ($firstname!=''&&$lastname!=''&&$address1!=''&&$city!=''&&$postal!=''&&$country!=''&&$celltel!=''){
			if ($regpassword==$conpassword){
				if ($User=='student'){
					$newStudent=createnewstudent($firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state);
					}
				elseif($User=='tutor'){
					$newtutor=createnewtutor($firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state,$experience);
					}
				}
			else{
				echo "Passwords don't match, please try again";
				}		

			}
		else{
			echo "Some Fields are not filled, please fill it complete";
		}
	}
?>