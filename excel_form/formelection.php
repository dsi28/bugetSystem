<?php 
session_start();
include('connectionForm.php');

$form = $_POST['id'];
date_default_timezone_set("America/New_York");   //setting the time zone to Eastern
$role = $_SESSION['role'];            
$date= date("Y-m-d H:i:s");
$ID="";
$create_doc= "INSERT INTO DOCS(ROLE, FORM, APPROVED, TIME_STAMP) VALUES('".$role."', '".$form."', 'N','".$date."')" ;

try{
	$connection->exec($create_doc);
}catch(Exception $e){
	echo $e->getMessage();
}
$query = "select ID from DOCS where '".$role."' = ROLE and '".$form."' = FORM and '".$date."' = TIME_STAMP";
try{
	$result= $connection->query($query);
	foreach($result as $rows){
		$ID = $rows['ID'];
	}
}catch(Exception $e){
	echo $e->getMessage();
}


$create_approval="INSERT INTO APPROVAL(ROLE, FORM, ID) VALUES('".$role."', '".$form."', '".$ID."')" ;
try{
	$connection->exec($create_approval);
}catch(Exception $e){
	echo $e->getMessage();
}

switch($form){
	case '1':
        $_SESSION['form'] = 'form1';
        $_SESSION['timestamp'] = $date;
        echo "excel_form/form_1.php";
        break;
    case '2':
        $_SESSION['form'] = 'form2';
        $_SESSION['timestamp'] = $date;
        echo "excel_form/form_2.php";
        break;
    case '3':
        $_SESSION['form'] = 'form3';
        $_SESSION['timestamp'] = $date;
        echo "excel_form/form3.php";
        break;
    case '4':
        $_SESSION['form'] = 'form4';
        $_SESSION['timestamp'] = $date;
        echo "excel_form/form4.php";
        break;

}


?>