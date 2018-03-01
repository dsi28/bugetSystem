<?php 
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];
$POSITION = $_POST['position'];
$FTE = $_POST['fte'];
$RATE = $_POST['rate'];

$TIMESTAMP = $_SESSION['timestamp'];
$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
  echo $e->getMessage();
 }


 
$QUERY_DELETE = "DELETE FROM fauSP WHERE ROLE='".$ROLE."' AND ID=$DOCID AND POSITION_TITLE='".$POSITION."' AND FTE = '".$FTE."' AND ANNUAL_RATE='".$RATE."'";
try{
 $connection->exec($QUERY_DELETE);
}catch(Exception $e){
 $e->getMessage();
}

?>