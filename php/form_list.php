<?php 
session_start();
$user= $_SESSION['uid'];
$role= $_SESSION['role'];
$approve = "A.".$role;
include("connectionForm.php");
switch ($role) {
	case 'ASAB' :
		$query= "SELECT D.ROLE, D.ID, D.FORM, D.TIME_STAMP, A.ACCOUNT, A.ASAB, A.CSAB, A.SG, A.AGSC, A.VPSA FROM DOCS D, APPROVAL A WHERE D.FORM = A.FORM AND D.ID = A.ID AND D.ROLE = A.ROLE AND A.ACCOUNT = 'T'";
		$ath = "asab.php";
		break;
	case 'CSAB' :
		$query= "SELECT D.ROLE, D.ID, D.FORM, D.TIME_STAMP, A.ACCOUNT, A.ASAB, A.CSAB, A.SG, A.AGSC, A.VPSA FROM DOCS D, APPROVAL A WHERE D.FORM = A.FORM AND D.ID = A.ID AND D.ROLE = A.ROLE AND ((A.ASAB = 'T' AND A.ACCOUNT = 'T' AND A.SG = 'T') OR A.CSAB='E' OR A.CSAB='T') ";
		$ath = "csab.php";
		break;
	case 'SG' :
		$query= "SELECT D.ROLE, D.ID, D.FORM, D.TIME_STAMP, A.ACCOUNT, A.ASAB, A.CSAB, A.SG, A.AGSC, A.VPSA FROM DOCS D, APPROVAL A WHERE D.FORM = A.FORM AND D.ID = A.ID AND D.ROLE = A.ROLE AND (A.SG IS NULL OR A.SG='E' OR A.SG='T')";
		$ath = "sg-advisors.php";
		break;
	case 'AGSC' :
		$query= "SELECT D.ROLE, D.ID, D.FORM, D.TIME_STAMP, A.ACCOUNT, A.ASAB, A.CSAB, A.SG, A.AGSC, A.VPSA FROM DOCS D, APPROVAL A WHERE D.FORM = A.FORM AND D.ID = A.ID AND D.ROLE = A.ROLE AND ((A.ASAB = 'T' AND A.ACCOUNT = 'T' AND A.SG = 'T' AND A.CSAB = 'T') OR A.AGSC = 'T')";
		$ath = "agsc.php";
		break;
	case 'ACCOUNT' :
		$query= "SELECT D.ROLE, D.ID, D.FORM, D.TIME_STAMP, A.ACCOUNT, A.ASAB, A.CSAB, A.SG, A.AGSC, A.VPSA FROM DOCS D, APPROVAL A WHERE D.FORM = A.FORM AND D.ID = A.ID AND D.ROLE = A.ROLE AND (A.ACCOUNT = 'T' OR A.CSAB='T')";
		$ath = "manager.php";
		break;
		
	case 'VPSA' :
		$query= "SELECT D.ROLE, D.ID, D.FORM, D.TIME_STAMP, A.ACCOUNT, A.ASAB, A.CSAB, A.SG, A.AGSC, A.VPSA FROM DOCS D, APPROVAL A WHERE D.FORM = A.FORM AND D.ID = A.ID AND D.ROLE = A.ROLE AND ((A.ASAB = 'T' AND A.ACCOUNT = 'T' AND A.SG = 'T' AND A.CSAB = 'T' AND A.AGSC = 'T') OR A.VPSA = 'T')";
		break;
}
try{
	$result = $connection->query($query);
	$count = $result->rowCount();
//	foreach($result as $row){
//		echo $row['ID'];
//			
//	}
//	
	if($count<=0){//if not nessesary remove if nessary use for the other cases
		echo "No results found.";
	}}catch(execption $e){
	echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>FAU - Form List</title>
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
		
		<h2>Documents</h2>            
		<table class="table">
			<thead>
				<tr>
					<th>Document ID</th>
					<th>Form type</th>
					<th>Last changed</th>
					<th>AM</th>
					<th>ASAB</th>
					<th>SG</th>
					<th>CSAB</th>
					<th>AGSC</th>
					<th>VPSA</th>
				</tr>
			</thead>
			<tbody>
				<?php
//				$array = array();
//				$array2 = array();
//				$count2 = 0;
				foreach($result as $rows)

				{
					//On page 1
					$_SESSION['liveID'] = $rows['ID'];
//					$array[$count2] = $rows['ID'];
//					$array2[$count2] = $rows['FORM'];
					$account = $rows['ACCOUNT'];
					$asab = $rows['ASAB'];
				
					if($rows['FORM'] == 1)
					{
						$account = "Final";
						$asab = "Draft";
					
					}
					
				?>        
				<tr>
					<td><?php echo $rows['ID']; ?></td>
					<td><?php echo $rows['FORM']; ?></td>
					<td><?php echo $rows['TIME_STAMP']; ?></td>
					<td><?php echo $account; ?></td>
					<td><?php echo $asab; ?></td>
					<td><?php echo $rows['SG']; ?></td>
					<td><?php echo $rows['CSAB']; ?></td>
					<td><?php echo $rows['AGSC']; ?></td>
					<td><?php echo $rows['VPSA']; ?></td>
					<td><form action="goView.php" method="post">
						<input type="hidden" name="liveID" id="url" value='<?php echo $rows['ID']; ?>'>
						<input type="hidden" name="liveForm"  value='<?php echo $rows['FORM']; ?>'>
						<input type="hidden" name="liveRole"  value='<?php echo $rows['ROLE']; ?>'>
						<input type="hidden" name="TEST"  	value='<?php echo $rows['ASAB']; ?>'>
						<input type="hidden" name="TEST2"  	value='<?php echo $rows['SG']; ?>'>
						<input type="hidden" name="TEST3"  	value='<?php echo $rows['CSAB']; ?>'>
						<input type="hidden" name="TEST4"  	value='<?php echo $rows['AGSC']; ?>'>
						<input type="hidden" name="TEST5"  	value='<?php echo $rows['VPSA']; ?>'>
						<button type="submit" class="cfbutton btn btn-info">View</button>
<!--						<button type="button" class="btn btn-primary mt-2" onclick="helloWorld()"> test</button>-->
						</form>
					</td>
				</tr>
				<?php
				//$count2 = $count2 + 1; 	
				}
				?>
			</tbody>
		</table>
			<div class="row" style="display: flex; justify-content: space-between;">
			<button class="cfbutton btn btn-outline-danger" onClick="window.location='http://lamp.cse.fau.edu/~dizquierdo2014/SNO/<?php echo $ath; ?>'">EXIT</button>	
			</div>

	</div>
		</section>
		       
        <script> document.getElementById("brand").innerHTML="<?php echo $_SESSION['role']; ?>";
 				
        </script> 
		
		<script type="text/javascript">
			
//	   		function helloWorld(){
//				
//				var count = <?php // echo $count?>;
//	   			for(i = 0; i < count; i++){
//		 			alert( 'Hello, world!' );
//	   			}
//	   		}
//			helloWorld();
	   	 
		
		
		</script>
		
        <?php
        include("../footer.php");?>
		</body>
</html>


