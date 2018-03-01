<?php
session_start();
include("connectionForm.php");
$ROLE = $_SESSION['role'];
$form =$_POST['form'];
$id =$_POST['id'];
$role = $_POST['role'];
date_default_timezone_set("America/New_York");
$date = date("Y-m-d H:i:s");
$DOCID='';
$POSITION = array(); //STORES THE VALUES OF THE TRANSACTIONS
$FAUSTUDENT = array(); //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$HOURLYRATE = array(); //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$HOURSWEEK = array();  //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$WEEKSPERYEAR = array();  //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
$PEOPLEPOSITION = array();  //STORES THE VALUES OF THE DATA LINKED TO THE POSITION
foreach($_POST as $k => $v) {
 if(strpos($k, 'positionTitle') === 0) {
  array_push($POSITION, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'FAUstudent') === 0) {
  array_push($FAUSTUDENT, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'hourlyRate') === 0) {
  array_push($HOURLYRATE, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'hoursPerWeek') === 0) {
  array_push($HOURSWEEK, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'weeksPerYear') === 0) {
  array_push($WEEKSPERYEAR, $v);
 }
}
foreach($_POST as $k => $v) {
 if(strpos($k, 'peoplePosition') === 0) {
  array_push($PEOPLEPOSITION, $v);
 }
}


$REVENUE = $_POST['revenue'];
$REVENUECOMMENT =htmlentities($_POST['revenueComment']);
$OPS = $_POST['OPS'];
$OPSCOMMENT =htmlentities($_POST['opsComment']);
$T_IN = $_POST['transfersIn'];
$T_IN_COMMENT =htmlentities($_POST['transferInComment']);
$T_OUT = $_POST['transfersOut'];
$T_OUT_COMMENT = htmlentities($_POST['transferOutComment']); //we did this
$TRANSACTION_ID = "";
$DOCID = " ";
//THIS FOUR VARIABLES WILL STORE THE COMMENTS FOR ALL THE EXPENSES IN THE SAME TABLE
$SUPPORT_COMMENT =htmlentities($_POST['expensesComment']);
$FOOD_COMMENT =htmlentities($_POST['food_servicesComment']);
$PROGRAMS_COMMENT =htmlentities($_POST['programsComment']);
$OTHER_COMMENT =htmlentities($_POST['otherComment']);


