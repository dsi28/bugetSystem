<?php
session_start();
include("connectionForm.php");
$ROLE = $_SESSION['role'];
$T_IN = array(); //STORES THE VALUES OF THE TRANSACTIONS
$T_IN_NAME = array(); //STORES THE NAMES OF THE TRANSACTIONS

$form =$_POST['form'];
$id =$_POST['id'];
$role = $_POST['role'];
date_default_timezone_set("America/New_York");
$date = date("Y-m-d H:i:s");
$DOCID='';
foreach($_POST as $k => $v) {
 if(strpos($k, 'transfersInValue') === 0) {
  array_push($T_IN, $v);
 }
 if(strpos($k, 'transfersInName') === 0) {
  array_push($T_IN_NAME, $v);
 }
}

$EXP =  array();
$EXP_NAME =  array();
foreach($_POST as $k => $v) {
 if(strpos($k, 'expensesValue') === 0) {
  array_push($EXP, $v);
 }
 if(strpos($k, 'expensesName') === 0) {
  array_push($EXP_NAME, $v);
 }
}
$T_OUT = array();
$T_OUT_NAME = array();
foreach($_POST as $k => $v) {
 if(strpos($k, 'transfersOutValue') === 0) {
  array_push($T_OUT, $v);
 }
 if(strpos($k, 'transfersOutName') === 0) {
  array_push($T_OUT_NAME, $v);
 }
}
$P_IN = $_POST['ptransfersIn'];
$P_OUT = $_POST['p_expenses'];
$P_EXP = $_POST['ptransfersOut'];
$T_IN_COMMENT = htmlentities($_POST['transferInjustification']);
$T_OUT_COMMENT =htmlentities($_POST['transferOutjustification']);
$EXP_COMMENT= array(htmlentities($_POST['expensesJustification_equipment']), htmlentities($_POST['expensesJustification_improvement']),htmlentities($_POST['expensesJustification_contingencies']),htmlentities($_POST['expensesJustification_other']));
$EXP_1 = $EXP_COMMENT[0];
$EXP_2 = $EXP_COMMENT[1];
$EXP_3 = $EXP_COMMENT[2];
$EXP_4 = $EXP_COMMENT[3];

//echo "role: ".$role;
//echo "id: ".$id;
//echo "ROLE:".$ROLE;

