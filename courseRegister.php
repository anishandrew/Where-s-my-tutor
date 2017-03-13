<?php
require_once("db-connection.php");
$fname = $_POST["firstname"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$tutorname= $_POST["tutorname"];

$tempstu = createtempstu($fname, $lname, $email, $contact, $tutorname);

function createtempstu($fname, $lname, $email, $contact, $tutorname) {
	global $mysqli, $db_table_prefix;
	$character_array = array_merge(range('a', 'z'), range(0, 9));
  $rand_string = "";
  for ($i = 0; $i < 6; $i++) {
    $rand_string .= $character_array[rand(
      0, (count($character_array) - 1)
    )];
  }
  
  $stmt = $mysqli->prepare(
    "INSERT INTO ". $db_table_prefix ."tempstudent (
    id,
    firstName,
    lastName,
    emailId,
    contactNo,
    tutorname
    )
    VALUES (
    '". $rand_string ."',
    ?,
    ?,
    ?,
    ?,
    ?
    )"
  );
  $stmt->bind_param("sssss", $fname, $lname, $email, $contact, $tutorname);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
    
}

?>
<html>
<head>
<h1> Course Successfully Registered </h1>
</head>
</html>