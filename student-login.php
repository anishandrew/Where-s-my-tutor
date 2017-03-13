<?php 
function createnewstudent($firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state){
	GLOBAL $mysqli,$db_table_prefix;
	GLOBAL $firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state;
	//Inserting the student database 
	$Id="";
    for($i=0;$i<6;$i++){
       $Id.=rand(0,9);
    }
    $id=(int)$Id;
	$stmt=$mysqli->prepare(
		"INSERT INTO ".$db_table_prefix."student (
			id,
			firstname,
			lastname,
			emailId,
			contactNo,
			addressline1,
			addressLine2,
			city,
			state,
			zipCode,
			country )
			VALUES (
				'".$id."',
				?,?,?,?,?,?,?,?,?,?)"
		);
	$stmt->bind_param("ssssssssss",$firstname,$lastname,$email,$celltel,$address1,$address2,$city,$state,$postal,$country);
	$result=$stmt->execute();
	$stmt->close();
	return $result;
	}

function createnewtutor($firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state,$experience){
	GLOBAL $mysqli,$db_table_prefix,$experience;
	GLOBAL $firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state;
	//inserting into the tutor database
	$Id="";
    for($i=0;$i<6;$i++){
       $Id.=rand(0,9);
    }
    $id=(int)$Id;
	$stmt=$mysqli->prepare(
		"INSERT INTO ".$db_table_prefix."student (
			tutorId,
			firstname,
			lastname,
			emailId,
			contactNo,
			addressline1,
			addressLine2,
			city,
			state,
			zipCode,
			experience,
			tutorDesc
			country )
			VALUES (
				'".$id."',
				?,?,?,?,?,?,?,?,?,?,?,?)"
		);
	$stmt->bind_param("ssssssssss",$firstname,$lastname,$email,$celltel,$address1,$address2,$city,$state,$postal,$experience,$yourself,$country);
	$result=$stmt->execute();
	$stmt->close();
	return $result;
	}
?>