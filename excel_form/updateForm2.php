<?php
session_start();
include ('connectionForm.php');
$role= $_SESSION['role'];
$form =$_POST['form'];
$id =$_POST['id'];
$role = $_POST['role'];
//$asab = $_POST['TEST'];
$id2='';
//$query= "SELECT I.NAME AS INAME, I.AMOUNT AS IAMOUNT, E.NAME AS ENAME, E.AMOUNT AS EAMOUNT, O.NAME AS ONAME, O.AMOUNT AS OAMOUNT, R.P_TIN AS RP_TIN, R.P_OUT AS  RP_OUT, R.P_EXP AS RP_EXP, R.T_INT_COMMENT AS RT_INT_COMMENT, R.EXP_COMMENT_1 AS REXP_COMMENT_1, R.EXP_COMMENT_2 AS REXP_COMMENT_2, R.EXP_COMMENT_3 AS REXP_COMMENT_3, R.EXP_COMMENT_4 AS REXP_COMMENT_4, R.T_OUT_COMMENT AS RT_OUT_COMMENT FROM  reserveFund R, transfersIn I, transfersOut O, expenses E where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = I.ROLE AND R.ID= I.T_ID AND R.ROLE = O.ROLE AND R.ID= O.T_ID AND R.ROLE = E.ROLE AND R.ID= E.T_ID";

$query1= "SELECT I.NAME AS INAME, I.AMOUNT AS IAMOUNT FROM  reserveFund R, transfersIn I where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = I.ROLE AND R.ID= I.T_ID";

$query2= "SELECT E.NAME AS ENAME, E.AMOUNT AS EAMOUNT FROM  reserveFund R, expenses E where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = E.ROLE AND R.ID= E.T_ID";

$query3= "SELECT O.NAME AS ONAME, O.AMOUNT AS OAMOUNT FROM  reserveFund R, transfersOut O where '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ROLE = O.ROLE AND R.ID= O.T_ID";

$query4= "SELECT R.P_TIN AS RP_TIN, R.P_OUT AS  RP_OUT, R.P_EXP AS RP_EXP, R.T_INT_COMMENT AS RT_INT_COMMENT, R.EXP_COMMENT_1 AS REXP_COMMENT_1, R.EXP_COMMENT_2 AS REXP_COMMENT_2, R.EXP_COMMENT_3 AS REXP_COMMENT_3, R.EXP_COMMENT_4 AS REXP_COMMENT_4, R.T_OUT_COMMENT AS RT_OUT_COMMENT FROM  reserveFund R where '".$role."' = R.ROLE AND '".$id."' = R.ID";

try{
	$result1 = $connection->query($query1);
	$result2 = $connection->query($query2);
	$result3 = $connection->query($query3);
	$result4 = $connection->query($query4);
	$countT = $result1->rowCount();
	$countEXP = $result2->rowCount();
	$countO = $result3->rowCount();
	$countREST = $result4->rowCount();
	
//	if($count<=0){//if not nessesary remove if nessary use for the other cases
//		echo "No results found.";
//	}
}catch(execption $e){
	echo "Error: " . $e->getMessage();
}
?>



<!doctype html>
<html>
 <head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FAU - Form</title>
  <!-- Custom stylesheet -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
  <!-- TODO Script added to make the navbar collapse work -->
  <script src="../startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href= "../startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
  <link href="../css/stylesheet.css" rel="stylesheet">
  <style>


  </style>
 </head>

 <body>
	 <?php  include("../form_navbar_signed.php");?>
	<?php 
	 $arrayI1 = array();
	 $arrayI2 = array();
	 $arrayE1 = array();
	 $arrayE2 = array();
	 $arrayO1 = array();
	 $arrayO2 = array();
	 $count1 = 0;
	 $count2 = 0;
	 $count3 = 0;
	 $count4 = 0;
	 
	 
        foreach($result1 as $rows)
        {
			$arrayI1[$count1] = $rows['INAME'];
			$arrayI2[$count1] = $rows['IAMOUNT'];
			$count1 = $count1 + 1;
		}
	 
	 	foreach($result2 as $rows)
        {
			$arrayE1[$count2] = $rows['ENAME'];
			$arrayE2[$count2] = $rows['EAMOUNT'];
			$count2 = $count2 + 1;
		}

		foreach($result3 as $rows)
		{
				$arrayO1[$count3] = $rows['ONAME'];
				$arrayO2[$count3] = $rows['OAMOUNT'];
	 			$count3= $count3 + 1;
		}
		
	 	
	 	foreach($result4 as $rows)
		{
			$P_TIN = $rows['RP_TIN'];
			$RP_OUT = $rows['RP_OUT'];
            $RP_EXP = $rows['RP_EXP'];
			$RT_INT = $rows['RT_INT_COMMENT']; 
			$REXP1 = $rows['REXP_COMMENT_1']; 
			$REXP2 = $rows['REXP_COMMENT_2'];
			$REXP3 = $rows['REXP_COMMENT_3']; 
			$RT_OUT = $rows['RT_OUT_COMMENT']; 
			$REXP4 = $rows['REXP_COMMENT_4'];
			$count4 = $count4 + 1;
			
		}

    ?>        

	 
	 <div id="top"></div>
  <div class="container">

  <form id="uwide2" method="post" action="reserve2.php">
