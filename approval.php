<?php
session_start();
include("connectionForm.php");
$form =$_POST['test'];
$id2 =$_POST['id'];
$role = $_POST['role'];

	$query9="SELECT CSAB FROM APPROVAL WHERE '".$form."'= FORM AND '".$id2."'= ID AND '".$role."'= ROLE AND CSAB='T'";
		
		
		try{
		$result9=$connection->query($query9);
		$count9 = $result9->rowCount();
		}catch(Exception $e){
			echo "Error: " . $e->getMessage();
		}



if($form=='1'){
	$ath = "uwideView.php";	
}else if($form=='2'){
	$ath = "updateForm2.php";
}else if($form=='3'){
	$ath = "updateForm3.php";
}else if($form=='4'){
	$ath = "updateForm4.php";
}
?>





?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FAU - Approval</title>

        <!-- Custom stylesheet -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
        <!-- TODO Script added to make the navbar collapse work -->
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <!-- Bootstrap core CSS -->
        <link href= "startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">

        <script>
            $(document).ready(function(){
                $('#unapproved').onmouseover( function(){
                    $('#unapproved').removeClass('btn-danger').addClass('btn-outline-danger');
                });
                $('#unapproved').onmouseout( function(){
                    $('#unapproved').removeClass('btn-outline-danger').addClass('btn-danger');


                });
            });

        </script>

  
    </head>
    <body>
        <!-- Navigation -->
        <?php 
		
		

		
		
include("navbar_signed.php");?>

        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full" style="background-image: url('pics/beach.jpg');">
            <img class="img-fluid d-block mx-auto" src="pics/Florida_Atlantic_University_monogram_logo.svg.png" alt="">
        </header>

        <!-- Content section -->
        <section class="py-5">
            <div class="container" id="create-form" class="input-group">
                <h1>Please Select An Option Below</h1>
                <br>
                <br>
                <div class="row" style="display: flex; justify-content: space-between;">
<!--
                    <form action="http://lamp.cse.fau.edu/~dizquierdo2014/SNO/php/update_approval.php" method="post">
                        <button type = "submit" class="cfbutton btn btn-success">Approve The Form</button>
                    </form>
-->
                    
                    
                    <form name="form_" method="post" action='http://lamp.cse.fau.edu/~dizquierdo2014/SNO/php/update_approval2.php'>
 <input type="hidden" name="form" value='<?php echo $form ;?>' />
<input type="hidden" name="role" value='<?php echo $role ;?>' />	
<input type="hidden" name="id" value='<?php echo $id2 ;?>' />	
                   <button type='submit' 
                            <?php if($_SESSION['role']=='ACCOUNT' && $count9== 0) {
                            ?> disabled="disabled" style="visibility: hidden;"<?php } ?>
                            name="form" class=" btn btn-primary" >APPROVE</button>


</form>
            
					
	  <form name="form_" method="post" action='http://lamp.cse.fau.edu/~dizquierdo2014/SNO/excel_form/<?php echo $ath;?>'>
<input type="hidden" name="form" value='<?php echo $form ;?>' />
<input type="hidden" name="role" value='<?php echo $role ;?>' />	
<input type="hidden" name="id" value='<?php echo $id2 ;?>' />	
                   <button type='submit' 
                            <?php if($_SESSION['role']=='ASAB' || $_SESSION['role']=='SG' || $_SESSION['role']=='AGSC' || $_SESSION['role']=='VPSA') {
                            ?> disabled="disabled" style="visibility: hidden;"<?php } ?>
                            name="form" class=" btn btn-success" >EDIT</button>

</form>						
                    
                    
                    <form>
                        <button type="button" class="cfbutton btn btn-outline-danger" id="unapproved" data-toggle="modal" data-target="#myModal">Do Not Approve The Form</button></form>                
                </div>
                <br>
                <br>
                <br>
            </div>
        </section>

		
		
			
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="ModalLabel"><span class="lead">Reason</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form class="form" action="php/reason.php" method="post">

                                <div class="form-group ">
                                    <label for="username"></label><br>
									
                                    <input type="text" class="form-control" placeholder="Enter Reason" name="reason" required>
	
                                </div>
                                       <div >
  
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                            </form>
                        </div>
                  
             
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
   <?php
        include("footer.php");
	
		
		
		?>
    </body>

	

	
	
</html>