if($ROLE== 'CSAB'){

$queryUpdate="UPDATE APPROVAL SET CSAB='E' WHERE '".$role."'= ROLE AND '".$id."'=ID AND FORM=3";
try{
 $connection->exec($queryUpdate);
}catch(Exception $e){
 echo $e->getMessage();
}
echo $queryUpdate;

$createDoc="INSERT INTO DOCS(ROLE, FORM, TIME_STAMP) VALUES ('".$ROLE."', 3, '".$date."')";
try{
 $connection->exec($createDoc);
}catch(Exception $e){
 echo $e->getMessage();
}



//$TIMESTAMP = $_SESSION['timestamp'];
$getID = "SELECT ID FROM DOCS WHERE ROLE='".$ROLE."' AND FORM = 3 AND TIME_STAMP = '".$date."'";
try{
 $result = $connection->query($getID);
 foreach($result as $row){
  $DOCID = $row['ID'];
 }
}catch(Exception $e){
 echo $e->getMessage();
}




$query = "INSERT INTO reserveFundsOPS(ROLE,ID, REVENUE, REVENUE_COMMENT, OPS, OPS_COMMENT, T_IN, T_IN_COMMENT, T_OUT, T_OUT_COMMENT) VALUES ('".$ROLE."','".$DOCID."', '".$REVENUE."', '".$REVENUECOMMENT."', '".$OPS."', '".$OPSCOMMENT."', '".$T_IN."',  '".$T_IN_COMMENT."', '".$T_OUT."', '".$T_OUT_COMMENT."')";
//echo "eeeeeeeeeeeeeooooooooooooooooooo";
//echo $query;

//echo "\n";

try{
 $connection->exec($query);
}catch(Exception $e){
 echo $e->getMessage();
}

//INSERT THE COMMENTS FOR THE EXPENSES 

try{
 $query3 = "INSERT INTO reserveFundsOPSExpenses VALUES('".$ROLE."','".$DOCID."','".$SUPPORT_COMMENT."', '".$FOOD_COMMENT."','".$PROGRAMS_COMMENT."', '".$OTHER_COMMENT."')";

// echo $query3."<br><br>";
 $connection->exec($query3);
 //echo "jjhgfdjhgfd";

}catch(Exception $e){
 echo $e->getMessage();
}

//INSERT ALL THE POSITIONS RELATED WITH THE FORM
//echo "la otra cosa";
//echo count($POSITION)."<br><br>";
for($v = 0; $v<count($POSITION);$v++){
 try{
  $query4 = "INSERT INTO reserveFundsOPSPosition VALUES('".$ROLE."','".$DOCID."','".$POSITION[$v]."', '".$FAUSTUDENT[$v]."','".$HOURLYRATE[$v]."', '".$HOURSWEEK[$v]."', '".$WEEKSPERYEAR[$v]."', '".$PEOPLEPOSITION[$v]."')";
  //echo $query;
  $connection->exec($query4);

 }catch(Exception $e){
  echo $e->getMessage();
 }
}

$create_approval="INSERT INTO APPROVAL(ROLE, FORM, ID, CSAB) VALUES('".$ROLE."', 3, $DOCID, 'T')";
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
	
} elseif($ROLE=='ACCOUNT'){
	
	
	$updateApproval="UPDATE APPROVAL SET CSAB= NULL WHERE '".$role."'= ROLE AND '".$id."'=ID AND FORM=3";
	try{
		$connection->exec($updateApproval);
	}catch(Exception $e){
		echo $e->getMessage();
	}
	
		
	$query = "UPDATE reserveFundsOPS SET REVENUE= '".$REVENUE."', REVENUE_COMMENT='".$REVENUECOMMENT."', OPS='".$OPS."', OPS_COMMENT='".$OPSCOMMENT."', T_IN='".$T_IN."', T_IN_COMMENT='".$T_IN_COMMENT."', T_OUT='".$T_OUT."', T_OUT_COMMENT='".$T_OUT_COMMENT."' WHERE ROLE='".$role."' AND ID = '".$id."' ";		
	
	try{
		$connection->exec($query);
	}catch(Exception $e){
		echo $e->getMessage();
	}

		//INSERT THE COMMENTS FOR THE EXPENSES 

		try{
			
		 $query3 = "UPDATE reserveFundsOPSExpenses SET SUPPORT='".$SUPPORT_COMMENT."', FOOD='".$FOOD_COMMENT."', PROGRAMS='".$PROGRAMS_COMMENT."', OTHER='".$OTHER_COMMENT."' WHERE ROLE='".$role."' AND T_ID = '".$id."'";		

		 $connection->exec($query3);

		}catch(Exception $e){
		 echo $e->getMessage();
		}

		//INSERT ALL THE POSITIONS RELATED WITH THE FORM
		//echo "la otra cosa";
		//echo count($POSITION)."<br><br>";
		for($v = 0; $v<count($POSITION);$v++){
		 try{
		  $query4 = "INSERT INTO reserveFundsOPSPosition VALUES('".$ROLE."','".$DOCID."','".$POSITION[$v]."', '".$FAUSTUDENT[$v]."','".$HOURLYRATE[$v]."', '".$HOURSWEEK[$v]."', '".$WEEKSPERYEAR[$v]."', '".$PEOPLEPOSITION[$v]."')";
			 
		$query4 = "UPDATE reserveFundsOPSPosition SET TITLE='".$POSITION[$v]."', FAUSTUDENT='".$FAUSTUDENT[$v]."', HOURLYRATE='".$HOURLYRATE[$v]."', HOURS_WEEK='".$HOURSWEEK[$v]."', WEEKS_YEAR='".$WEEKSPERYEAR[$v]."', PEOPLE_IN_POSITION='".$PEOPLEPOSITION[$v]."' WHERE ROLE='".$role."' AND T_ID = '".$id."'";
		  $connection->exec($query4);
		 }catch(Exception $e){
		  echo $e->getMessage();
		 }
		}
	
	$asabT="UPDATE APPROVAL SET ACCOUNT='T' WHERE '".$role."'= ROLE AND '".$id."'=ID AND FORM=3";
	try{
		$connection->exec($asabT);
	}catch(Exception $e){
		echo $e->getMessage();
	}
	
	
	$to2= 'jdunn2014@fau.edu';
    	$subject = '(ACCOUNT EDIT TO ASAB)Form  Needs Approval';
		$message = "The form needs approval. Please login to review the form";
		$headers = 'From: DO-NOT-REPLY <DoNotReply@fau.edu>' ;
	
	
}
mail($to2, $subject, $message, $headers);
$ath = '../php/form_list.php';
//header("location:../asab.php");
//echo (print_r($_POST));

?>



<form name="form_" method="post" action='<?php echo $ath ?>'>
 <input type="hidden" name="role" value='<?php echo $role ?>' />
<input type="hidden" name="form" value='<?php echo $form ;?>' />	
<input  name="id" value='<?php echo $id ;?>' />	
</form>


<script type="text/javascript">
 document.getElementsByName("form_")[0].submit();
</script>


