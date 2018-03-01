<?php
//Initialize PHP session as the user should be authenticated before accessing main.php
session_start();
If(!($_SESSION['authenticated'] == 'YES' && isset($_SESSION['uid']))){
//If the user is not authenticated, redirect it to index.php
?>
<form name="form_" method="post" action="index.php">
<input type="hidden" name="msg_error" value="2">
</form>
<script type="text/javascript">
document.getElementByName("form_")[0].submit();
</script>
<?php
}

include("connect_bd.php"); //If BD connection required

?>
<html>
<head></head>
<body>
<h1>Main content of the web</h1>


</body>
</html>
