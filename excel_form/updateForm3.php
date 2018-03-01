<?php
session_start();
include ('connectionForm.php');
$role2= $_SESSION['role'];
$form =$_POST['form'];
$id =$_POST['id'];
$role = $_POST['role'];
//$asab = $_POST['TEST'];
//$id2='';

$query1="SELECT P.TITLE AS PTITLE, P.FAUSTUDENT AS PFAUSTUDENT, P.HOURLYRATE AS PHOURLYRATE, P.HOURS_WEEK AS PHOURS_WEEK, P.WEEKS_YEAR AS PWEEKS_YEAR, P.PEOPLE_IN_POSITION AS PPEOPLE_IN_POSITION FROM reserveFundsOPSPosition P WHERE '".$role."' = P.ROLE AND '".$id."' = P.T_ID";

$query2="SELECT R.REVENUE AS RREVENUE, R.T_IN AS RT_IN, R.OPS AS ROPS, R.T_OUT AS RT_OUT, R.REVENUE_COMMENT AS RREVENUE_COMMENT, R.T_IN_COMMENT AS RT_IN_COMMENT, R.OPS_COMMENT AS ROPS_COMMENT, E.SUPPORT AS ESUPPORT, E.FOOD AS EFOOD, E.PROGRAMS AS EPROGRAMS, E.OTHER AS EOTHER, R.T_OUT_COMMENT AS RT_OUT_COMMENT FROM reserveFundsOPS R, reserveFundsOPSExpenses E WHERE '".$role."' = R.ROLE AND '".$id."' = R.ID AND R.ID=E.T_ID AND R.ROLE=E.ROLE";