<input type="hidden" name="form" value='<?php echo $form ;?>' />
<input type="hidden" name="role" value='<?php echo $role ;?>' />	
<input  name="id" value='<?php echo $id ;?>' />
<br><br><br>
  <h1>Reserve Fund Summary &amp; Detail</h1>

  <h3>TRANSFERS IN : 2018-2019 Requested Budget</h3>
  <div class="form-group">
   <label for="transfersIn" class="col-sm-2 col-form-label">Transfers In from TAG(s):</label>
   <div class="row  transferIn" >
    <div class="col-5">
     <input type="text" name="transfersInName"  id="transfersInName" class="form-control" placeholder="Transfers In (Subject)" value = "<?php echo $arrayI1[0]; ?>">
    </div>
    <div class="col-5">
     <input type="text" name="transfersInValue"  id="transfersInValue" class="form-control" placeholder="Amount" value = "<?php echo $arrayI2[0]; ?>">
    </div>
   </div>
  </div>

  <h3>EXPENSES : 2018-2019 Requested Budget</h3>
  <div class="form-group ">
   <label for="expenses" class="col-sm-2 col-form-label">Expenses:</label>
   <div class="row Expenses">
    <div class="col-5">
     <input type="text" name="expensesName" class="form-control"  id="expensesName" placeholder="Expenses(Subject)" value = "<?php echo $arrayE1[0]; ?>">
    </div>
    <div class="col-5">
     <input type="text" name="expensesValue" class="form-control"  id="expensesValue" placeholder="Amount" value = "<?php echo $arrayE2[0]; ?>">
    </div>
   </div>
  </div>

	  <?php echo $arrayO2[0] ;?>
	  
  <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
  <div class="form-group ">
   <label for="transfersOut" class="col-sm-2 col-form-label">Transfers Out from TAG(s):</label>
   <div class="row  transferOut" >
    <div class="col-5">
     <input type="text" name="transfersOutName"  id="transfersOutName" class="form-control" placeholder="Transfers Out(Subject)" value = "<?php echo $arrayO1[0]; ?>">
    </div>
    <div class="col-5">
     <input type="text" name="transfersOutValue"  id="transfersOutValue" class="form-control" placeholder="Amount" value = "<?php echo $arrayO2[0]; ?>">
    </div>
   </div>
  </div>
 

  <br>

  <h1>Supplemental Form: Reserve</h1>

  <h3>TRANSFERS IN : 2017-2018 Approved Budget</h3>
  <div class="form-group row">
   <label for="transfersIn2" class="col-sm-2 col-form-label">Transfers In</label>
   <div class="col-sm-10">
    <input type="text" name="ptransfersIn" class="form-control" id="ptransfersIn2" placeholder="Transfers In" value = "<?php echo $P_TIN; ?>">
   </div>
  </div>

  <h3>EXPENSES : 2018-2019 Requested Budget</h3>
  <div class="form-group row">
   <label for="expenses2" class="col-sm-2 col-form-label">Expenses</label>
   <div class="col-sm-10">
    <input type="text" name="p_expenses" class="form-control"  id="p_expenses2" placeholder="Expenses" value = "<?php echo $RP_EXP; ?>">
   </div>
  </div>

  <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
  <div class="form-group row">
   <label for="transfersOut2" class="col-sm-2 col-form-label">Transfers Out</label>
   <div class="col-sm-10">
    <input type="text" name="ptransfersOut" class="form-control" id="ptransfersOut" placeholder="Transfers Out" value = "<?php echo $RP_OUT; ?>">
   </div>
  </div>

  <h3>TRANSFERS IN : Justification</h3>
  <div class="form-group row">
   <label for="comment">Comment:</label>
   <textarea class="form-control" rows="5" name="transferInjustification" id="transferInjustification"><?php echo $RT_INT; ?></textarea>
  </div>

  <h3>EXPENSES : Justification</h3>
  <div class="form-group row">
   <label for="comment">Equipment:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_equipment" id="expensesJustification_equipment"><?php echo $REXP1; ?></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Improvements:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_improvement" id="expensesJustification_improvement"><?php echo $REXP2; ?></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Contingencies:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_contingencies" id="expensesJustification_contingencies"><?php echo $REXP3; ?></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Other(if applicable):</label>
   <textarea class="form-control" rows="5" name="expensesJustification_other" id="expensesJustification_other"><?php echo $REXP4; ?></textarea>
  </div>

  <h3>TRANSFERS OUT : Justification</h3>
  <div class="form-group">
   <label for="comment">Comment:</label>
   <textarea class="form-control" rows="5" name="transferOutjustification" id="transferOutjustification"><?php echo $RT_OUT; ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
