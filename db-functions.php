<?php 
require_once("db-connection.php");
function createnewstudent($firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state){
	GLOBAL $mysqli,$db_table_prefix;
	GLOBAL $firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state,$uniquepassword;
	//Inserting the student database 
	$Id="";
    for($i=0;$i<8;$i++){
       $Id.=rand(0,9);
    }
    $uniquepassword=generatepassword($regpassword);
    $id=(int)$Id;
    //inserting the student data in the student database
	$stmt=$mysqli->prepare(
		"INSERT INTO ".$db_table_prefix."student (
			id,
			firstName,
			lastName,
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
	//inserting the username and the password in the login database
	$Login=insertLogin($Username,$uniquepassword);
	return $result;
	}

function createnewtutor($firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state,$experience){
	GLOBAL $mysqli,$db_table_prefix;
	GLOBAL $firstname,$lastname,$address1,$address2,$city,$postal,$User,$country,$email,$celltel,$yourself,$regpassword,$Username,$state,$experience,$uniquepassword;
	$Id="";
    for($i=0;$i<16;$i++){
       $Id.=rand(0,9);
    }
    $uniquepassword=generatepassword($regpassword);
    $id=(int)$Id;
    //inserting the tutor data in the tutor database
	$stmt=$mysqli->prepare(
		"INSERT INTO ".$db_table_prefix."tutor(
			tutorId,
			userName,
			firstName,
			lastName,
			emailId,
			contactNo,
			addressline1,
			addressLine2,
			city,
			state,
			zipCode,
			experience,
			tutorDesc,
			country )
			VALUES (
			'".$id."',
			?,?,?,?,?,?,?,?,?,?,?,?,?)"
		);
	$stmt->bind_param("sssssssssssss",$Username,$firstname,$lastname,$email,$celltel,$address1,$address2,$city,$state,$postal,$experience,$yourself,$country);
	$result=$stmt->execute();
	$stmt->close();
	//inserting the username and the password in the login database
	$Login=insertLogin($Username,$uniquepassword);
	return $result;
}	

function insertLogin($Username,$uniquepassword){
	GLOBAL $mysqli,$db_table_prefix;
	GLOBAL $Username,$uniquepassword;
	$stmt=$mysqli->prepare(
	"INSERT INTO ".$db_table_prefix."login(
		userName,
		passWord)
		VALUES(
		?,?)"
	);
    $stmt->bind_param("ss",$Username,$uniquepassword);
	$result=$stmt->execute();
	$stmt->close();
	return $result;
}
function generatepassword($regpassword,$salt = NULL){
	if($salt==NULL){
		$salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
	}
	else{
		$salt = substr($salt, 0, 25);
	}
	return $salt . sha1($regpassword);
}

function checkpassword($password,$username){
	GLOBAL $mysqli,$db_table_prefix;
	$password=sha1($password);
	$stmt=$mysqli->prepare(
		"SELECT 
		userName,
		passWord
		FROM ".$db_table_prefix."login
		WHERE 
		userName=?
		LIMIT 1");
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	if($num_returns>0){		
		$stmt->bind_result($userName,$passWord);
		while ($stmt->fetch()){
			$UserName=$userName;
			$PassWord=$passWord;
		}
		$PassWord=substr($PassWord,25,strlen($PassWord)-1);
		if ($PassWord===$password && $UserName===$username){
			return True;
		} 
		else {
			return False;
		}
	}
	else{
		return False;
	}
}

function searchtutors($zip){
	GLOBAL $mysqli,$db_table_prefix;
	GLOBAL $zip;

	$row[]=array();
	$stmt=$mysqli->prepare(
		"SELECT 
		firstName,
		lastName,
		emailId,
		experience
		FROM ".$db_table_prefix."tutor
		WHERE 
		zipCode=?"
		);
	$stmt->bind_param("s",$zip);
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	if($num_returns>0){
		$stmt->bind_result($firstname,$lastname,$emailId,$experience);
		while ($stmt->fetch()) {
            $row[] = array(
                'FirstName' => $firstname,
                'LastName' => $lastname,
                'EmailId' => $emailId,
                'Experience' => $experience
            );
        }
        return $row;
	}
	else {
		return $row;
	}
	return $row;
}

function fetchnewdocuments($username){
	GLOBAL $mysqli,$db_table_prefix;
	$stmt=$mysqli->prepare(
		"SELECT 
		documentName,
		documentDesc,
		dateUploaded
		FROM ".$db_table_prefix."document
		WHERE 
		userName=?"
		);
	$row[]=array();
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	if($num_returns>0){
		$stmt->bind_result($docname,$docdesc,$dateup);
		while ($stmt->fetch()) {
			 $row[] = array(
			 		'subject'=>$docname,
			 		'document.topic'=>$docdesc,
			 		'dateuploaded'=>$dateup
			 	);
		}
		return $row;
	}
	else{
		return $row;
	}
	return $row;
}
function fetchtherequestedstudents($username) {
	GLOBAL $mysqli,$db_table_prefix,$FirstName;
	$stmt=$mysqli->prepare(
		"SELECT 
		firstName
		FROM ".$db_table_prefix."tutor
		WHERE 
		userName=?"
		);
	$stmt->bind_param("s",$username);
	$stmt->execute();

		$stmt->bind_result($firstname);
		while ($stmt->fetch()) {
            
                $FirstName = $firstname;
                
        }

    $row[]=array();
	$stmt1=$mysqli->prepare(
		"SELECT 
		firstName,
		lastName,
		emailId,
		contactNo
		FROM ".$db_table_prefix."tempstudent
		WHERE 
		tutorname=?"
		);
	
	$stmt1->bind_param("s",$FirstName);
	$stmt1->execute();
	$stmt1->store_result();
	$num_returns = $stmt1->num_rows;
	if($num_returns>0){
		$stmt1->bind_result($firstname,$lastname,$emailId,$contactNo);
		while ($stmt1->fetch()) {
            $row[] = array(
                'FirstName' => $firstname,
                'LastName' => $lastname,
                'EmailId' => $emailId,
                'ContactNo' => $contactNo
            );
        }
        return $row;
	}
	else {
		return $row;
	}
   

}

function accept($firstname) {
 echo $firstname;
}
?>
