<?php 

session_start();
include ('connectionForm.php');
$role= $_SESSION['role'];
$form =$_POST['liveForm2'];
$id =$_POST['liveID2'];
$role = $_POST['liveRole2'];
$asab = $_POST['TEST'];
$sg = $_POST['TEST2'];
$csab = $_POST['TEST3'];
$agsc = $_POST['TEST4'];
$vpsa = $_POST['TEST5'];
$id2='';



//echo $id;
//$query = "SELECT I.NAME AS INAME, I.AMOUNT AS IAMOUNT, E.NAME AS ENAME, E.AMOUNT AS EAMOUNT, O.NAME AS ONAME, O.AMOUNT AS OAMOUNT, R.P_TIN, R.P_OUT, R.P_EXP, R.T_INT_COMMENT, R.EXP_COMMENT_1, R.EXP_COMMENT_2, R.EXP_COMMENT_3, R.EXP_COMMENT_4, R.T_OUT_COMMENTFROM reserveFund R, transfersIn I, transfersOut O, expenses E WHERE '".$role."' = R.ROLE AND '".$id."' =R.ID  AND R.ID = I.T_ID AND R.ID = O.T_ID AND R.ID = E.T_ID AND R.ROLE = I.ROLE AND R.ROLE = O.ROLE AND R.ROLE = E.ROLE";

	
//$query= "SELECT * FROM  reserveFund where '".$role."' = ROLE AND '".$id."' =ID";

$query= "SELECT * FROM  reserveFund R, transfersIn I  where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = I.ROLE AND R.ID= I.T_ID ";
$query2= "SELECT * FROM  reserveFund R, transfersIn I  where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = I.ROLE AND R.ID= I.T_ID ";
$query3= "SELECT R.ID as RID FROM  reserveFund R, transfersIn I  where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = I.ROLE AND R.ID= I.T_ID";
	
//$result=mysqli_query($smysql, $query);

try{
	$result = $connection->query($query);
	$result2 = $connection->query($query2);
	$result3 = $connection->query($query3);
	
	$count = $result->rowCount();
	
	foreach($result3 as $row){
		$id2 = $row['RID'];
	}
	if($count<=0){//if not nessesary remove if nessary use for the other cases
		echo "No results found.";
	}}catch(execption $e){
	echo "Error: " . $e->getMessage();
}

	$query9="SELECT CSAB FROM APPROVAL WHERE '".$form."'= FORM AND '".$id2."'= ID AND '".$role."'= ROLE AND CSAB='T'";
		
		
		try{
		$result9=$connection->query($query9);
		$count9 = $result9->rowCount();
		}catch(Exception $e){
			echo "Error: " . $e->getMessage();
		}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>FAU - Reserve </title>
        <!-- Custom stylesheet -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="../startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
        <!-- TODO Script added to make the navbar collapse work -->
        <script src="../startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href= "../startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
        <link href="../css/stylesheet.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="../pics/FAU-icon.ico" />
    </head>	

<body>
		<?php 
        include("../form_navbar_signed.php");?>
		<br><br>
        <header class="py-5 bg-image-full" style="background-image: url('../pics/beach.jpg');">
            <img class="img-fluid d-block mx-auto" src="../pics/Florida_Atlantic_University_monogram_logo.svg.png" alt="">
        </header>	
<section class="py-5" id="create-form">  
<div class="container" a>
	<h2 class="text-center">Reserve Fund</h2> 		
  <table class="table" style="width: 80%; align: center;">
    <thead>
      <tr>
		<th>NAME</th>
		 <th>AMOUNT</th> 
		<th>P_TIN</th>  
        <th>P_OUT</th>
        <th>P_EXP</th>
		<th>T_INT_COMMENT</th>
		<th>EXP_COMMENT_1</th>
	    <th>EXP_COMMENT_2</th>
		<th>EXP_COMMENT_3</th>
      </tr>
    </thead>
    <tbody>
	<?php 
        foreach($result as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['NAME']; ?></td>
				<td><?php echo $rows['AMOUNT']; ?></td>
                <td><?php echo $rows['P_TIN']; ?></td>
				<td><?php echo $rows['P_OUT']; ?></td>
                <td><?php echo $rows['P_EXP']; ?></td>
				<td><?php echo $rows['T_INT_COMMENT']; ?></td>
				<td><?php echo $rows['EXP_COMMENT_1']; ?></td>
				<td><?php echo $rows['EXP_COMMENT_2']; ?></td>
				<td><?php echo $rows['EXP_COMMENT_3']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
  </table>
  
  
    <table class="table" style="width: 80%; align: center;">
    <thead>
      <tr>
		<th>EXP_COMMENT_4</th>
		<th>T_OUT_COMMENT</th>
      </tr>
    </thead>
    <tbody>
	<?php 
        foreach($result2 as $rows)
        {
    ?>        
            <tr>

				<td><?php echo $rows['EXP_COMMENT_4']; ?></td>
                <td><?php echo $rows['T_OUT_COMMENT']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
  </table>
	
	<div class="row" style="display: flex; justify-content: space-between;">
<form name="form_" method="post" action='../approval.php'>
 <input type="hidden" name="test" value='<?php echo $form ;?>' />	
<input type="hidden" name="role" value='<?php echo $role ;?>' />	
<input type="hidden" name="id" value='<?php echo $id2 ;?>' />	
    <button type='submit' 
                            <?php if($_SESSION['role']=='ACCOUNT' && $count9==0 || $_SESSION['role']=='ASAB' && $asab == 'T' || $_SESSION['role'] == 'SG' && $sg == 'T' || $_SESSION['role'] == 'CSAB' && $csab == 'T' || $_SESSION['role'] == 'AGSC' && $agsc == 'T' || $_SESSION['role'] == 'VPSA' && $vpsa == 'T') {
                            ?> disabled="disabled" style="visibility: hidden;"<?php } ?>
                            name="form" class=" btn btn-primary" >APPROVE</button>
					


</form>

<button class="cfbutton btn btn-outline-danger" onClick="window.location='form_list.php'">EXIT</button>


	</div>



 
  </div>
	</section>
<script>
document.getElementById("brand").innerHTML="<?php echo $_SESSION['role']; ?>";	
</script>  
	        <?php
        include("../footer.php");?>
</body>
</html>