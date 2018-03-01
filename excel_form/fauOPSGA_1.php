<?php
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];

$POSITION_TITLE =array();
$POSITION_TITLE_ARRAY = explode(",",$_POST['positionTitle']);
for($v=0; $v<count($POSITION_TITLE_ARRAY); $v++){
 array_push($POSITION_TITLE, $POSITION_TITLE_ARRAY[$v]);
}
$HOURLY_RATE = array();
$HOURLY_RATE_ARRAY =explode(",",$_POST['hourly_rate']);
for($v=0; $v<count($HOURLY_RATE_ARRAY); $v++){
 array_push($HOURLY_RATE, $HOURLY_RATE_ARRAY[$v]);
}
$HOURS_WEEK = array();
$HOURS_WEEK_ARRAY = explode(",",$_POST['hours_week']);
for($v=0; $v<count($HOURS_WEEK_ARRAY); $v++){
 array_push($HOURS_WEEK, $HOURS_WEEK_ARRAY[$v]);
}
$WEEKS_YEAR= array();
$WEEKS_YEAR_ARRAY = explode(",",$_POST['weeks_year']);
for($v=0; $v<count($WEEKS_YEAR_ARRAY); $v++){
 array_push($WEEKS_YEAR, $WEEKS_YEAR_ARRAY[$v]);
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

$query_check = "SELECT * FROM fauOPSGA WHERE ROLE='".$ROLE."' AND ID=$DOCID";
echo "QUERY CHECK " .$query_check;
$result = $connection->query($query_check);
$variation = $result->rowCount();
echo "VARIATION ". $variation;
if($variation>0){
 if($variation<count($POSITION_TITLE)){
  for($v=$variation; $v<count($POSITION_TITLE);$v++){
   $query_add= "INSERT INTO fauOPSGA(ID, ROLE, TITLE, HOURLYRATE, HOURS_WEEK, WEEKS_YEAR) VALUES($DOCID,
 '".$ROLE."',  '".$POSITION_TITLE[$v]."' , '".$HOURLY_RATE[$v]."' ,'".$HOURS_WEEK[$v]."', '".$WEEKS_YEAR[$v]."')";
 echo $query_add;
   try{
  echo $query_add."<br><br>";
    $connection->exec($query_add);

   }catch(Exception $e){
    $e->getMessage();
   }
  }
 }
 for($v=0; $v<count($POSITION_TITLE);$v++){
  $J = $v+1;
  $query_update = "UPDATE fauOPSGA SET TITLE='".$POSITION_TITLE[$v]."', HOURLYRATE = '".$HOURLY_RATE[$v]."', HOURS_WEEK='".$HOURS_WEEK[$v]."', WEEKS_YEAR='".$WEEKS_YEAR[$v]."' WHERE ID=$DOCID AND ROLE='".$ROLE."' AND ROWID='".$J."'";
  try{
    echo "Query update";
    echo $query_update;
   $connection->exec($query_update);
  }catch(Exception $e){
   echo $e->getMessage();
  }
 }
}else{

 for($v=0; $v<count($POSITION_TITLE); $v++){
  $query2 = "INSERT INTO fauOPSGA(ID, ROLE, TITLE, HOURLYRATE, HOURS_WEEK, WEEKS_YEAR) VALUES($DOCID,
 '".$ROLE."',  '".$POSITION_TITLE[$v]."' , '".$HOURLY_RATE[$v]."' ,'".$HOURS_WEEK[$v]."', '".$WEEKS_YEAR[$v]."')";
  try{
  echo "Query 2";
  echo $query2;
   $connection->exec($query2);
   echo "Done";
  }catch(Exception $e){
   echo $e->getMessage();
  }
 }
}

?>
