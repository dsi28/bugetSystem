<?php 
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];

$STUDENT = array();
$STUDENT_ARRAY =explode(",",$_POST['student']);
echo(print_r($STUDENT_ARRAY));
for($v=0; $v<count($STUDENT_ARRAY); $v++){
 array_push($STUDENT, $STUDENT_ARRAY[$v]);
}
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

$PEOPLE_POSITION= array();
$PEOPLE_POSITION_ARRAY = explode(",",$_POST['people_position']);
for($v=0; $v<count($PEOPLE_POSITION_ARRAY); $v++){
 array_push($PEOPLE_POSITION, $PEOPLE_POSITION_ARRAY[$v]);
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

$query_check = "SELECT * FROM fauOPS WHERE ROLE='".$ROLE."' AND ID=$DOCID";
$result = $connection->query($query_check);
$variation = $result->rowCount();
if($variation>0){
 if($variation<count($POSITION_TITLE)){
  for($v=$variation; $v<count($POSITION_TITLE);$v++){
   $query_add= "INSERT INTO fauOPS(ID, ROLE, TITLE, FAUSTUDENT, HOURLYRATE, HOURS_WEEK, WEEKS_YEAR, PEOPLE_IN_POSITION) VALUES($DOCID,
 '".$ROLE."',  '".$POSITION_TITLE[$v]."' ,'".$STUDENT[$v]."', '".$HOURLY_RATE[$v]."' ,'".$HOURS_WEEK[$v]."', '".$WEEKS_YEAR[$v]."', '".$PEOPLE_POSITION[$v]."')";

   try{

    $connection->exec($query_add);
    echo $query_add."<br><br>";
   }catch(Exception $e){
    $e->getMessage();
   }
  }
 }
 for($v=0; $v<count($POSITION_TITLE);$v++){
  $J = $v+1;
  $query_update = "UPDATE fauOPS SET TITLE='".$POSITION_TITLE[$v]."', FAUSTUDENT= '".$STUDENT[$v]."', HOURLYRATE = '".$HOURLY_RATE[$v]."', HOURS_WEEK='".$HOURS_WEEK[$v]."', WEEKS_YEAR='".$WEEKS_YEAR[$v]."', PEOPLE_IN_POSITION='".$PEOPLE_POSITION[$v]."' WHERE ID=$DOCID AND ROLE='".$ROLE."' AND ROWID='".$J."'";
  try{
   $connection->exec($query_update);
  }catch(Exception $e){
   echo $e->getMessage();
  }
 }
}
else{

 for($v=0; $v<count($POSITION_TITLE); $v++){
  $query2 = "INSERT INTO fauOPS(ID, ROLE, TITLE, FAUSTUDENT, HOURLYRATE, HOURS_WEEK, WEEKS_YEAR, PEOPLE_IN_POSITION) VALUES($DOCID,
 '".$ROLE."',  '".$POSITION_TITLE[$v]."' ,'".$STUDENT[$v]."', '".$HOURLY_RATE[$v]."' ,'".$HOURS_WEEK[$v]."', '".$WEEKS_YEAR[$v]."', '".$PEOPLE_POSITION[$v]."')";
  try{
   $connection->exec($query2);
   echo "Done";
  }catch(Exception $e){
   echo $e->getMessage();
  }
 }
}

?>