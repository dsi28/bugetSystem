<?php 


//$connection;
//function connect_bd(){
//global $connection;

$user_name = "dizquierdo2014";
$password_db = "Be3PmYGFur";
$database = "dizquierdo2014";
$server = "localhost";

//Stablishing the connection using PDO
try{
$connection = new PDO("mysql:host=$server;dbname=$database", $user_name, $password_db);
//Connecting to MS SQL server
////Setting the error messages
 $connection->setAttribute(PDO::ATTR_ERRMODE  , PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  $conn = null;
      echo "Error: " . $e->getMessage();
  }


?>

