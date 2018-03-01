<?php
		$reason = $_POST['reason'];
		$to = 'jdunn2014@fau.edu';
		$subject = '(ACCOUNT EDIT)Form  Needs Approval';
    	$message = "The form needs to be edited. Please login to review the form. Reason: '".$reason."'";
    	$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to, $subject, $message, $headers);
		header("location:../php/form_list.php");
?>
		