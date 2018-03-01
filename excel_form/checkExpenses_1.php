<?php
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];
$NAME = $_POST['name'];
$AMOUNT = $_POST['amount'];


$TIMESTAMP = $_SESSION['timestamp'];
$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
  echo $e->getMessage();
 }



$QUERY_DELETE = "DELETE FROM FAUExpenses WHERE ROLE='".$ROLE."' AND ID=$DOCID AND NAME='".$NAME."'";

try{
  echo "Query Delete";
  echo $QUERY_DELETE;
 $connection->exec($QUERY_DELETE);
 echo $QUERY_DELETE;
}catch(Exception $e){
 $e->getMessage();
}

?>
