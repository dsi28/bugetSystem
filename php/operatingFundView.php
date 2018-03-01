<?php 

session_start();

include 'connectionForm.php';
$role= $_SESSION['role'];
$form =$_POST['liveForm2'];
$id =$_POST['liveID2'];
$role = $_POST['liveRole2'];
$asab = $_POST['TEST'];
$sg = $_POST['TEST2'];
$csab = $_POST['TEST3'];
$agsc = $_POST['TEST4'];
$vpsa = $_POST['TEST5'];

//$query="SELECT * 	FROM operatingFund O, fauAMP A, fauSP S, fauOPS P, fauOPSGA G, FAUExpenses E, FAUComments C, FAUT_OUT T  		WHERE '".$role."' = O.ROLE AND '".$id."' = O.ID and O.ID = A.ID AND O.ID = S.ID AND O.ID = P.ID AND O.ID = G.ID AND O.ID = E.ID AND O.ID = C.ID AND O.ID = T.ID AND	AND O.ROLE = A.ROLE AND O.ROLE = S.ROLE AND O.ROLE = P.ROLE AND O.ROLE = G.ROLE AND O.ROLE = E.ROLE AND O.ROLE = C.ROLE AND O.ROLE = T.ROLE";
$query1= "SELECT * FROM operatingFund WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query2="SELECT * FROM fauAMP WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query3="SELECT * FROM fauSP WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query4="SELECT * FROM fauOPS WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query5="SELECT * FROM fauOPSGA WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query6="SELECT * FROM FAUExpenses WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query7="SELECT * FROM FAUComments WHERE '".$role."' = ROLE AND '".$id."' = ID";
$query8="SELECT * FROM FAUT_OUT WHERE '".$role."' = ROLE AND '".$id."' = ID";

try{
	$result1 = $connection->query($query1);
	$result2 = $connection->query($query2);
	$result3 = $connection->query($query3);
	$result4 = $connection->query($query4);
	$result5 = $connection->query($query5);
	$result6 = $connection->query($query6);
	$result7 = $connection->query($query7);
	$result8 = $connection->query($query8);
	//$count = $result->rowCount();
	//if($count<=0){//if not nessesary remove if nessary use for the other cases
		//echo "No results found.";
	//}
}catch(execption $e){
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
			
  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>Smart Tag</th>
	    <th>Account Manager</th>
		<th>Manager Name</th>
		<th>Manager Signature</th>
		<th>Manager Telephone</th>
		<th>Manager Email</th>
		<th>Salaries Benifits</th>  
		<th>Graduate Assistant</th>
		<th>OPS</th>  
        <th>Expenses</th>
        <th>T_OUT</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result1 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['SMARTTAG']; ?></td>
                <td><?php echo $rows['ACCOUNTMANAGER']; ?></td>
                <td><?php echo $rows['MANAGER_NAME']; ?></td>
                <td><?php echo $rows['MANAGER_SIGNATURE']; ?></td>
				<td><?php echo $rows['MANAGER_TELEPHONE']; ?></td>
				<td><?php echo $rows['MANAGER_EMAIL']; ?></td>
				<td><?php echo $rows['SALARIES_BENEFITS']; ?></td>
				<td><?php echo $rows['GRADUATE_ASSISTANT']; ?></td>
                <td><?php echo $rows['OPS']; ?></td>
				<td><?php echo $rows['EXPENSES']; ?></td>
                <td><?php echo $rows['T_OUT']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
	  
	  
  </table>
	
	
  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>Postion Number</th>
	    <th>Postition Title</th>
		<th>FTE</th>
		<th>Anual Rate</th>
		<th>State</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result2 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['POSITION_NUMBER']; ?></td>
                <td><?php echo $rows['POSITION_TITLE']; ?></td>
                <td><?php echo $rows['FTE']; ?></td>
                <td><?php echo $rows['ANNUAL_RATE']; ?></td>
				<td><?php echo $rows['STATE']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
	  
	  
  </table>	
	
	  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>Postion Number</th>
	    <th>Postition Title</th>
		<th>FTE</th>
		<th>Anual Rate</th>
		<th>State</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result3 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['POSITION_NUMBER']; ?></td>
                <td><?php echo $rows['POSITION_TITLE']; ?></td>
                <td><?php echo $rows['FTE']; ?></td>
                <td><?php echo $rows['ANNUAL_RATE']; ?></td>
				<td><?php echo $rows['STATE']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
	  
	  
  </table>	
	
	  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>TITLE</th>
		  <th>FAUSTUDENT</th>
	    <th>HOURLYRATE</th>
		<th>HOUR_WEEK</th>
		<th>WEEKS_YEAR</th>
		<th>PEOPLE_IN_POSITION</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result4 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['TITLE']; ?></td>
                <td><?php echo $rows['FAUSTUDENT']; ?></td>
                <td><?php echo $rows['HOURLYRATE']; ?></td>
                <td><?php echo $rows['HOURS_WEEK']; ?></td>
				<td><?php echo $rows['WEEKS_YEAR']; ?></td>
				<td><?php echo $rows['PEOPLE_IN_POSITION']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
	  
	  
  </table>	
	
	
		  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>TITLE</th>
		  <th>HOURLYRATE</th>
	    <th>HOUR_WEEK</th>
		<th>WEEKS_YEAR</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result5 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['TITLE']; ?></td>
                <td><?php echo $rows['HOURLYRATE']; ?></td>
                <td><?php echo $rows['HOURS_WEEK']; ?></td>
				<td><?php echo $rows['WEEKS_YEAR']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
	  
	  
  </table>	
	
	
		
		  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>NAME</th>
		  <th>AMOUNT</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result6 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['NAME']; ?></td>
                <td><?php echo $rows['AMOUNT']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
	  
	  
  </table>
	

	
	
			  <table class="table table-bordered">
    <thead>
      <tr>
		 <th>SUBJECT</th>
		  <th>AMOUNT</th>
      </tr>
    </thead>
    <tbody>
		
	<?php 
        foreach($result8 as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['SUBJECT']; ?></td>
                <td><?php echo $rows['AMOUNT']; ?></td>
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
<input type="hidden" name="id" value='<?php echo $id ;?>' />	
    <button type='submit' 
                            <?php if($_SESSION['role']=='ACCOUNT' || $_SESSION['role']=='ASAB' && $asab == 'T' || $_SESSION['role'] == 'SG' && $sg == 'T' || $_SESSION['role'] == 'CSAB' && $csab == 'T' || $_SESSION['role'] == 'AGSC' && $agsc == 'T' || $_SESSION['role'] == 'VPSA' && $vpsa == 'T') {
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