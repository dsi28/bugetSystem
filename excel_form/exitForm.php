<?php 
session_start();
include("connectionForm.php");
$DOCID = "";
$ROLE = $_SESSION['role'];
$TIMESTAMP = $_SESSION['timestamp'];
$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
  echo $e->getMessage();
 }

$deleteQuery = "DELETE FROM DOCS WHERE ROLE='".$ROLE."' AND ID=$DOCID AND TIME_STAMP='".$TIMESTAMP."' AND FORM=4";


try{
 $connection->exec($deleteQuery);
 
}catch(Exception $e){
  echo $e->getMessage();
 }
echo "done";
?>