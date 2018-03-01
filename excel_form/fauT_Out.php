<?php
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];
echo (print_r($_POST));
$T_OUT_SUBJECT = array();
$T_OUT_SUBJECT_ARRAY = explode(",",$_POST['t_out_Subject']);
for($v=0; $v<count($T_OUT_SUBJECT_ARRAY); $v++){
 array_push($T_OUT_SUBJECT, $T_OUT_SUBJECT_ARRAY[$v]);
}
echo (print_r($T_OUT_SUBJECT));
 $T_OUT_AMOUNT = array();
 $T_OUT_AMOUNT_ARRAY =explode(",",$_POST['t_out_Amount']);
 for($v=0; $v<count($T_OUT_AMOUNT_ARRAY); $v++){
  array_push($T_OUT_AMOUNT, $T_OUT_AMOUNT_ARRAY[$v]);
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

 $query_check = "SELECT * FROM FAUT_OUT WHERE ROLE='".$ROLE."' AND ID=$DOCID";
 $result = $connection->query($query_check);
 $variation = $result->rowCount();

 if($variation>0){
   if($variation<count($T_OUT_SUBJECT)){
     for($v=($variation); $v<count($T_OUT_SUBJECT);$v++){ //Substracting 4 as those rows always have the same name and we update them above

       $query_add = "INSERT INTO FAUT_OUT(ID, ROLE, SUBJECT, AMOUNT) VALUES($DOCID,
      '".$ROLE."', '".$T_OUT_SUBJECT[$v]."', '".$T_OUT_AMOUNT[$v]."' )";
    echo $query_add;
      try{
     echo $query_add."<br><br>";
       $connection->exec($query_add);

      }catch(Exception $e){
       $e->getMessage();
      }
     }
   }
  for($v=0; $v<count($T_OUT_SUBJECT);$v++){
    $J=$v+1;
   $query_update = "UPDATE FAUT_OUT SET SUBJECT='".$T_OUT_SUBJECT[$v]."', AMOUNT= '".$T_OUT_AMOUNT[$v]."' WHERE ROLE='".$ROLE."' AND ID=$DOCID AND ROWID=$J";
   try{
     echo "Query Update";
     echo $query_update;
    $connection->exec($query_update);
   }catch(Exception $e){
    echo $e->getMessage();
   }
  }
 }else{
  for($v=0; $v<count($T_OUT_SUBJECT); $v++){
   echo "QII";
   $query2 = "INSERT INTO FAUT_OUT(ID, ROLE, SUBJECT, AMOUNT) VALUES($DOCID,
 '".$ROLE."', '".$T_OUT_SUBJECT[$v]."', '".$T_OUT_AMOUNT[$v]."' )";
   echo $query2;
   try{
    $connection->exec($query2);
    echo "Done";
   }catch(Exception $e){
    echo $e->getMessage();
   }
  }
 }

?>
