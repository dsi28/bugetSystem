<?php
session_start();
include("connectionForm.php");
$ROLE = $_SESSION['role'];
$T_IN = array(); //STORES THE VALUES OF THE TRANSACTIONS
$T_IN_NAME = array(); //STORES THE NAMES OF THE TRANSACTIONS
echo (print_r($_POST));
foreach($_POST as $k => $v) {
 if(strpos($k, 'transfersInValue') === 0) {
  array_push($T_IN, $v);
 }
 if(strpos($k, 'transfersInName') === 0) {
  array_push($T_IN_NAME, $v);
 }
}

$EXP =  array();
$EXP_NAME =  array();
foreach($_POST as $k => $v) {
 if(strpos($k, 'expensesValue') === 0) {
  array_push($EXP, $v);
 }
 if(strpos($k, 'expensesName') === 0) {
  array_push($EXP_NAME, $v);
 }
}
$T_OUT = array();
$T_OUT_NAME = array();
foreach($_POST as $k => $v) {
 if(strpos($k, 'transfersOutValue') === 0) {
  array_push($T_OUT, $v);
 }
 if(strpos($k, 'transfersOutName') === 0) {
  array_push($T_OUT_NAME, $v);
 }
}
$P_IN = $_POST['ptransfersIn'];
$P_OUT = $_POST['p_expenses'];
$P_EXP = $_POST['ptransfersOut'];
$T_IN_COMMENT = htmlentities($_POST['transferInjustification']);
$T_OUT_COMMENT =htmlentities($_POST['transferOutjustification']);
$EXP_COMMENT= array(htmlentities($_POST['expensesJustification_equipment']), htmlentities($_POST['expensesJustification_improvement']),htmlentities($_POST['expensesJustification_contingencies']),htmlentities($_POST['expensesJustification_other']));
$EXP_1 = $EXP_COMMENT[0];
$EXP_2 = $EXP_COMMENT[1];
$EXP_3 = $EXP_COMMENT[2];
$EXP_4 = $EXP_COMMENT[3];


$DOCID = " ";

$TIMESTAMP = $_SESSION['timestamp'];
$query_doc = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM =2 AND TIME_STAMP = '".$TIMESTAMP."'";
try{
 $result = $connection->query($query_doc);
 foreach($result as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
  echo $e->getMessage();
 }


$query = "UPDATE reserveFund SET P_TIN= '".$P_IN."', P_EXP= '".$P_EXP."',P_OUT= '".$P_OUT."', T_INT_COMMENT ='".$T_IN_COMMENT."',T_OUT_COMMENT = '".$T_OUT_COMMENT."', EXP_COMMENT_1=  '".$EXP_1."', EXP_COMMENT_2 = '".$EXP_2."',  EXP_COMMENT_3 = '".$EXP_3."', EXP_COMMENT_4 = '".$EXP_4."' WHERE ROLE='".$ROLE."' AND ID=$DOCID";
echo $query."\n";
try{
 $connection->exec($query);
}catch(Exception $e){
 echo $e->getMessage();
}


for($v = 0; $v<count($T_IN);$v++){
  echo (print_r($T_IN_NAME));
 $query_tin = "UPDATE transfersIn SET AMOUNT = $T_IN[$v] WHERE ROLE='".$ROLE."' AND T_ID=$DOCID AND NAME='".$T_IN_NAME[$v]."'";
 try{
  $connection->exec($query_tin);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}

for($v = 0; $v<count($T_OUT);$v++){
 $query_tout ="UPDATE transfersOut SET AMOUNT = $T_OUT[$v] WHERE ROLE='".$ROLE."' AND T_ID=$DOCID AND NAME='".$T_OUT_NAME[$v]."'";
 try{
  $connection->exec($query_tout);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}
echo(print_r($EXP));
echo(print_r($EXP_NAME));
for($v = 0; $v<count($EXP);$v++){
  echo $EXP[$v];
 $query_exp = "UPDATE expenses SET AMOUNT = $EXP[$v] WHERE ROLE='".$ROLE."' AND T_ID=$DOCID AND NAME='".$EXP_NAME[$v]."'";
 try{
  $connection->exec($query_exp);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}




?>
