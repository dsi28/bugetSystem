<?php 
session_start();
include('connectionForm.php');
$role= $_SESSION['role'];
$time = $_SESSION['timestamp'];
$DOCID="";
$ath=null;
$query = "SELECT ID FROM DOCS WHERE ROLE = '".$role."'  AND TIME_STAMP='".$time."'";
try{
	$result=$connection->query($query);
	foreach($result as $row){
		$DOCID=$row['ID'];
	}
}catch(Exception $e){
	echo "Error: " . $e->getMessage();
}




$update= "UPDATE APPROVAL SET ACCOUNT = 'T' WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
switch ($role) {
	case 'ASAB' :
		$update= "UPDATE APPROVAL SET ASAB = 'T', ACCOUNT = 'T'  WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
		$ath = "../asab.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(SG ADVISOR) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
	case 'CSAB' :
		$update= "UPDATE APPROVAL SET CSAB = 'T' WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
		$ath = "../csab.php";
		break;
	case 'SG' :
		$update= "UPDATE APPROVAL SET SG = 'T' WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
		$ath = "../sg-advisors.php";
		break;
	case 'AGSC' :
		$update= "UPDATE APPROVAL SET AGSC = 'T' WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
		$ath = "../agsc.php";
		break;
	case 'ACCOUNT' :
		$update= "UPDATE APPROVAL SET ACCOUNT = 'T' WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
		$ath = "../manager.php";
		$to2= 'jdunn2014@fau.edu';
    	$subject = '(ASAB) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	mail($to2, $subject, $message, $headers);
		break;
	case 'VPSA' :
		$update= "UPDATE APPROVAL SET VPSA = 'T' WHERE '".$DOCID."'= ID AND ROLE='".$role."'";
		$ath = "../vpsa.php";
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
