<?php
session_start();
if(!isset($_SESSION['role']) and !$_SESSION['authenticated'] == 'YES'){
  include("end_session.php");
}else{
 switch($_SESSION['role']){
    
  case 'ASAB' :
   $ath = "asab.php";
   break;
  case 'CSAB' :
   $ath = "csab.php";
   break;
  case 'SG' :
   $ath = "sg-advisors.php";
   break;
  case 'AGSC' :
   $ath = "agsc.php";
   break;
  case 'ACCOUNT' :
   $ath = "manager.php";
   break;
 
 }
 echo "YEEEE";
 header("location:".$ath);
}

?>

