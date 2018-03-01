<?php
session_start();
if(!isset($_SESSION['role']) and !$_SESSION['authenticated'] == 'YES'){
 header("Location: index.php");
}

?>
