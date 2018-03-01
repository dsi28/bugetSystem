<?php 

session_start();
include 'connectionForm.php';
$role= $_SESSION['role'];
$liveForm =$_POST['liveForm'];
$id =$_POST['liveID'];
$role = $_POST['liveRole'];
$asab = $_POST['TEST'];
$sg = $_POST['TEST2'];
$csab = $_POST['TEST3'];
$agsc = $_POST['TEST4'];
$vpsa = $_POST['TEST5'];
//echo (print_r($_POST));
//echo $liveForm. "  ". $id;
if($liveForm=='1'){
	$ath = "uwideView.php";	
}else if($liveForm=='2'){
	$ath = "reserveFundView.php";
}else if($liveForm=='3'){
	$ath = "reserveFundsOPSView.php";
}else if($liveForm=='4'){
	$ath = "operatingFundView.php";
}
?>
<form name="form_" method="post" action='<?php echo $ath ?>'>
 <input type="hidden" name="liveID2" value='<?php echo $id ;?>' />
<input type="hidden" name="liveRole2" value='<?php echo $role ;?>' />	
<input type="hidden" name="liveForm2" value='<?php echo $liveForm ;?>' />
<input type="hidden" name="TEST" value='<?php echo $asab ;?>' />
<input type="hidden" name="TEST2" 	value='<?php echo $sg; ?>'>
<input type="hidden" name="TEST3"  	value='<?php echo $csab; ?>'>
<input type="hidden" name="TEST4"  	value='<?php echo $agsc; ?>'>
<input type="hidden" name="TEST5"  	value='<?php echo $vpsa; ?>'>
</form>
<script type="text/javascript">
 document.getElementsByName("form_")[0].submit();
</script>