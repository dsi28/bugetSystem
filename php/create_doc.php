<?php
// acount maanger 234
//asab 1234
//cbac 1234
//advisors 1234
session_start();
include('connectionForm.php');
date_default_timezone_set("America/New_York");   //setting the time zone to Eastern
$role = $_SESSION['role'];
$form = $_POST['form'];             
$date = date("Y-m-d H:i:s");
$docID = ""
$create_doc= "INSERT INTO DOCS(ROLE, FORM, TIME_STAMP) VALUES('".$role."', '".$form."', '".$date."')" ;
if($form == 'form1'){
    $url= 'http://lamp.cse.fau.edu/~dizquierdo2014/SNO/excel_form/form_1.php';
}else if($form == 'form2'){
    $url= 'http://lamp.cse.fau.edu/~dizquierdo2014/SNO/excel_form/form_2.html';
}else if($form == 'form3'){
    $url= 'http://lamp.cse.fau.edu/~dizquierdo2014/SNO/excel_form/form3.html';
}else if($form == 'form4'){
   // $url= 'exel_form/form_1.php';
}
$query = "SELECT ID FROM DOCS WHERE ROLE = '".$role."' AND FORM = '".$form."' AND DATE = '".$date."'";
try{
	$result=$connection->query($query);
	for each($result as $row){
		$docID = $row[ID];
	}
}catch(execption $e){
	echo "Error: " . $e->getMessage();
}

$create_approval= "INSERT INTO APPROVAL(ROLE, FORM, ID) VALUES('".$role."', '".$form."','".$docID."')" ;
try{
	$connection->exec($$create_approval);
}catch(execption $e){
	echo "Error" . $e->getMessage();	
}

//header("location:$url");
?>