<br><br><br>
  </form>

</div> 

	 
	 
	 
	 
	 
 
	 



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	 

	 
  <script type="text/javascript">
	  var ar = <?php echo json_encode($arrayI1); ?>;
	  var ar2 = <?php echo json_encode($arrayI2); ?>;
	  var ar3 = <?php echo json_encode($arrayE1); ?>;
	  var ar4 = <?php echo json_encode($arrayE2); ?>;
	  var ar5 = <?php echo json_encode($arrayO1); ?>;
	  var ar6 = <?php echo json_encode($arrayO2); ?>;
	  
	  var count1 = 1;
	  var count2 = 1;
	  var count3 = 1;
//	  for(i = 0; i < test2; i++ ){
//	 		alert(ar[i]);
//	  }
	  var countT = <?php echo $countT; ?>;
	  var countE = <?php echo $countEXP; ?>;
	  var countO = <?php echo $countO; ?>;
	  var countR = <?php echo $countREST; ?>;
	  
	  
//	  alert(count);
	  
	  function test(){
		  transferIn();
		  expenses();
		  transferOut();
//	   	  for(i = 0; i < count-1; i++){
//		   addTransferIn();
//		   addExpenses();
//		   addTransferOut();
//			  
//		   count2 = count2 + 1;
//	   	   alert("Test");
//		   alert(count2);
//   		}
   }
	  function transferIn()
	  {
		  for(i = 0; i < countT-1; i++)
			  {
				  addTransferIn();
				  count1 = count1 + 1;
			  }
	  }
	  
	    function expenses()
	  {
		  for(i = 0; i < countE-1; i++)
			  {
				  addExpenses();
				  count2 = count2 + 1;
			  }
	  }
	  
	    function transferOut()
	  {
		  for(i = 0; i < countO-1; i++)
			  {
				  addTransferOut();
				  count3 = count3 + 1;
			  }
	  }
	  
	  function addTransferIn(){
//		  alert("Hey");
       var fields = document.getElementsByClassName("transferIn");
    var newel =  " <div class='row transferIn mt-2' id='t_in"+fields.length+"'>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersInName"+fields.length+ "'" +  "id='transfersInName"+fields.length+ "' class='form-control'"+ "placeholder='Transfers In (Subject)'"+ "value = '" + ar[count1] + "'>"+
        "</div>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersInValue"+fields.length+ "'" + + "id='transfersInValue"+fields.length+ "'  class='form-control'" + "placeholder='Amount'"+ "value = '" + ar2[count1] + "'>"+
        "</div>"+
        "</div>";

    console.log(newel);

    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
	  }
	  
	     function addExpenses(){
     var fields = document.getElementsByClassName("Expenses");
    var newel =  "<div class='row Expenses mt-2' id='expenses"+fields.length+"'>"+
        "<div class='col-5'>"+
        "<input type='text'"+" name='expensesName"+fields.length+ "' class='form-control' "+" id='expensesName"+fields.length+ "'" +" placeholder='Expenses(Subject)'"+ "value = '" + ar3[count3] + "'>"+
        " </div>"+
        "<div class='col-5'>"+
        "<input type='text' "+"name='expensesValue"+fields.length+ "' class='form-control'"+"  id='expensesValue"+fields.length+ "'" +" placeholder='Amount'"+ "value = '" + ar4[count3] + "'>"+
        "</div>"+
		"</div>"+
    "</div>";


      console.log(newel);
    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
   }
	  
	     function addTransferOut(){
    var fields = document.getElementsByClassName("transferOut");
    var newel =  " <div class='row transferOut mt-2' id='t_out"+fields.length+"'>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersOutName"+fields.length+ "'" +  "id='transfersOutName"+fields.length+ "' class='form-control'"+ "placeholder='Transfers In (Subject)'"+ "value = '" + ar5[count2] + "'>"+
        "</div>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersOutValue"+fields.length+ "'" + "id='transfersOutValue"+fields.length+ "' class='form-control'" + "placeholder='Amount'" + "value = '" + ar6[count2] + "'>"+
          +"</div>"+
		"</div>"+
      	"</div>";
        console.log(newel);

    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
   }
	  

	  
	  
	  
	  test();
  </script>	 
 
  


  
	 
	 <?php
		include("../footer.php");?>
 </body>
</html>
