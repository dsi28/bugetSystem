<?php
session_start();
  include("../php/connectionForm.php");
$ROLE= $_SESSION['role'];
$query = "SELECT EMAIL FROM USER_TABLE WHERE ROLE='".$ROLE."'";
$to ="";
foreach(($connection->query($query)) as $row){
	$to = $row['EMAIL'];
}

    $subject = 'Form  Needs Approval';
    $message = "The form needs approval. Please login to review the form";
    $headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    mail($to, $subject, $message, $headers);
?>