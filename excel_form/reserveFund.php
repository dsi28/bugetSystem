<?php
session_start();
include("connectionForm.php");
$ROLE = $_SESSION['role'];
$POSITION = array(); //STORES THE VALUES OF THE TRANSACTIONS
$FAUSTUDENT = array(); //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$HOURLYRATE = array(); //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$HOURSWEEK = array();  //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$WEEKSPERYEAR = array();  //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$PEOPLEPOSITION = array();  //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
foreach($_POST as $k => $v) {
 if(strpos($k, 'positionTitle') === 0) {
  array_push($POSITION, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'FAUstudent') === 0) {
  array_push($FAUSTUDENT, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'hourlyRate') === 0) {
  array_push($HOURLYRATE, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'hoursPerWeek') === 0) {
  array_push($HOURSWEEK, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'weeksPerYear') === 0) {
  array_push($WEEKSPERYEAR, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'peoplePosition') === 0) {
  array_push($PEOPLEPOSITION, $v);
 }
}


$REVENUE = $_POST['revenue'];
$REVENUECOMMENT =htmlentities($_POST['revenueComment']);
$OPS = $_POST['OPS'];
$OPSCOMMENT =htmlentities($_POST['opsComment']);
$T_IN = $_POST['transfersIn'];
$T_IN_COMMENT =htmlentities($_POST['transferInComment']);
$T_OUT = $_POST['transfersOut'];
$T_OUT_COMMENT =htmlentities($_POST['transferOutComment']);
$TRANSACTION_ID = "";

//THIS FOUR VARIABLES WILL STORE THE COMMENTS FOR ALL THE EXPENSES IN THE SAME TABLE
$SUPPORT_COMMENT =htmlentities($_POST['expensesComment']);
$FOOD_COMMENT =htmlentities($_POST['expensesComment']);
$PROGRAMS_COMMENT =htmlentities($_POST['expensesComment']);
$OTHER_COMMENT =htmlentities($_POST['expensesComment']);

$query = "INSERT INTO reserveFundsOPS VALUES ('".$ROLE."', '".$REVENUE."', '".$REVENUECOMMENT."', '".$OPS."', '".$OPSCOMMENT."', '".$T_IN."',  '".$T_IN_COMMENT."', '".$T_OUT."', '".$T_OUT_COMMENT."')";
echo "eeeeeeeeeeeeeooooooooooooooooooo";
echo $query;

echo "\n";

$query2 = "SELECT ID FROM reserveFundsOPS WHERE ROLE = '".$ROLE."'";

try{
 $connection->exec($query);

 foreach($connection->query($query2) as $row){
  $TRANSACTION_ID = $row["ID"];
 }

 echo "Transaction ID" .$TRANSACTION_ID;

 $query3 = "INSERT INTO reserveFundsOPSExpenses VALUES('".$TRANSACTION_ID."','".$SUPPORT_COMMENT."', '".$FOOD_COMMENT[$v]."','".$PROGRAMS_COMMENT."', '".$OTHER_COMMENT."')";

 echo $query3;

 $connection->exec($query3);
 
}catch(Exception $e){
 echo $e->getMessage();
}

//INSERT ALL THE POSITIONS RELATED WITH THE FORM

for($v = 0; $v<count($T_IN);$v++){
 $query = "INSERT INTO reserveFundsOPSPosition VALUES('".$TRANSACTION_ID."','".$POSITION[$v]."', '".$FAUSTUDENT[$v]."','".$HOURLYRATE[$v]."', '".$HOURSWEEK."', '".$WEEKSPERYEAR[$v]."', '".$PEOPLEPOSITION[$v]."')";
 try{
  $connection->exec($query);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}
//INSERT THE COMMENTS FOR THE EXPENSES 

try{
 $connection->exec($query);

}catch(Exception $e){
 echo $e->getMessage();
}

echo (print_r($_POST));

?>