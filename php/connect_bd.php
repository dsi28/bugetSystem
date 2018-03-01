<?php
$conn = null;
function connect_bd(){

global $conn;

$user_name = "dizquierdo2014";
$password_db = "Be3PmYGFur";
$database = "dizquierdo2014";
$server = "localhost";
/*
$user_name = "ASAB4";
$password_db = "Password@123";
$database = "BullardClass4";
$server = "BOCDSADB001";
*/

//Stablishing the connection using PDO
try{
$conn = new PDO("mysql:host=$server;dbname=$database", $user_name, $password_db);
//Connecting to MS SQL server
////Setting the error messages
 $conn->setAttribute(PDO::ATTR_ERRMODE  , PDO::ERRMODE_EXCEPTION);



}
catch(PDOException $e){
  $conn = null;
      echo "Error: " . $e->getMessage();
  }
  // This command ends the connection with the DB $conn = null;
}
?>
