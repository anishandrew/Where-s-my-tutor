<?php
require_once("db-connection.php");
require_once("db-functions.php");

if (isset($_POST['Comment'])){
	$commentTopic=$_POST['comment-topic'];
	$commmentDesc=$_POST['comment'];
}
//Inserting the Comment into the Comment Database
GLOBAL $mysqli,$db_table_prefix;
$id="";
for ($i=0,$i<6;$i++){
	$id.=rand(0,9);
} 
$ID=int($id);
$stmt=$mysqli->prepare(
	"INSERT INTO".$db_table_prefix."Comment(
		CommentId,
		UserId,
		CourseId,
		CommentTopic,
		CoomentDescription
		VALUES (
		'".$db_table_prefix."',
		?,?,?,?)"
	);
$stmt->bind_param("ssss",$userId,$coomentId,$commentTopic,$comentDescription);
$result=$stmt->execute();
$stmt->close();
?>