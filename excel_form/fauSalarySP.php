<?php 
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];

$POSITION_NUMBER = array();
$POSITION_NUMBER_ARRAY = explode(",",$_POST['positionNumber']);
echo(print_r($POSITION_NUMBER_ARRAY));
echo "Numero de elementos".count($POSITION_NUMBER_ARRAY);
for($v=0; $v<count($POSITION_NUMBER_ARRAY); $v++){
 array_push($POSITION_NUMBER, $POSITION_NUMBER_ARRAY[$v]);
}
$POSITION_TITLE =array();
$POSITION_TITLE_ARRAY = explode(",",$_POST['positionTitle']);
for($v=0; $v<count($POSITION_TITLE_ARRAY); $v++){
 array_push($POSITION_TITLE, $POSITION_TITLE_ARRAY[$v]);
}
$FTE = array();
$FTE_ARRAY = explode(",",$_POST['fte']);
for($v=0; $v<count($FTE_ARRAY); $v++){
 array_push($FTE, $FTE_ARRAY[$v]);
}
$ANNUAL_RATE = array();
$RATE_ARRAY = explode(",",$_POST['annual_Rate']);

for($v=0; $v<count($RATE_ARRAY); $v++){
 array_push($ANNUAL_RATE, $RATE_ARRAY[$v]);
}
$STATE = array();
$STATE_ARRAY = explode(",",$_POST['state']);
for($v=0; $v<count($STATE_ARRAY); $v++){
 array_push($STATE, $STATE_ARRAY[$v]);
}

$TIMESTAMP = $_SESSION['timestamp'];
$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
 echo $e->getMessage();
}

$query_check = "SELECT * FROM fauSP WHERE ROLE='".$ROLE."' AND ID=$DOCID";
$result = $connection->query($query_check);
$variation = $result->rowCount();
if($variation>0){
 if($variation<count($POSITION_NUMBER)){
  for($v=$variation; $v<count($POSITION_NUMBER);$v++){
  $query_add="INSERT INTO fauSP(ID, ROLE, POSITION_NUMBER, POSITION_TITLE, FTE, ANNUAL_RATE, STATE) VALUES($DOCID,
 '".$ROLE."',  '".$POSITION_NUMBER[$v-1]."' ,'".$POSITION_TITLE[$v-1]."', '".$FTE[$v-1]."' ,'".$ANNUAL_RATE[$v-1]."', '".$STATE[$v-1]."')";
  
  try{
   echo $query_add."<br><br>";
   $connection->exec($query_add);
  }catch(Exception $e){
   $e->getMessage();
  }
  }
 }
 for($v=0; $v<count($POSITION_NUMBER);$v++){
  $J = $v+1;
  $query_update = "UPDATE fauSP SET POSITION_NUMBER='".$POSITION_NUMBER[$v]."', POSITION_TITLE= '".$POSITION_TITLE[$v]."', FTE = '".$FTE[$v]."', ANNUAL_RATE='".$ANNUAL_RATE[$v]."', STATE='".$STATE[$v]."'WHERE ID=$DOCID AND ROLE='".$ROLE."' AND ROWID=$J";
  echo $query_update."<br><br>";
  try{
   $connection->exec($query_update);
  }catch(Exception $e){
   echo $e->getMessage();
  }
 }
}else{

 for($v=0; $v<count($POSITION_NUMBER); $v++){
  $query2 = "INSERT INTO fauSP(ID, ROLE, POSITION_NUMBER, POSITION_TITLE, FTE, ANNUAL_RATE, STATE)  VALUES($DOCID,
 '".$ROLE."',  '".$POSITION_NUMBER[$v]."' ,'".$POSITION_TITLE[$v]."', '".$FTE[$v]."' ,'".$ANNUAL_RATE[$v]."', '".$STATE[$v]."')";
  try{
   $connection->exec($query2);
   echo "Done";
  }catch(Exception $e){
   echo $e->getMessage();
  }
 }
}

?>