<?php
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];

$EXPENSE_NAME =array();
$EXPENSE_NAME_ARRAY = explode(",",$_POST['expenseName']);
for($v=0; $v<count($EXPENSE_NAME_ARRAY); $v++){
array_push($EXPENSE_NAME, $EXPENSE_NAME_ARRAY[$v]);
}
$EXPENSE_AMOUNT = array();
$EXPENSE_AMOUNT_ARRAY =explode(",",$_POST['expenseAmount']);
for($v=0; $v<count($EXPENSE_AMOUNT_ARRAY); $v++){
array_push($EXPENSE_AMOUNT, $EXPENSE_AMOUNT_ARRAY[$v]);
}
$SUPPORT_SERVICE = $_POST['supportServices'];
$PROGRAM_SERVICES = $_POST['programServices'];
$FOOD_SERVICES = $_POST['foodServices'];
$TRAVEL = $_POST['travel'];


$TIMESTAMP = $_SESSION['timestamp'];
$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";
try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
  echo $e->getMessage();
 }

$query_check = "SELECT * FROM FAUExpenses WHERE ROLE='".$ROLE."' AND ID=$DOCID";
$result = $connection->query($query_check);
$variation = $result->rowCount();
if($variation>0){
 $query_update_SUPPORT = "UPDATE FAUExpenses SET AMOUNT='".$SUPPORT_SERVICE."' WHERE NAME='Support Services' AND ROLE='".$ROLE."' AND ID=$DOCID";

  $query_update_PROGRAM = "UPDATE FAUExpenses SET AMOUNT='".$PROGRAM_SERVICES."' WHERE NAME='Program Services' AND ROLE='".$ROLE."' AND ID=$DOCID";


   $query_update_FOOD = "UPDATE FAUExpenses SET AMOUNT='".$FOOD_SERVICES."' WHERE NAME='Food Services' AND ROLE='".$ROLE."' AND ID=$DOCID";


   $query_update_TRAVEL = "UPDATE FAUExpenses SET AMOUNT='".$TRAVEL."' WHERE NAME='Travel' AND ROLE='".$ROLE."' AND ID=$DOCID";
 try{
  $connection->exec($query_update_SUPPORT);
 }catch(Exception $e){
  $e->getMessage();
 }

  try{
  $connection->exec($query_update_PROGRAM);
 }catch(Exception $e){
  $e->getMessage();
 }


  try{
  $connection->exec($query_update_TRAVEL);
 }catch(Exception $e){
  $e->getMessage();
 }


  try{
  $connection->exec($query_update_FOOD);
 }catch(Exception $e){
  $e->getMessage();
 }

 if(($variation-4)<count($EXPENSE_NAME)){ //Check if we have any new file
   for($v=($variation-4); $v<count($EXPENSE_NAME);$v++){ //Substracting 4 as those rows always have the same name and we update them above

     $query_add = "INSERT INTO FAUExpenses(ID, ROLE, NAME, AMOUNT)  VALUES($DOCID,
     '".$ROLE."', '".$EXPENSE_NAME[$v]."', '".$EXPENSE_AMOUNT[$v]."')";
  echo $query_add;
    try{
   echo $query_add."<br><br>";
     $connection->exec($query_add);

    }catch(Exception $e){
     $e->getMessage();
    }
   }
 }

//Updating all expenses
 for($v=0; $v<count($EXPENSE_NAME);$v++){
 $J = $v+5;
 $query_update = "UPDATE FAUExpenses SET AMOUNT= '".$EXPENSE_AMOUNT[$v]."', NAME='".$EXPENSE_NAME[$v]."' WHERE ROLE='".$ROLE."' AND ID=$DOCID AND ROWID=$J";
 try{
   echo "QUERY UPDATE";
   echo $query_update;
  $connection->exec($query_update);
 }catch(Exception $e){
  echo $e->getMessage();
 }
 }

}else{
 $query_support = "INSERT INTO FAUExpenses(ID, ROLE, NAME, AMOUNT) VALUES($DOCID,
 '".$ROLE."', 'Support Services', '".$SUPPORT_SERVICE."' )";
  $query_travel = "INSERT INTO FAUExpenses(ID, ROLE, NAME, AMOUNT)  VALUES($DOCID,
 '".$ROLE."', 'Travel', '".$TRAVEL."' )";

  $query_programs = "INSERT INTO FAUExpenses(ID, ROLE, NAME, AMOUNT)  VALUES($DOCID,
 '".$ROLE."', 'Program Services', '".$PROGRAM_SERVICES."' )";

  $query_food = "INSERT INTO FAUExpenses(ID, ROLE, NAME, AMOUNT)  VALUES($DOCID,
 '".$ROLE."', 'Food Services', '".$FOOD_SERVICES."' )";
 try{
  $connection->exec($query_support);
 }catch(Exception $e){
  echo $e->getMessage();
 }

  try{
  $connection->exec($query_programs);
 }catch(Exception $e){
  echo $e->getMessage();
 }

  try{
  $connection->exec($query_food);
 }catch(Exception $e){
  echo $e->getMessage();
 }

  try{
  $connection->exec($query_travel);
 }catch(Exception $e){
  echo $e->getMessage();
 }



 for($v=0; $v<count($EXPENSE_NAME); $v++){
 $query2 = "INSERT INTO FAUExpenses(ID, ROLE, NAME, AMOUNT)  VALUES($DOCID,
 '".$ROLE."', '".$EXPENSE_NAME[$v]."', '".$EXPENSE_AMOUNT[$v]."' )";
 try{
  $connection->exec($query2);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 }
}

?>