if($ROLE=='CSAB'){
	
$query_update = "UPDATE APPROVAL SET CSAB='E' WHERE '".$role."'= ROLE AND '".$id."'=ID AND FORM=2";
 try{
  $connection->exec($query_update);

 }catch(Exception $e){
  echo $e->getMessage();
 }



$create ="INSERT INTO DOCS(ROLE, FORM, TIME_STAMP) VALUES('".$ROLE."', 2, '".$date."')";
try{
 $connection->exec($create);
}catch(Exception $e){
 echo $e->getMessage();
}

$query_id = "SELECT ID FROM DOCS WHERE '".$ROLE."' = ROLE AND FORM =2 AND '".$date."'=TIME_STAMP";
 try{
 $result = $connection->query($query_id);
 foreach($result as $rows){
	 $DOCID= $rows['ID'];
 }
 }catch(Exception $e){
  echo $e->getMessage();
 }

//echo "DOCID:".$DOCID;

//$DOCID = " ";
//
//$TIMESTAMP = $_SESSION['timestamp'];
//$query_doc = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM =2 AND TIME_STAMP = '".$TIMESTAMP."'";
//try{
// $result = $connection->query($query_doc);
// foreach($result as $row){
//  $DOCID = $row['ID'];
// }
//}catch(Exception $e){
//  echo $e->getMessage();
// }


$query = "INSERT INTO reserveFund(ID, ROLE, P_TIN, P_EXP, P_OUT, T_INT_COMMENT,T_OUT_COMMENT, EXP_COMMENT_1,  EXP_COMMENT_2,  EXP_COMMENT_3,  EXP_COMMENT_4) VALUES ('".$DOCID."','".$ROLE."', '".$P_IN."', '".$P_EXP."', '".$P_OUT."', '".$T_IN_COMMENT."', '".$T_OUT_COMMENT."',  '".$EXP_1."', '".$EXP_2."', '".$EXP_3."', '".$EXP_4."')";
//echo $query."\n";
try{
 $connection->exec($query);
}catch(Exception $e){
 echo $e->getMessage();
}


for($v = 0; $v<count($T_IN);$v++){
 $query_tin = "INSERT INTO transfersIn VALUES('".$ROLE."', $DOCID, '".$T_IN_NAME[$v]."','".$T_IN[$v]."')";
 try{
  $connection->exec($query_tin);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}

for($v = 0; $v<count($T_OUT);$v++){
 $query_tout = "INSERT INTO transfersOut VALUES('".$ROLE."', $DOCID, '".$T_OUT_NAME[$v]."','".$T_OUT[$v]."')";
 try{
  $connection->exec($query_tout);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}
//echo(print_r($EXP));
//echo(print_r($EXP_NAME));
for($v = 0; $v<count($EXP);$v++){
 $query_exp = "INSERT INTO expenses VALUES('".$ROLE."', $DOCID, '".$EXP_NAME[$v]."','".$EXP[$v]."')";
 try{
  $connection->exec($query_exp);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}



$create_approval="INSERT INTO APPROVAL(ROLE, FORM, ID, CSAB) VALUES('".$ROLE."', 2, $DOCID, 'T')";
//echo $create_approval;
try{
	$connection->exec($create_approval);
}catch(Exception $e){
	echo $e->getMessage();
}
	
	
	$to2= 'jdunn2014@fau.edu';
    	$subject = '(UBAC TO ACCOUNT EDIT) Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
    	
	

}elseif($ROLE=='ACCOUNT'){
	
	$query_update = "UPDATE APPROVAL SET CSAB= NULL WHERE '".$role."'= ROLE AND '".$id."'=ID AND FORM=2";
 	try{
  		$connection->exec($query_update);
 	}catch(Exception $e){
  		echo $e->getMessage();
 	}
		
	$query = "UPDATE reserveFund SET P_TIN = '".$P_IN."', P_EXP = '".$P_EXP."', P_OUT = '".$P_OUT."', T_INT_COMMENT = '".$T_IN_COMMENT."', T_OUT_COMMENT = '".$T_OUT_COMMENT."', EXP_COMMENT_1 = '".$EXP_1."', EXP_COMMENT_2 = '".$EXP_2."',EXP_COMMENT_3 = '".$EXP_3."', EXP_COMMENT_4 = '".$EXP_4."' WHERE '".$id."' = ID AND '".$role."' = ROLE";
	try{
 		$connection->exec($query);
	}catch(Exception $e){
 		echo $e->getMessage();
	}
	
	
	for($v = 0; $v<count($T_IN);$v++){
		$query_tin = "UPDATE transfersIn SET NAME = '".$T_IN_NAME[$v]."', AMOUNT = '".$T_IN[$v]."' WHERE '".$id."' = T_ID AND '".$role."' = ROLE";
 		try{
  			$connection->exec($query_tin);
 		}catch(Exception $e){
  			echo $e->getMessage();
 		}
	}
	
	for($v = 0; $v<count($T_OUT);$v++){
		$query_tout = "UPDATE transfersOut SET NAME = '".$T_OUT_NAME[$v]."', AMOUNT = '".$T_OUT[$v]."' WHERE '".$id."' = T_ID AND '".$role."' = ROLE";
 		try{
  			$connection->exec($query_tout);

 		}catch(Exception $e){
  			echo $e->getMessage();
 		}
	}
	
	for($v = 0; $v<count($EXP);$v++){
		$query_exp = "UPDATE expenses SET NAME = '".$EXP_NAME[$v]."', AMOUNT = '".$EXP[$v]."' WHERE '".$id."' = T_ID AND '".$role."' = ROLE";
 		try{
  			$connection->exec($query_exp);

 		}catch(Exception $e){
  			echo $e->getMessage();
 		}
	}
	
	
	$create_approval="UPDATE APPROVAL SET ACCOUNT ='T' WHERE '".$role."' = ROLE AND '".$id."'=ID AND FORM=2";
	echo $create_approval;
	try{
		$connection->exec($create_approval);
	}catch(Exception $e){
		echo $e->getMessage();
	}
	
	$to2= 'jdunn2014@fau.edu';
    	$subject = '(ACCOUNT EDIT TO ASAB)Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
	
	
}

mail($to2, $subject, $message, $headers);
//header("location:../php/update_approval2.php");
$ath = '../php/form_list.php';
?>



<form name="form_" method="post" action='<?php echo $ath ?>'>
 <input type="hidden" name="role" value='<?php echo $role ?>' />
<input type="hidden" name="form" value='<?php echo $form ;?>' />	
<input  name="id" value='<?php echo $id ;?>' />	
</form>


<script type="text/javascript">
 document.getElementsByName("form_")[0].submit();
</script>
