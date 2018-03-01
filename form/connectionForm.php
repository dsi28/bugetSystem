<?php 


//$connection;
//function connect_bd(){
//global $connection;

//$user_name = "jdunn2014";
//$password_db = "CsBFghPs5C";
//$database = "jdunn2014";
//$server = "lamp.cse.fau.edu";
//
////Stablishing the connection
//$connection = mysqli_connect($server, $user_name, $password_db, $database) or die (mysql_error());
 
 //Connecting with the DB
 
//mysql_select_db($database, $connection ) or die (mysql_error());
//}

$smysql = mysqli_connect( "lamp.cse.fau.edu", "jdunn2014", "CsBFghPs5C", "jdunn2014" );


$OPS = $_POST['OPS'];
$EXP = $_POST['EXP'];
$SB = $_POST['SB'];
$OPS2 = $_POST['OPS2'];
$EXP2 = $_POST['EXP2'];
$SB2 = $_POST['SB2'];
$OPS3 = $_POST['OPS3'];
$EXP3 = $_POST['EXP3'];

$query = "INSERT INTO sportsTable(OPS, EXP, SB, OPS2, EXP2, SB2, OPS3, EXP3)
VALUES('$OPS', '$EXP', '$SB', '$OPS2', '$EXP2',  '$SB2', '$OPS3', '$EXP3')";

//'$Overhead', '$TotalExpense', '$Overhead2', '$TotalExpense2', '$Overhead3', '$TotalExpense3'

$result = mysqli_query($smysql, $query);

echo("Form Submitted");


// open the file "demosaved.csv" for writing
$file = fopen('info.csv', 'w');
 
// save the column headers
fputcsv($file, array('OPS', 'EXP', 'SB', 'OPS2', 'EXP2', 'SB2', 'OPS3', 'EXP3'));
 
// Sample data. This can be fetched from mysql too
$data = array(
    array("$OPS", "$EXP", "$SB", "$OPS2", "$EXP2", "$SB2", "$OPS3", "$EXP3"),
);
 
// save each row of the data
foreach ($data as $row)
{
    fputcsv($file, $row);
}
 
// Close the file
fclose($file);





?>

