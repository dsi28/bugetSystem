<?php 
session_start();
include 'connectionForm.php';
$form =$_POST['liveForm2'];
$id =$_POST['liveID2'];
$role = $_POST['liveRole2'];
$query="select DEPARTMENT, SB1, OPS1, OPSGA1, OPSACA1, EXP1, SB2, OPS2, OPSGA2, OPSACA2, EXP2, SB3, OPS3, OPSGA3, OPSACA3, EXP3 from uwide WHERE '".$id."'= ID AND '".$role."'= ROLE";
try{
	$result = $connection->query($query);
	$count = $result->rowCount();
	if($count<=0){//if not nessesary remove if nessary use for the other cases
		echo "No results found.";
	}}catch(execption $e){
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
		<th>DEPARTMENT</th>  
        <th>SB1</th>
        <th>OPS1</th>
        <th>OPSGA1</th>
		<th>OPSACA1</th>
		<th>EXP1</th>
		<th>SB2</th>
        <th>OPS2</th>
        <th>OPSGA2</th>
		<th>OPSACA2</th>
		<th>EXP2</th>
		<th>SB3</th>
        <th>OPS3</th>
        <th>OPSGA3</th>
		<th>OPSACA3</th>
		<th>EXP3</th> 
      </tr>
    </thead>
    <tbody>
	<?php 
        foreach($result as $rows)
        {
    ?>        
            <tr>
				<td><?php echo $rows['DEPARTMENT']; ?></td>
                <td><?php echo $rows['SB1']; ?></td>
                <td><?php echo $rows['OPS1']; ?></td>
                <td><?php echo $rows['OPSGA1']; ?></td>
				<td><?php echo $rows['OPSACA1']; ?></td>
				<td><?php echo $rows['EXP1']; ?></td>
				<td><?php echo $rows['SB2']; ?></td>
                <td><?php echo $rows['OPS2']; ?></td>
                <td><?php echo $rows['OPSGA2']; ?></td>
				<td><?php echo $rows['OPSACA2']; ?></td>
				<td><?php echo $rows['EXP2']; ?></td>
				<td><?php echo $rows['SB3']; ?></td>
                <td><?php echo $rows['OPS3']; ?></td>
                <td><?php echo $rows['OPSGA3']; ?></td>
				<td><?php echo $rows['OPSACA3']; ?></td>
				<td><?php echo $rows['EXP3']; ?></td>
            </tr>
    <?php     
        }
    ?>
    </tbody>
  </table>
	<button class="cfbutton btn btn-outline-danger" onClick="window.location='form_list.php'">EXIT</button>
  
  </div>
   
	</section>
<script>
document.getElementById("brand").innerHTML="<?php echo $_SESSION['role']; ?>";	
</script>  
	        <?php
        include("../footer.php");?>    
</body>
</html>