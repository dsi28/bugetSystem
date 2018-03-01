<?php

$username = "padell2017";
$server = "lamp.cse.fau.edu";
$database = "padell2017";
$password = "PuxRM2o2T7";
$user = $_POST["user"];
$role = $_POST["role"];

//Connecting with the database



       try {
         //Connectin to the DB
           $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
           //Setting the Errors fro exception
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //Creating statements
           $stmt = $conn->prepare("SELECT * FROM accountingTable WHERE role = '".$role."' ");
           $stmt->execute();

           // set the resulting array to associative

           $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
           $sed = new RecursiveArrayIterator($stmt->fetchAll());
           foreach($sed as $v) {
               print_r ($v);
           }
       }
       catch(PDOException $e) {
         $conn = null;
           echo "Error: " . $e->getMessage();

       }

?>
