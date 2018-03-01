<?php 
session_start();
include('connectionForm.php');
$form =$_POST['form'];
$id =$_POST['id'];
$role2 = $_POST['role'];
$role= $_SESSION['role'];
$ath=null;


//echo $id;


$update= "UPDATE APPROVAL SET ACCOUNT = 'T' WHERE '".$id."'= ID AND ROLE='ACCOUNT'";


switch ($role) {
	case 'ASAB' :
		$update= "UPDATE APPROVAL SET ASAB = 'T' WHERE '".$id."'= ID AND ROLE='$role2'";
		$ath = "../asab.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(SG ADVISOR) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
	case 'CSAB' :
		$update= "UPDATE APPROVAL SET CSAB = 'T' WHERE '".$id."'= ID AND ROLE='".$role2."'";
		$ath = "../csab.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(SG President) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
	case 'SG' :
		$update= "UPDATE APPROVAL SET SG = 'T' WHERE '".$id."'= ID AND ROLE='".$role2."'";
		$ath = "../sg-advisors.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(UBAC) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
	case 'AGSC' :
		$update= "UPDATE APPROVAL SET AGSC = 'T' WHERE '".$id."'= ID AND ROLE='".$role2."'";
		$ath = "../agsc.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(VP Student Affairs) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
	case 'ACCOUNT' :
		$update= "UPDATE APPROVAL SET ACCOUNT = 'T' WHERE '".$id."'= ID AND ROLE='".$role2."'";
		$ath = "../manager.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(ASAB)Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
		
	case 'VPSA' :
		$update= "UPDATE APPROVAL SET VPSA = 'T' WHERE '".$id."'= ID AND ROLE='".$role2."'";
		$ath = "../vpsa.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(ASAB)Form Read for Final Draft';
		$message = "The form has been approved by everyone. Please login to create the final draft";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
}




try{
	$connection->exec($update);
}catch(Exception $e){
	echo "Error: " . $e->getMessage();
}

?>

<form name="form_" method="post" action='<?php echo $ath ?>'>
 <input type="hidden" name="role" value='<?php echo $role ?>' />
</form>

 




<script type="text/javascript">
 document.getElementsByName("form_")[0].submit();
</script>