try{
	$result1 = $connection->query($query1);
	$result2 = $connection->query($query2);
	$countP = $result1->rowCount();
	
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
		<title>FAU - Form3</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="../startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<!-- Bootstrap core CSS -->
		<link href= "../startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="../startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
		<link href="../css/stylesheet.css" rel="stylesheet">
	</head>
	<body>
		<?php 
		include("../form_navbar_signed.php");?>
		
		<?php 
	 $arrayP1 = array();
	 $arrayP2 = array();
	 $arrayP3 = array();
	 $arrayP4 = array();
	 $arrayP5 = array();
	 $arrayP6 = array();
	 $count1 = 0;

	 
	 
        foreach($result1 as $rows)
        {
			$arrayP1[$count1] = $rows['PTITLE'];
			$arrayP2[$count1] = $rows['PFAUSTUDENT'];
			$arrayP3[$count1] = $rows['PHOURLYRATE'];
			$arrayP4[$count1] = $rows['PHOURS_WEEK'];
			$arrayP5[$count1] = $rows['PWEEKS_YEAR'];
			$arrayP6[$count1] = $rows['PPEOPLE_IN_POSITION'];
			$count1 = $count1 + 1;
		}
		
		foreach($result2 as $rows)
		{
			$REV = $rows['RREVENUE'];
			$TIN = $rows['RT_IN'];
			$OPS = $rows['ROPS'];
            $TOUT = $rows['RT_OUT'];
			$REVCOM = $rows['RREVENUE_COMMENT']; 
			$TINCOM = $rows['RT_IN_COMMENT']; 
			$OPSCOM = $rows['ROPS_COMMENT'];
			$SUPP = $rows['ESUPPORT']; 
			$FOOD = $rows['EFOOD']; 
			$PROG = $rows['EPROGRAMS'];
			$OTHER = $rows['EOTHER']; 
			$RTOUT = $rows['RT_OUT_COMMENT']; 
		}
	 

    ?>
		<div id="top"></div>
		<div class="container" style="margin-bottom: 50px; margin-top: 50px;">
			<form id="form-revenue" method="post" action="reserveFundsOPS2.php">
				<input type="hidden" name="form" value='<?php echo $form ;?>' />
				<input type="hidden" name="role" value='<?php echo $role ;?>' />	
				<input type="hidden" name="id" value='<?php echo $id ;?>' />
				<h1>Revenue Fund OPS</h1>
				<div class="form-group row reserveFund" id="reserveFund">
					<div class="col-2 ml-auto">
						<div class="row">
							<h5>Position Title <br><br></h5>
						</div>
						<div class="row">
							<input type="text" name="positionTitle"  id="positionTitle" class="form-control" placeholder="Position Title" value = "<?php echo $arrayP1[0];?>">
						</div>
					</div>
					<div class="col-2 ml-1">
						<div class="row">
							<h5>FAU Student<br><br></h5>
						</div>
						<div class="row">
							<input type="text" name="FAUstudent"  id="FAUstudent" class="form-control" placeholder="FAU Student" value = "<?php echo $arrayP2[0];?>">
						</div>
					</div>
					<div class="col-1 ml-1">
						<div class="row">
							<h5>Hourly Rate<br></h5>
						</div>
						<div class="row">
							<input type="text" name="hourlyRate" class="form-control" id="hourlyRate" placeholder="Hourly Rate" value = "<?php echo $arrayP3[0];?>">
						</div>
					</div>
					<div class="col-2 ml-1">
						<div  class="row">
							<h5># of Hours <br>per Week</h5>
						</div>
						<div class="row">
							<input type="text" name="hoursPerWeek" class="form-control" id="hoursPerWeek" placeholder="Hours per Week" value = "<?php echo $arrayP4[0];?>">
						</div>
					</div>
					<div class="col-2 ml-1">
						<div class="row">
							<h5>#of Weeks <br> in the Year</h5>
						</div>
						<div class="row">
							<input type="text" name="weeksPerYear" class="form-control" id="weeksPerYear" placeholder="Weeks per Year" value = "<?php echo $arrayP5[0];?>">
						</div>
					</div>
					<div class="col-2 mx-auto mr-1">
						<div class="row">
							<h5># of People <br> in the Position</h5>
							<div class="row">
								<input type="text" name="peoplePosition" class="form-control" id="peoplePosition" placeholder="People in Position" value = "<?php echo $arrayP6[0];?>">
							</div>
						</div>
					</div> 
					<button type='button' class='btn btn-danger' style="visibility:hidden" id='OPS'>-</button>
				</div>
				<button type="button" id="addbtn" class="btn btn-primary mt-2" onclick="addRowFunds()">+Add</button>


				<br>

				<h1>Supplemental Form: Revenue</h1>

				<h3>Revenue: 2017-2018 Approved Budget</h3>
				<div class="form-group row">
					<label for="revenue" class="col-sm-2 col-form-label">Revenue:</label>
					<div class="col-sm-10">
						<input type="text" name="revenue" class="form-control" id="revenue" placeholder="Revenue" value = "<?php echo $REV; ?>">
					</div>
				</div>

				<h3>Transfers In : 2017-2018 Approved Budget</h3>
				<div class="form-group row">
					<label for="transfersIn" class="col-sm-2 col-form-label">Trasfers In:</label>
					<div class="col-sm-10">
						<input type="text" name="transfersIn" class="form-control"  id="transfersIn" placeholder="Transfers In" value = "<?php echo $TIN; ?>" >
					</div>
				</div>

				<h3>OPS : 2017-2018 Approved Budget</h3>
				<div class="form-group row">
					<label for="OPS" class="col-sm-2 col-form-label">Transfers Out</label>
					<div class="col-sm-10">
						<input type="text" name="OPS" class="form-control" id="OPS" placeholder="OPS" value = "<?php echo $OPS; ?>">
					</div>
				</div>

<!--
				<h3>Expenses: 2017-2018 Approved Budget</h3>
				<div class="form-group row">
					<label for="expenses" class="col-sm-2 col-form-label">Expenses</label>
					<div class="col-sm-10">
						<input type="text" name="expenses" class="form-control" id="expenses" placeholder="Expenses">
					</div>
				</div>
-->

				<h3>Transfers Out : 2017-2018 Approved Budget</h3>
				<div class="form-group row">
					<label for="transfersOut" class="col-sm-2 col-form-label">Transfers Out</label>
					<div class="col-sm-10">
						<input type="text" name="transfersOut" class="form-control" id="transfersOut" placeholder="Transfers Out" value = "<?php echo $TOUT; ?>">
					</div>
				</div>

				<h3>Revenue : Justification</h3>
				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" name="revenueComment" id="revenueComment"><?php echo $REVCOM; ?></textarea>
				</div>

				<h3>Transfers In : Justification</h3>
				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5"  name="transferInComment" id="transferInComment"><?php echo $TINCOM; ?></textarea>
				</div>

				<h3>Other Personal Services (OPS): Justification</h3>
				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" name="opsComment" id="opsComment"><?php echo $OPSCOM; ?></textarea>
				</div>

				<h3>Expenses: Justification</h3>
				<div class="form-group">
					<label for="comment">Support Services:</label>
					<textarea class="form-control" rows="5" name="expensesComment" id="expensesComment"><?php echo $SUPP; ?></textarea>
				</div>

				<div class="form-group">
					<label for="comment">Food Services:</label>
					<textarea class="form-control" rows="5" name="food_servicesComment" id="food_servicesComment"><?php echo $FOOD; ?></textarea>
				</div>

				<div class="form-group">
					<label for="comment">Programs and Services:</label>
					<textarea class="form-control" rows="5" name="programsComment" id="programsComment"><?php echo $PROG; ?></textarea>
				</div>

				<div class="form-group">
					<label for="comment">Other (if applicable):</label>
					<textarea class="form-control" rows="5"  name="otherComment" id="otherComment"><?php echo $OTHER; ?></textarea>
				</div>

				<h3>TRANSFERS OUT : Justification</h3>
				<div class="form-group">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" name="transferOutComment" id="transferOutComment"><?php echo $TOUT; ?></textarea>
				</div>



				<div class="row" style= "display: flex; justify-content: space-between;">
					<button type="submit" class="btn btn-success" onclick="updateApproval()">Submit</button>
					<button type="button" class=".btn-red_fau btn btn-danger" onclick="window.location='http://lamp.cse.fau.edu/~dizquierdo2014/SNO/all_forms.php';">Exit Form</button>
				</div>

			</form>

		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

		<script>
			
			var ar = <?php echo json_encode($arrayP1); ?>;
	  		var ar2 = <?php echo json_encode($arrayP2); ?>;
	  		var ar3 = <?php echo json_encode($arrayP3); ?>;
	  		var ar4 = <?php echo json_encode($arrayP4); ?>;
	  		var ar5 = <?php echo json_encode($arrayP5); ?>;
	  		var ar6 = <?php echo json_encode($arrayP6); ?>;
			
			var count1 = 1;
	  		var count2 = 1;
	  		var count3 = 1;
			
			var countP = <?php echo $countP; ?>
			
			function test(){
				rowFunds();
			}
			
			function rowFunds(){
				for(i = 0; i < countP-1; i++)
			  {
				  addRowFunds();
				  count1 = count1 + 1;
			  }
			}
			
			function addRowFunds(){
				var fields=document.getElementsByClassName("reserveFund");
				var newelem =       "<div class='row reserveFund mt-4' id='reserveFund" + fields.length +"'>"+

					"<div class='col-2 ml-auto'>"+
					"<div class='row'>"+
					"</div>"+
					"  <div class='row'>"+
					"<input type='text' name='positionTitle" + fields.length +"'  id='positionTitle" +fields.length+ "' class='form-control' placeholder='Position Title'"+ "value = '" + ar[count1] + "'>"+
					"  </div>"+
					" </div>"+
					"   <div class='col-2 ml-1'>"+
					"<div class='row'>"+
					"  </div>"+
					"<div class='row'>"+
					"<input type='text' name='FAUstudent" + fields.length +"'  id='FAUstudent" +fields.length+ "' class='form-control' placeholder='FAU Student'"+ "value = '" + ar2[count1] + "'>"+
					"  </div>"+
					"   </div>"+
					"  <div class='col-1 ml-1'>"+
					"<div class='row'>"+
					"   </div>"+
					"<div class='row'>"+
					"<input type='text' name='hourlyRate"+fields.length+ "' class='form-control' id='hourlyRate"+fields.length+"' placeholder='Hourly Rate'"+ "value = '" + ar3[count1] + "'>"+ 
					" </div>"+
					"</div>"+
					" <div class='col-2 ml-1'>"+
					"  <div  class='row'>"+
					"    </div>"+
					"  <div class='row'>"+
					" <input type='text' name='hoursPerWeek"+fields.length+"' class='form-control' id='hoursPerWeek"+fields.length+"' placeholder='Hours per Week'"+ "value = '" + ar4[count1] + "'>"+
					" </div>"+
					"</div>"+
					"  <div class='col-2 ml-1'>"+
					" <div class='row'>"+
					"    </div>"+
					" <div class='row'>"+
					" <input type='text' name='weeksPerYear"+fields.length+"' class='form-control' id='weeksPerYear"+fields.length+"' placeholder='Weeks per Year'"+ "value = '" + ar5[count1] + "'>"+
					"</div>"+
					"   </div>"+
					"<div class='col-2 mx-auto mr-1'>"+
					"    <div class='row'>"+
					" <div class='row'>"+
					" <input type='text' name='peoplePosition"+fields.length+"' class='form-control' id='peoplePosition"+fields.length+"' placeholder='People in Position'"+ "value = '" + ar6[count1] + "'>"+
					"</div>"+
					"  </div>"+
					"  </div>"   +

					"<button type='button' class='btn btn-danger' id='reserveFund" + fields.length +"' onclick='removeField(this.id)'>-</button>"+
					"</div>";

				fields[fields.length-1].insertAdjacentHTML('afterend'
														   , newelem);

			}

			function removeField(btn){
				$("#"+btn).remove();
			}



			function updateApproval(){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(this.readyState==4 && this.status==200){
						console.log(this.responseText);

					}
				}
				xmlhttp.open('GET', '../php/update_approval.php');
				xmlhttp.send();

			}
			
			test();

		</script>
		<?php
		include("../footer.php");?>
	</body>
</html>