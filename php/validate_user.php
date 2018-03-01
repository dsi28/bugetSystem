
<?php
include("connect_bd.php");
//$password = $_POST["password"];
$user = $_POST['user'];
$password = $_POST['password'];
connect_bd();

$sql_query= "SELECT ROLE FROM USER_TABLE WHERE USER_NAME = '".$user."' AND PASSW = '".$password."' " ; //AND role = '".$role."'  "; //If not, do more tables and use INNER JOIN on role to improve security

//Creating the statement for retrieving data
$stmt = $conn->prepare($sql_query);
$stmt->execute();
//If we can get a row from the DB, we authenticate the user
//Seeing the resulting array in associative
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
if(count($result)>0){
 $row = $result[0];
 //Store the id of the user
 $uid = $user;
 //  echo($row["personID"]);

 //Starts the session on PHP

 if(isset($_SESSION['role'])){
  $_SESSION = array();
  //Destroy all variables in the session
  session_unset();

  //Destroy the session
  session_destroy();

 }
 session_start();
 $_SESSION['authenticated'] = 'YES';
 $_SESSION['uid'] = $uid;

 //Store the role of the user
 $_SESSION['role'] = $row['ROLE'];
 //Select where to redirect the user
 $ath = null;
// echo "in";
 switch ($row['ROLE']) {
  case 'CEO':
   $ath="main.php";
   break;
  case 'ASAB' :
   $ath = "../asab.php";
   break;
  case 'CSAB' :
   $ath = "../csab.php";
   break;
  case 'SG' :
   $ath = "../sg-advisors.php";
   break;
  case 'AGSC' :
   $ath = "../agsc.php";
   break;
  case 'ACCOUNT' :
   $ath = "../manager.php";
   break;
  case 'VPSA' :
   $ath = "../vpsa.php";
   break;
 }
?>
<!-- Create a form to redirect the use in case a row with their credentials exist, sending his id hidden-->

<form name="form_" method="post" action='<?php echo $ath ?>'>
 <input type="hidden" name="role" value='<?php echo $role ?>' />
</form>

<?php
}else {
 //If the row does not exist, we redirect the user to the main page as the log in has been unsuccessesful
?>

<!--  <form name="form_" method="post" action="index.php">
<input type="hidden" name="msg_error" value='1' />
</form>-->

<?php
 $conn = null;
 include("end_session.php");
}


?>


<!-- Submit the created form -->
<script type="text/javascript">
 document.getElementsByName("form_")[0].submit();
</script>
