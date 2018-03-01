<?php 

include("uwideSheet.php");
//Create an instance 
$DEPARTMENT = $_POST['department'];
$SB1 = $_POST['SB1'];
$ROLE = $_POST["role"];
$OPS1 = $_POST['OPS1'];
$OPSACA1 = $_POST['OPSACA1'];
$OPSGA1 = $_POST['OPSGA1'];
$EXP1 = $_POST['EXP1'];
$SB2 = $_POST['SB2'];
$OPS2 = $_POST['OPS2'];
$OPSACA2 = $_POST['OPSACA2'];
$OPSGA2 = $_POST['OPSGA2'];
$EXP2 = $_POST['EXP2'];
$SB3 = $_POST['SB3'];
$OPS3 = $_POST['OPS3'];
$OPSACA3 = $_POST['OPSACA3'];
$OPSGA3 = $_POST['OPSGA3'];
$EXP3 = $_POST['EXP3'];
$foo = new uwide($DEPARTMENT, $SB1,$OPS1,$OPSGA1,$OPSACA1, $EXP1,$SB2,$OPS2,$OPSGA2,$OPSACA2, $EXP2,$SB3,$OPS3,$OPSGA3,$OPSACA3, $EXP3, $ROLE);
$foo->insertValues();


?>