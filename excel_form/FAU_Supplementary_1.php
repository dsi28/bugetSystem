<?php
session_start();
include("connectionForm.php");

$DOCID = "";
$ROLE = $_SESSION['role'];
$TIMESTAMP = $_SESSION['timestamp'];

$SALARIES_BENEFITS = $_POST['commentSalaries'];
$OPS = $_POST['commentOPS'];
$OPSGA = $_POST['commentOPSGA'];
$SUPPORT = $_POST['commentSupport'];
$FOOD = $_POST['commentFood'];
$PROGRAMS = $_POST['commentPrograms'];
$TRAVEL = $_POST['commentTravel'];
$OTHER = $_POST['commentOther'];
$T_OUT = $_POST['commentT_Out'];

$query = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 4 AND TIME_STAMP = '".$TIMESTAMP."'";

try{
 foreach($connection->query($query) as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
 echo $e->getMessage();
}

$query_check = "SELECT * FROM FAUComments WHERE ROLE='".$ROLE."' AND ID=$DOCID";
$result = $connection->query($query_check);
$variation = $result->rowCount();
if($variation>0){
 try{
  $query_Salaries = "UPDATE FAUComments SET COMMENT='".$SALARIES_BENEFITS."' WHERE NAME='Salaries and Benefits' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_Salaries);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $query_OPS = "UPDATE FAUComments SET COMMENT='".$OPS."' WHERE NAME='OPS' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_OPS);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $query_OPSGA = "UPDATE FAUComments SET COMMENT='".$OPSGA."' WHERE NAME='OPSGA' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_OPSGA);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $query_SUPPORT = "UPDATE FAUComments SET COMMENT='".$SUPPORT."' WHERE NAME='Support Services' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_SUPPORT);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $query_PROGRAMS = "UPDATE FAUComments SET COMMENT='".$PROGRAMS."' WHERE NAME='Program Services' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_PROGRAMS);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
    $query_TRAVEL = "UPDATE FAUComments SET COMMENT='".$TRAVEL."' WHERE NAME='Travel' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_TRAVEL);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $query_FOOD = "UPDATE FAUComments SET COMMENT='".$FOOD."' WHERE NAME='Food Services' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_FOOD);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
    $query_OTHER = "UPDATE FAUComments SET COMMENT='".$OTHER."' WHERE NAME='Other' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_OTHER);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $query_T_OUT = "UPDATE FAUComments SET COMMENT='".$T_OUT."' WHERE NAME='Transfers Out' AND ID = $DOCID AND ROLE='".$ROLE."'";
  $connection->exec($query_T_OUT);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
}else{

 $query_Salaries = "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Salaries and Benefits' ,'".$SALARIES_BENEFITS."')";
 $query_OPS = "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'OPS' ,'".$OPS."')";
 $query_OPSGA= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'OPSGA' ,'".$OPSGA."')";
 $query_SUPPORT= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Support Services' ,'".$SUPPORT."')";
 $query_PROGRAMS= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Program Services' ,'".$PROGRAMS."')";
 $query_TRAVEL= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Travel' ,'".$TRAVEL."')";
 $query_FOOD= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Food Services' ,'".$FOOD."')";
 $query_OTHER= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Other' ,'".$OTHER."')";
 $query_T_OUT= "INSERT INTO FAUComments VALUES($DOCID,
 '".$ROLE."',  'Transfers Out' ,'".$T_OUT."')";
 try{
  $connection->exec($query_Salaries);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_OPS);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_OPSGA);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_SUPPORT);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_PROGRAMS);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_TRAVEL);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_FOOD);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_OTHER);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }
 try{
  $connection->exec($query_T_OUT);
  echo "Done";
 }catch(Exception $e){
  echo $e->getMessage();
 }

}




switch($ROLE){
 case 'ASAB':
  header("Location: ../asab.php") ;
  break;
 case 'AGSC':
 header("Location: ../agsc.php") ;
  break;
 case 'CSAB':
 header("Location: ../csab.php") ;
  break;
 case 'SG':
 header("Location: ../sg-advisors.php") ;
  break;
 case 'ACCOUNT':
 header("Location: ../manager.php");
  break;
}
?>
