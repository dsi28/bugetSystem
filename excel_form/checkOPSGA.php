<?php
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];
$POSITION = $_POST['position'];
$RATE = $_POST['rate'];
$HOURS_WEEK = $_POST['hours_week'];
$WEEKS_YEAR = $_POST['weeks_year'];


$TIMESTAMP = $_SESSION['timestamp'];
$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
  echo $e->getMessage();
 }



$QUERY_DELETE = "DELETE FROM fauOPSGA WHERE ROLE='".$ROLE."' AND ID=$DOCID AND TITLE='".$POSITION."' AND
 HOURLYRATE='".$RATE."' AND HOURS_WEEK='".$HOURS_WEEK."' AND WEEKS_YEAR='".$WEEKS_YEAR."'";

try{
 $connection->exec($QUERY_DELETE);
 echo $QUERY_DELETE;
}catch(Exception $e){
 $e->getMessage();
}

?>
