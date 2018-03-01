<?php 
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];

$SMARTTAG = $_POST['smart_Tag'];
$ACCOUNTMANAGER = $_POST['accountName'];
$STUDENTBUDGET = $_POST['student_budget'];
$MANAGERNAME = $_POST['managerName'];
$MANAGEREMAIL = $_POST['managerEmail'];
$MANAGERSIGNATURE = $_POST['managerSignature'];
$MANAGERTELEPHONE = $_POST['managerTelephone'];
$SALARIESBENEFITS = $_POST['salariesBenefits'];
$OPS = $_POST['OPS'];
$GRADUATE = $_POST['graduateAss'];
$EXPENSES = $_POST['expenses'];
$T_OUT = $_POST['transfersOut'];

$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
 echo $e.getMessage();
}
$query="";
$query_check = "SELECT * FROM operatingFund WHERE ROLE='".$ROLE."' AND ID='".$DOCID."'";
$result = $connection->query($query_check);
if($result->rowCount()>0){

 $query = "UPDATE operatingFund SET SMARTTAG='".$SMARTTAG."', ACCOUNTMANAGER = '".$ACCOUNTMANAGER."', STUDENTBUDGET = '".$STUDENTBUDGET."', MANAGER_NAME='".$MANAGERNAME."', MANAGER_EMAIL='".$MANAGEREMAIL."', MANAGER_TELEPHONE='".$MANAGERTELEPHONE."', MANAGER_SIGNATURE='".$MANAGERSIGNATURE."', SALARIES_BENEFITS='".$SALARIESBENEFITS."', OPS='".$OPS."', GRADUATE_ASSISTANT='".$GRADUATE."', EXPENSES='".$EXPENSES."', T_OUT='".$T_OUT."' WHERE ROLE='".$ROLE."' AND ID=$DOCID";
 echo $query;
}else{
 $query = "INSERT INTO operatingFund VALUES('".$ROLE."',
 $DOCID,  '".$SMARTTAG."' ,'".$ACCOUNTMANAGER."', '".$STUDENTBUDGET."' ,'".$MANAGERNAME."', '".$MANAGEREMAIL."', '".$MANAGERSIGNATURE."', '".$MANAGERTELEPHONE."', '".$SALARIESBENEFITS."' ,'".$OPS."', '".$GRADUATE."', '".$EXPENSES."' ,'".$T_OUT."')";
 echo $query;
}

try{
 $connection->exec($query);
}catch(Exception $e){
 echo $e->getMessage();
}





?>