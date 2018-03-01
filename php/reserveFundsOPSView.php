<?php 

session_start();

include 'connectionForm.php';
$form =$_POST['liveForm2'];
$id =$_POST['liveID2'];
$role = $_POST['liveRole2'];

$query="select R.ID, P.TITLE, P.FAUSTUDENT, P.HOURLYRATE, P.HOURS_WEEK, P.WEEKS_YEAR, P.PEOPLE_IN_POSITION, R.REVENUE, R.REVENUE_COMMENT, R.T_IN, R.T_IN_COMMENT, R.OPS, R.OPS_COMMENT, R.T_OUT, R.T_OUT_COMMENT, E.SUPPORT, E.FOOD, E.PROGRAMS, E.OTHER FROM reserveFundsOPS R, reserveFundsOPSPosition P, reserveFundsOPSExpenses E WHERE '".$role."' = R.ROLE AND '".$id."' = R.ID and R.ID = P.T_ID AND R.ID = E.T_ID AND R.ROLE = P.ROLE AND R.ROLE = E.ROLE";
$query2= $query;

$query3="select R.ID as RID FROM reserveFundsOPS R, reserveFundsOPSPosition P, reserveFundsOPSExpenses E WHERE '".$role."' = R.ROLE AND '".$id."' = R.ID and R.ID = P.T_ID AND R.ID = E.T_ID AND R.ROLE = P.ROLE AND R.ROLE = E.ROLE";
$docID='';
try{
	$result = $connection->query($query);
	$result2= $connection->query($query2);
	$result3= $connection->query($query3);
	$count = $result->rowCount();
	foreach($result3 as $rows){
		$docID=$rows['RID'];
	}
	if($count<=0){//if not nessesary remove if nessary use for the other cases
		echo "No results found.";
	}}catch(execption $e){
	echo "Error: " . $e->getMessage();
}

	$query9="SELECT CSAB FROM APPROVAL WHERE '".$form."'= FORM AND '".$docID."'= ID AND '".$role."'= ROLE AND CSAB='T'";
	echo $query9;
		
		try{
		$result9=$connection->query($query9);
		$count9 = $result9->rowCount();
		}catch(Exception $e){
			echo "Error: " . $e->getMessage();
		}

?>
<!doctype html>
<html>
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
<div class="container">
	<h2 class="text-center">Reserve Fund OPS</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>ID</th>
	    <th>TITLE</th>
		<th>FAUSTUDENT</th>
		<th>HOURLYRATE</th>
		<th>HOURS_WEEK</th>
		<th>WEEKS_YEAR</th>
		<th>PEOPLE_IN_POSITION</th>  
		<th>REVENUE</th>
		<th>REVENUE_COMMENT</th>  
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['ID']; ?></td>
                <td><?php echo $rows['TITLE']; ?></td>
                <td><?php echo $rows['FAUSTUDENT']; ?></td>
                <td><?php echo $rows['HOURLYRATE']; ?></td>
				<td><?php echo $rows['HOURS_WEEK']; ?></td>
				<td><?php echo $rows['WEEKS_YEAR']; ?></td>
				<td><?php echo $rows['PEOPLE_IN_POSITION']; ?></td>
				<td><?php echo $rows['REVENUE']; ?></td>
                <td><?php echo $rows['REVENUE_COMMENT']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
  </table>
	
	
	<table class="table table-bordered">
    <thead>
      <tr> 
        <th>T_IN</th>
        <th>T_IN_COMMENT</th>
        <th>OPS</th>
		<th>OPS_COMMENT</th>
		<th>T_OUT</th>
		<th>T_OUT_COMMENT</th>
		<th>SUPPORT</th>
		<th>FOOD</th>
		<th>PROGRAMS</th>
		<th>OTHER</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result2 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['T_IN']; ?></td>
                <td><?php echo $rows['T_IN_COMMENT']; ?></td>
                <td><?php echo $rows['OPS']; ?></td>
				<td><?php echo $rows['OPS_COMMENT']; ?></td>
				<td><?php echo $rows['T_OUT']; ?></td>
				<td><?php echo $rows['T_OUT_COMMENT']; ?></td>
                <td><?php echo $rows['SUPPORT']; ?></td>
				<td><?php echo $rows['FOOD']; ?></td>
				<td><?php echo $rows['PROGRAMS']; ?></td>
				<td><?php echo $rows['OTHER']; ?></td>
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
<input type="hidden" name="id" value='<?php echo $docID ;?>' />	
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