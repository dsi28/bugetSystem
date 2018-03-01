<?php
session_start();
include ('connectionForm.php');
$role1= $_SESSION['role'];
$form =$_POST['form'];
$id =$_POST['id'];
$role = $_POST['role'];


$query1="SELECT O.SMARTTAG AS OSMARTTAG, O.ACCOUNTMANAGER AS OACCOUNTMANAGER, O.STUDENTBUDGET AS OSTUDENTBUDGET, O.MANAGER_NAME AS OMANAGER_NAME, O.MANAGER_TELEPHONE AS OMANAGER_TELEPHONE, O.MANAGER_SIGNATURE AS OMANAGER_SIGNATURE, O.MANAGER_EMAIL AS OMANAGER_EMAIL, O.SALARIES_BENEFITS AS OSALARIES_BENEFITS, O.OPS AS OOPS, O.GRADUATE_ASSISTANT AS OGRADUATE_ASSISTANT, O.EXPENSES AS OEXPENSES, O.T_OUT AS OT_OUT FROM operatingFund O WHERE '".$role."' = ROLE AND '".$id."' = ID";

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


  <!--Scripts-->


 </head>

 <body>
  <?php
  include("../form_navbar_signed.php");?>
  <?php
	 		foreach($result1 as $rows)
		{
			$SMART = $rows['OSMARTTAG'];
			$ACCOUNT = $rows['OACCOUNTMANAGER'];
            $BUDGET = $rows['OSTUDENTBUDGET'];
			$NAME = $rows['OMANAGER_NAME']; 
			$TELEPHONE = $rows['OMANAGER_TELEPHONE']; 
			$SIGN = $rows['OMANAGER_SIGNATURE'];
			$EMAIL = $rows['OMANAGER_EMAIL']; 
			$SALARY = $rows['OSALARIES_BENEFITS']; 
			$OPS = $rows['OOPS'];
			$GRAD = $rows['OGRADUATE_ASSISTANT'];
			$EXP = $rows['OEXPENSES'];
			$TOUT = $rows['OT_OUT'];
			
		}
	 ?>

  <div id="top">
  </div>
  <div class="container" style="margin-bottom: 50px; margin-top: 50px;">
   <ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#PART1" role="tab">Operating Fund Summary</a></li>
    <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#PART2" role="tab">FAU - Salary &amp; Benefits</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#PART3" role="tab">FAU - OPS</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#PART4" role="tab">FAU - OPS GA</a></li>
    <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#PART5" role="tab">FAU - Expenses</a></li>
    <li class="nav-item "><a  class="nav-link" data-toggle="tab" href="#PART6" role="tab">Supplemental Form: Operating</a></li>

   </ul>
	<?php echo $query1;?> 
   <div class="tab-content mt-3">
    <div id="PART1" class="tab-pane fade show active" role="tabpanel">
     <form method="post" action="operating.php" id="operating_fund">


      <h1>Operating Fund Summary</h1>
      <div class="container py-2">
       <h3>Smart Tag</h3>
       <div class="form-group row">
        <label for="smartTag" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="smartTag"  id="smartTag" class="form-control" placeholder="Smart Tag" value = "<?php echo $SMART; ?>">
        </div>
       </div>
      </div>

      <div class="container py-2">
       <h3>Account Name</h3>
       <div class="form-group row">
        <label for="accountName" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="accountName" class="form-control"  id="accountName" placeholder="Account Name" value = "<?php $ACCOUNT; ?>">
        </div>
       </div>
      </div>


      <div class="container py-2">
       <h3>To Student Budget Appropriations Committee: (Check Only One)</h3>
	   <input type="text" name="student_budget" class="form-control"  id="student_budget" placeholder="Student Budget" value = "<?php $BUDGET; ?>">
      </div>

      <div class="container py-2">
       <h3 class="mb-2">Account Manager</h3>
       <div class="form-group row">
        <label for="hoursPerWeek" class="col-sm-2 col-form-label">Name &amp; Title:</label>
        <div class="col-sm-10">
         <input type="text" name="nameTitle" class="form-control" id="nameTitle" placeholder="nameTitle" value = "<?php $NAME; ?>">
        </div>
       </div>
       <div class="form-group row">
        <label for="hoursPerWeek" class="col-sm-2 col-form-label">Telephone:</label>
        <div class="col-sm-10">
         <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone" value = "<?php $TELEPHONE; ?>">
        </div>
       </div>
       <div class="form-group row">
        <label for="hoursPerWeek" class="col-sm-2 col-form-label">Signature:</label>
        <div class="col-sm-10">
         <input type="text" name="signature" class="form-control" id="signature" placeholder="Signature" value = "<?php $SIGN; ?>">
        </div>
       </div>
       <div class="form-group row">
        <label for="hoursPerWeek" class="col-sm-2 col-form-label">Email Address:</label>
        <div class="col-sm-10">
         <input type="text" name="emailAddress" class="form-control" id="emailAddress" placeholder="Email Address" value = "<?php $EMAIL; ?>">
        </div>
       </div>
      </div>

      <div class="container py-2">
       <h3>Salaries And Benefits: 2017-2018 Approved Budget</h3>
       <div class="form-group row">
        <label for="salariesBenifits" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="salariesBenefits" class="form-control" id="salariesBenefits" placeholder="Salaries And Benefits" value = "<?php $SALARY; ?>">
        </div>
       </div>
      </div>

      <div class="container py-2">
       <h3>Other Personal Services: 2017-2018 Approved Budget</h3>
       <div class="form-group row">
        <label for="OPS" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="OPS" class="form-control" id="OPS" placeholder="OPS" value = "<?php $OPS; ?>">
        </div>
       </div>
      </div>

      <div class="container py-2">
       <h3>OPS - Graduate Assistant: 2017-2018 Approved Budget</h3>
       <div class="form-group row">
        <label for="graduateAss" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="graduateAss" class="form-control" id="graduateAss" placeholder="Graduate Assistant" value = "<?php $GRAD; ?>">
        </div>
       </div>
      </div>

      <div class="container py-2">
       <h3>Expenses: 2017-2018 Approved Budget</h3>
       <div class="form-group row">
        <label for="expense" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="expense" class="form-control" id="expense" placeholder="Expense" value = "<?php $EXP; ?>">
        </div>
       </div>
      </div>

      <div class="container py-2">
       <h3>Transfers Out: 2017-2018 Approved Budget</h3>
       <div class="form-group row">
        <label for="transfersOut" class="col-sm-2 col-form-label">Enter Here:</label>
        <div class="col-sm-10">
         <input type="text" name="transfersOut" class="form-control" id="transfersOut" placeholder="Transfers Out" value = "<?php $TOUT; ?>">
        </div>
       </div>
      </div>
     </form>
     <div class="container py-2">
      <div class="row">
       <button type="button" class="btn btn-success  mr-2" onclick="postOperatingFund()"><a href="#top" class="text-white">Save</a></button>
       <button type="button" class="btn btn-danger mr-2" onclick="document.getElementById('operating_fund').reset()" style="back">Reset</button>
       <button type="button" class=".btn-red_fau btn btn-danger mr-2 ml-auto" onclick="exitForm()">Exit Form</button>
      </div>
     </div>
    </div>




    <div id="PART2" class="tab-pane fade" role="tabpanel">
     <form method="post" action="fau_salary.php" id="fauAMP">


      <h1>FAU - Salary &amp; Benefits</h1>

      <h2>AMP</h2>

      <div class="form-group row AMP">
       <div class="col-2">
        <h5>Position Number</h5>
        <input type="text" name="positionNumberAMP"  id="positionNumberAMP" class="form-control AMP_number" placeholder="Position Number">
       </div>

       <div class="col-2">
        <h5>Position Title</h5>
        <input type="text" name="positionTitleAMP" class="form-control AMP_title"  id="positionTitleAMP" placeholder="Position Title">
       </div>

       <div class="col-2">
        <h5>FTE</h5>
        <input type="text" name="fteAMP" class="form-control fteAMP" id="fteAMP" placeholder="FTE">
       </div>


       <div class="col-2">
        <h5>Annual Rate</h5>
        <input type="text" name="annualRateAMP" class="form-control rate_AMP" id="annualRateAMP" placeholder="Annual Rate">
       </div>
       <div class="col-2">
        <h5>State</h5>
        <select class="form-control state_AMP" id="AMPState" onchange="disableFieldAMP(this.id)">
         <option value="filled" selected>Filled</option>
         <option value="unfilled">Unfilled</option>
        </select>
       </div>


      </div>
     </form>
     <button type="button" class="btn btn-primary text-white" onclick="addAMP()">+Add</button>
     <button type="button" class="btn btn-success text-white" onclick="postAMP()">Save</button>
     <button type="button" class="btn btn-danger text-white" onclick="document.getElementById('fauAMP').reset();">Reset</button>







     <h2>SP</h2>
     <form id="fauSP">
      <div class="form-group row SP">
       <div class="col-2">
        <h5>Position Number</h5>
        <input type="text" name="positionNumberSP"  id="positionNumberSP" class="form-control SP_number" placeholder="Position Number">
       </div>

       <div class="col-2">
        <h5>Position Title</h5>
        <input type="text" name="positionTitleSP" class="form-control SP_title"  id="positionTitleSP" placeholder="Position Title">
       </div>

       <div class="col-2">
        <h5>FTE</h5>
        <input type="text" name="fteSP" class="form-control fteSP" id="fteSP" placeholder="FTE">
       </div>


       <div class="col-2">
        <h5>Annual Rate</h5>
        <input type="text" name="annualRateSP" class="form-control rate_SP" id="annualRateSP" placeholder="Annual Rate">
       </div>

       <div class="col-2">
        <h5>State</h5>
        <select class="form-control state_SP" id="SPState" onchange="disableFieldSP(this.id)">
         <option value="filled" selected>Filled</option>
         <option value="unfilled">Unfilled</option>
        </select>
       </div>
      </div>
      <button type="button" class="btn btn-primary text-white" onclick="addSP()">+Add</button>
      <button type="button" class="btn btn-success text-white" onclick="postSP()">Save</button>
      <button type="button" class="btn btn-danger text-white" onclick="document.getElementById('fauSP').reset();">Reset</button>
     </form>
     <div class="row">
      <button type="button" class=".btn-red_fau btn btn-danger mr-2 ml-auto" onclick="exitForm()" style="margin-top: 50px;">Exit Form</button>
     </div>
    </div>



    <div id="PART3" class="tab-pane fade" role="tabpanel">


     <form class="form" method="post" id="form_OPS">

      <h1>FAU - OPS</h1>
      <div class="form-group row OPS" id="OPS">
       <div class="col-2 ml-auto">
        <div class="row">
         <h5>Position Title <br><br></h5>
        </div>
        <div class="row">
         <input type="text" name="positionTitle"  id="positionTitle" class="form-control OPS_title" placeholder="Position Title">
        </div>
       </div>
       <div class="col-2 ml-1">
        <div class="row">
         <h5>FAU Student<br><br></h5>
        </div>
        <div class="row">
         <select class="form-control OPS_student" name="student" id="student">
          <option value="1">No</option>
          <option value="0">Yes</option>
         </select>
        </div>
       </div>
       <div class="col-1 ml-1">
        <div class="row">
         <h5>Hourly Rate<br></h5>
        </div>
        <div class="row">
         <input type="text" name="hourlyRate" class="form-control OPS_hourly_rate" id="hourlyRate" placeholder="Hourly Rate">
        </div>
       </div>
       <div class="col-2 ml-1">
        <div  class="row">
         <h5># of Hours <br>per Week</h5>
        </div>
        <div class="row">
         <input type="text" name="hoursPerWeek" class="form-control OPS_hours_week" id="hoursPerWeek" placeholder="Hours per Week">
        </div>
       </div>
       <div class="col-2 ml-1">
        <div class="row">
         <h5>#of Weeks <br> in the Year</h5>
        </div>
        <div class="row">
         <input type="text" name="weeksPerYear" class="form-control OPS_weeks_year" id="weeksPerYear" placeholder="Weeks per Year">
        </div>
       </div>
       <div class="col-2 mx-auto mr-1">
        <div class="row">
         <h5># of People <br> in the Position</h5>
         <div class="row">
          <input type="text" name="peoplePosition" class="form-control OPS_people" id="peoplePosition" placeholder="People in Position">
         </div>
        </div>
       </div>
       <button type='button' class='btn btn-danger' style="visibility:hidden" id='OPS'>-</button>
      </div>
      <button type="button" id="addbtn" class="btn btn-primary mt-2" onclick="addRowOPS()">+Add</button>
      <button type="button" class="btn btn-success text-white mt-2" onclick="postOPS()">Save</button>
      <button type="button" class="btn btn-danger text-white mt-2" onclick="document.getElementById('form_OPS').reset();">Reset</button>


     </form>


    </div>






    <div id="PART4" class="tab-pane fade" role="tabpanel">
     <form class="form" id="fauOPSGA">
      <div class="container">
       <h1>FAU - OPS GA</h1>
       <div class="form-group row OPSGA" id="OPSGA">
        <div class="col-2 py-1 mx-auto">
         <div class="row">
          <h5>Position Title<br><br></h5>
         </div>
         <div class="row">
          <input type="text" name="positionTitleOPSGA"  id="positionTitleOPSGA" class="form-control OPSGA_title" placeholder="Position Title">
         </div>
        </div>

        <div class="col-2 py-1 mx-auto">
         <div class="row">
          <h5>Hourly Rate<br><br></h5>
         </div>
         <div class="row">
          <input type="text" name="hourlyRateOPSGA" class="form-control OPSGA_hourly_rate" id="hourlyRateOPSGA" placeholder="Hourly Rate">
         </div>
        </div>
        <div class="col-2 py-1 mx-auto">
         <div  class="row">
          <h5># of Hours <br>per Week</h5>
         </div>
         <div class="row">
          <input type="text" name="hoursPerWeekOPSGA" class="form-control OPSGA_hours_week" id="hoursPerWeekOPSGA" placeholder="Hours per Week">
         </div>
        </div>
        <div class="col-2 py-1 mx-auto">
         <div class="row">
          <h5>#of Weeks in the Year</h5>
         </div>
         <div class="row">
          <input type="text" name="weeksPerYearOPSGA" class="form-control OPSGA_weeks_year" id="weeksPerYearOPSGA" placeholder="Weeks per Year">
         </div>
        </div>
        <button type='button' class='btn btn-danger' style="visibility:hidden" id='OPSGA'>-</button>
       </div>
       <button type="button" id="addbtn" class="btn btn-primary mt-4 ml-auto" onclick="addRowOPSGA()">+Add</button>
       <button type="button" class="btn btn-success text-white mt-4 ml-auto" onclick="postOPSGA()">Save</button>
       <button type="button" class="btn btn-danger text-white mt-4 ml-auto" onclick="document.getElementById('fauOPSGA').reset();">Reset</button>
      </div>

     </form>
    </div>






    <div id="PART5" class="tab-pane fade" role="tabpanel">
     <form>


      <h1>FAU - Expenses</h1>

      <h3>Expenses: 2018-2019 Requested Budget</h3>
      <div class="container">
       <div class="form-group row Expenses">
        <label for="supportServices" class="col-sm-2 col-form-label">Support Services</label>
        <div class="col-8">
         <input type="text" name="supportServices"  id="supportServices" class="form-control" placeholder="Support Services">
        </div>
       </div>

       <div class="form-group row Expenses">
        <label for="foodServices" class="col-sm-2 col-form-label">Food Services</label>
        <div class="col-8">
         <input type="text" name="foodServices"  id="foodServices" class="form-control" placeholder="Food Services">
        </div>
       </div>

       <div class="form-group row Expenses">
        <label for="programServices" class="col-sm-2 col-form-label">Programs and Services</label>
        <div class="col-8">
         <input type="text" name="programServices"  id="programServices" class="form-control" placeholder="Programs and Services">
        </div>
       </div>


       <div class="form-group row Expenses">
        <label for="travel" class="col-sm-2 col-form-label">Travel</label>
        <div class="col-8">
         <input type="text" name="travel"  id="travel" class="form-control" placeholder="Travel">
        </div>
        <button class="btn btn-danger" type="button" style="visibility:hidden">-</button>
       </div>
       <button type="button" class="btn btn-primary mt-2 mb-4" onclick="addExpense()">+Add</button>
       <button type="button" class="btn btn-success text-white mt-2 mb-4" onclick="postFAUExpenses()">Save</button>
      </div>

      <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
      <div class="container">
       <div class="form-group row t_Out" id="t_Out">
        <div class="col-2">
         <input type="text" name="t_out_Subject" class="form-control t_out_Subject" id="t_out_Subject" placeholder="Subject">
        </div>
        <div class="col-8">
         <input type="text" name="t_out_Amount" class="form-control t_out_Amount" id="t_out_Amount" placeholder="Amount">
        </div>
        <button type="button" class="btn btn-danger" style="visibility:hidden">-</button>
       </div>
       <button type="button" class="btn btn-primary mt-2 mb-4" onclick="addt_Out()">+Add</button>
       <button type="button" class="btn btn-success text-white mt-2 mb-4" onclick="postFAUT_Out()">Save</button>

      </div>
     </form>
    </div>




    <div id="PART6" class="tab-pane fade" role="tabpanel">
     <form action="FAU_Supplementary.php" method="post">

      <h1>Supplemental Form: Operating</h1>

      <h3>Salaries and Benefits : Justification</h3>
      <div class="form-group">
       <label for="comment">Comment:</label>
       <textarea class="form-control" rows="5" name="commentSalaries" id="commentSalaries"></textarea>
      </div>

      <h3>Other Personnel Services (OPS) : Justification</h3>
      <div class="form-group">
       <label for="comment">Comment:</label>
       <textarea class="form-control" rows="5" name="commentOPS" id="commentOPS"></textarea>
      </div>


      <h3>Other Personnel Services (OPS) Graduate Assistant : Justification</h3>
      <div class="form-group">
       <label for="comment">Comment:</label>
       <textarea class="form-control" rows="5" name="commentOPSGA" id="commentOPSGA"></textarea>
      </div>

      <h3>EXPENSES : Justification</h3>
      <div class="form-group">
       <label for="comment">Support Services:</label>
       <textarea class="form-control" rows="5" name="commentSupport" id="commentSupport"></textarea>
      </div>

      <div class="form-group">
       <label for="comment">Food Services:</label>
       <textarea class="form-control" rows="5" name="commentFood" id="commentFood"></textarea>
      </div>

      <div class="form-group">
       <label for="comment">Programs and Services:</label>
       <textarea class="form-control" rows="5" name="commentPrograms" id="commentPrograms"></textarea>
      </div>

      <div class="form-group">
       <label for="comment">Travel:</label>
       <textarea class="form-control" rows="5" name="commentTravel" id="commentTravel"></textarea>
      </div>

      <div class="form-group">
       <label for="comment">Other(if applicable):</label>
       <textarea class="form-control" rows="5" name="commentOther" id="commentOther"></textarea>
      </div>

      <h3>TRANSFERS OUT : Justification</h3>
      <div class="form-group">
       <label for="comment">Comment:</label>
       <textarea class="form-control" rows="5" name="commentT_Out" id="commentT_Out"></textarea>
      </div>

      <div class="row" style= "display: flex; justify-content: space-between;">
       <button type="submit" class="btn btn-outline-success " onclick="updateApproval()">Submit</button>
       <button type="button" class="btn btn-success" onclick="postComments()">Save</button>
       <button type="button" class=".btn-red_fau btn btn-danger" onclick="exitForm()">Exit Form</button>

      </div>
     </form>
    </div>



   </div>
  </div>

  <script>
   function disableFieldSP(id){
    console.log("Something");
    var number = id.split("SPState")[1];
    var number = "positionTitleSP" + number;
    var state = document.getElementById("SPState");
    if(state.options[state.selectedIndex].value === "unfilled"){
     console.log("Something else");

     document.getElementById(number).disabled= true;
    }else if(state.options[state.selectedIndex].value === "filled"){
     document.getElementById(number).disabled = false;
    }
   }

   function disableFieldAMP(id){
    console.log("Something");
    var number = id.split("AMPState")[1];
    var number = "positionTitleAMP" + number;
    console.log(number);
    var state = document.getElementById("AMPState");
    if(state.options[state.selectedIndex].value === "unfilled"){
     console.log("Something else");

     document.getElementById(number).disabled= true;
    }else if(state.options[state.selectedIndex].value === "filled"){
     document.getElementById(number).disabled = false;
    }
   }


   function addAMP(){
    var fields = document.getElementsByClassName("AMP");

    var newelem =   "<div class='form-group row AMP' id='AMP"+fields.length+"'>"+
        "<div class='col-2'>"+
        "<input type='text' name='positionNumberAMP"+fields.length+"'  id='positionNumberAMP"+fields.length+"' class='form-control AMP_number' placeholder='Position Number'>"+"</div>"+

        "<div class='col-2'>"+
        "<input type='text' name='positionTitleAMP"+fields.length+"' class='form-control AMP_title'  id='positionTitleAMP"+fields.length+"' placeholder='Position Title'>"+"</div>"+

        "<div class='col-2'>"+
        "<input type='text' name='fteAMP"+fields.length+"' class='form-control fteAMP' id='fteAMP"+fields.length+"' placeholder='FTE'>"+"</div>"+


        "<div class='col-2'>"+
        "<input type='text' name='annualRateAMP"+fields.length+"' class='form-control rate_AMP' id='annualRateAMP"+fields.length+"' placeholder='Annual Rate'>"+"</div>"+
        "<div class='col-2'>"+
        "<select class='form-control state_AMP' id='AMPState"+fields.length+"' onchange='disableFieldAMP(this.id)'>"+
        "<option value='filled' selected>Filled</option>"+
        "<option value='unfilled'>Unfilled</option>"+
        "</select>"+
        "</div>"+

        "<div class='col-2'>"+
        "<button type='button' id='AMP"+fields.length+"' class='btn btn-danger btn-circle' onclick='removeFieldAMP(this.id)'>-</button>"+


        "     </div>";


    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newelem);

   }


   function addSP(){
    var fields = document.getElementsByClassName("SP");

    var newelem =       "<div class='form-group row SP' id='SP"+fields.length+"'>"+
        "<div class='col-2'>"+
        "<input type='text' name='positionNumberSP"+fields.length+"'  id='positionNumberSP"+fields.length+"' class='form-control SP_number' placeholder='Position Number'></div>"+

        "<div class='col-2'>"+
        "<input type='text' name='positionTitleSP"+fields.length+"' class='form-control SP_title'  id='positionTitleSP"+fields.length+"' placeholder='Position Title'></div>"+

        "<div class='col-2'>"+
        "<input type='text' name='fteSP"+fields.length+"' class='form-control fteSP' id='fteSP"+fields.length+"' placeholder='FTE'></div>"+


        "<div class='col-2'>"+
        "<input type='text' name='annualRateSP"+fields.length+"' class='form-control rate_SP' id='annualRateSP"+fields.length+"' placeholder='Annual Rate'></div>"+
        "<div class='col-2'>"+
        "<select class='form-control state_SP' id='SPState"+fields.length+"' onchange='disableFieldSP(this.id)'>"+
        "<option value='filled' selected>Filled</option>"+
        "<option value='unfilled'>Unfilled</option>"+
        "</select>"+
        "</div>"+
        "<div class='col-2'>"+
        "<button type='button' id='SP"+fields.length+"' class='btn btn-danger btn-circle' onclick='removeFieldSP(this.id)'>-</button>"+


        "     </div>";

    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newelem);
   }


   function removeFieldAMP(btn){

    var id = btn.split("AMP")[1];
    console.log(id);
    var position = document.getElementById("positionTitleAMP"+id).value;
    var fte = document.getElementById("fteAMP"+id).value;
    var rate = document.getElementById("annualRateAMP"+id).value;

    console.log(position);
    $("#"+btn).remove();

    var xmlhttp = new XMLHttpRequest();
    var dat = new FormData();
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    }
    dat.append("position",position);
    dat.append("fte",fte);
    dat.append("rate",rate);
    dat.append("postion",position);

    xmlhttp.open("POST","checkAMP.php");
    xmlhttp.send(dat);

   }
   function removeFieldSP(btn){
    var id = btn.split("SP")[1];
    console.log(id);
    var position = document.getElementById("positionTitleSP"+id).value;
    var fte = document.getElementById("fteSP"+id).value;
    var rate = document.getElementById("annualRateSP"+id).value;

    console.log(position);
    $("#"+btn).remove();

    var xmlhttp = new XMLHttpRequest();
    var dat = new FormData();
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    }
    dat.append("position",position);
    dat.append("fte",fte);
    dat.append("rate",rate);
    dat.append("postion",position);

    xmlhttp.open("POST","checkSP.php");
    xmlhttp.send(dat);
   }

   function removeFieldOPS(btn){

    var id = btn.split("OPS")[1];
    console.log(id);
    var position = document.getElementById("positionTitle"+id).value;

    var rate = document.getElementById("hourlyRate"+id).value;
    var hours_week = document.getElementById("hoursPerWeek"+id).value;    var weeks_year = document.getElementById("weeksPerYear"+id).value;
    var people_position = document.getElementById("peoplePosition"+id).value;

    console.log(position);
    $("#"+btn).remove();

    var xmlhttp = new XMLHttpRequest();
    var dat = new FormData();
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    }
    dat.append("position",position);
    dat.append("rate",rate);
    dat.append("hours_week",hours_week);    dat.append("weeks_year",weeks_year);    dat.append("people_position",people_position);


    xmlhttp.open("POST","checkOPS.php");
    xmlhttp.send(dat);

   }


    function removeFieldOPSGA(btn){

    var id = btn.split("OPSGA")[1];
    console.log(id);
    var position = document.getElementById("positionTitleOPSGA"+id).value;

    var rate = document.getElementById("hourlyRateOPSGA"+id).value;
    var hours_week = document.getElementById("hoursPerWeekOPSGA"+id).value;    var weeks_year = document.getElementById("weeksPerYearOPSGA"+id).value;

    console.log(position);
    $("#"+btn).remove();

    var xmlhttp = new XMLHttpRequest();
    var dat = new FormData();
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    }
    dat.append("position",position);
    dat.append("rate",rate);
    dat.append("hours_week",hours_week);    dat.append("weeks_year",weeks_year);


    xmlhttp.open("POST","checkOPSGA.php");
    xmlhttp.send(dat);

   }



   function addRowOPS(){
    var fields=document.getElementsByClassName("OPS");
    var newelem =       "<div class='row OPS mt-4' id='OPS" + fields.length +"'>"+

        "<div class='col-2 ml-auto'>"+
        "<div class='row'>"+
        "</div>"+
        "  <div class='row'>"+
        "<input type='text' name='positionTitle" + fields.length +"'  id='positionTitle" +fields.length+ "' class='form-control OPS_title' placeholder='Position Title'>"+
        "  </div>"+
        " </div>"+
        "   <div class='col-2 ml-1'>"+
        "<div class='row'>"+
        "  </div>"+
        "<div class='row'>"+
        "  <select class='form-control OPS_student' name='student" + fields.length+"' id='student" +fields.length+" '>"+
        "  <option value='1'>No</option>"+
        "   <option value='0'>Yes</option>"+
        " </select>"+
        "    </div>"+
        "   </div>"+
        "  <div class='col-1 ml-1'>"+
        "<div class='row'>"+
        "   </div>"+
        "<div class='row'>"+
        "<input type='text' name='hourlyRate"+fields.length+ "' class='form-control OPS_hourly_rate' id='hourlyRate"+fields.length+"' placeholder='Hourly Rate'>"+
        " </div>"+
        "</div>"+
        " <div class='col-2 ml-1'>"+
        "  <div  class='row'>"+
        "    </div>"+
        "  <div class='row'>"+
        " <input type='text' name='hoursPerWeek"+fields.length+"' class='form-control OPS_hours_week' id='hoursPerWeek"+fields.length+"' placeholder='Hours per Week'>"+
        " </div>"+
        "</div>"+
        "  <div class='col-2 ml-1'>"+
        " <div class='row'>"+
        "    </div>"+
        " <div class='row'>"+
        " <input type='text' name='weeksPerYear"+fields.length+"' class='form-control OPS_weeks_year' id='weeksPerYear"+fields.length+"' placeholder='Weeks per Year'>"+
        "</div>"+
        "   </div>"+
        "<div class='col-2 mx-auto mr-1'>"+
        "    <div class='row'>"+
        " <div class='row'>"+
        " <input type='text' name='peoplePosition"+fields.length+"' class='form-control OPS_people' id='peoplePosition"+fields.length+"' placeholder='People in Position'>"+
        "</div>"+
        "  </div>"+
        "  </div>"   +

        "<button type='button' class='btn btn-danger' id='OPS" + fields.length +"' onclick='removeFieldOPS(this.id)'>-</button>"+
        "</div>";


    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newelem);

   }


   function addRowOPSGA(){
    var fields=document.getElementsByClassName("OPSGA");
    var newelem =       "<div class='row OPSGA mt-3' id='OPSGA" + fields.length +"'>"+

        "<div class='col-2 py-1 mx-auto'>"+
        "<div class='row'>"+
        "</div>"+
        "  <div class='row'>"+
        "<input type='text' name='positionTitle" + fields.length +"'  id='positionTitleOPSGA" +fields.length+ "' class='form-control OPSGA_title' placeholder='Position Title'>"+
        "  </div>"+
        " </div>"+

        "  <div class='col-2 py-1 mx-auto'>"+
        "<div class='row'>"+
        "   </div>"+
        "<div class='row'>"+
        "<input type='text' name='hourlyRate"+fields.length+ "' class='form-control OPSGA_hourly_rate' id='hourlyRateOPSGA"+fields.length+"' placeholder='Hourly Rate'>"+
        " </div>"+
        "</div>"+
        " <div class='col-2 py-1 mx-auto'>"+
        "  <div  class='row'>"+
        "    </div>"+
        "  <div class='row'>"+
        " <input type='text' name='hoursPerWeek"+fields.length+"' class='form-control OPSGA_hours_week' id='hoursPerWeekOPSGA"+fields.length+"' placeholder='Hours per Week'>"+
        " </div>"+
        "</div>"+
        "  <div class='col-2 py-1 mx-auto'>"+
        " <div class='row'>"+
        "    </div>"+
        " <div class='row'>"+
        " <input type='text' name='weeksPerYear"+fields.length+"' class='form-control OPSGA_weeks_year' id='weeksPerYearOPSGA"+fields.length+"' placeholder='Weeks per Year'>"+
        "</div>"+
        "   </div>"+

        "<button type='button' class='btn btn-danger' id='OPSGA" + fields.length +"' onclick='removeFieldOPSGA(this.id)'>-</button>"+
        "</div>";


    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newelem);

   }

   function addExpense(){
    var fields = document.getElementsByClassName("Expenses");
    var newelem = "<div class='form-group row Expenses' id='expenses"+fields.length+"'><div class='col-2'><input type='text' name='expenseName"+fields.length+"' id='expenseName"+fields.length+"' class='form-control expenseName' placeholder='Subject'></div><div class='col-8'><input type='text' name='expenseData"+fields.length+"'  id='expenseData"+fields.length+"' class='form-control expenseAmount' placeholder='Amount'></div><button type='button' class='btn btn-danger' id='expenses"+fields.length+"'onclick='removeFieldExpense(this.id)'>-</button></div>";
    console.log(newelem);
    fields[fields.length-1].insertAdjacentHTML("afterend", newelem);
   }


   function removeFieldExpense(btn){

   var id = btn.split("expenses")[1];
   console.log(id);
   var name = document.getElementById("expenseName"+id).value;

   var amount = document.getElementById("expenseData"+id).value;


   $("#"+btn).remove();

   var xmlhttp = new XMLHttpRequest();
   var dat = new FormData();
   xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
     console.log(this.responseText);
    }
   }
   dat.append("name",name);
   dat.append("amount",amount);


   xmlhttp.open("POST","checkExpenses.php");
   xmlhttp.send(dat);

  }




   function addt_Out(){
    var fields = document.getElementsByClassName("t_Out");
    var newelem = " <div class='form-group row t_Out' id='t_Out"+fields.length+"'> <div class='col-2'><input type='text' name='t_out_Subject"+fields.length+"' id='t_out_Subject"+fields.length+"' placeholder='Subject' class='form-control t_out_Subject'> </div><div class='col-8'><input type='text' name='t_out_Amount"+fields.length+"' class='form-control t_out_Amount' id='t_out_Amount"+fields.length+"' placeholder='Amount'> </div><button type='button' class='btn btn-danger' id='t_Out"+fields.length+"' onclick='removeFieldT_Out(this.id)'>-</button></div>";
    console.log(newelem);
    fields[fields.length-1].insertAdjacentHTML("afterend", newelem);
   }
   function removeFieldT_Out(btn){

   var id = btn.split("t_Out")[1];
   console.log(id);
   var subject = document.getElementById("t_out_Subject"+id).value;

   var amount = document.getElementById("t_out_Amount"+id).value;


   $("#"+btn).remove();

   var xmlhttp = new XMLHttpRequest();
   var dat = new FormData();
   xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
     console.log(this.responseText);
    }
   }
   dat.append("subject",subject);
   dat.append("amount",amount);


   xmlhttp.open("POST","checkT_Out.php");
   xmlhttp.send(dat);

  }

   function postOperatingFund(){
    var smart_Tag = document.getElementById("smartTag").value;
    var accountName = document.getElementById('accountName').value;
    var student_budget = document.getElementById('student_budget').options[document.getElementById('student_budget').selectedIndex].value;
    var managerName = document.getElementById('nameTitle').value;
    var managerTelephone = document.getElementById('telephone').value;
    var managerEmail = document.getElementById('emailAddress').value;
    var managerSignature = document.getElementById('signature').value;
    var salariesBenefits = document.getElementById('salariesBenefits').value;
    var ops = document.getElementById('OPS').value;
    var graduateAss = document.getElementById('graduateAss').value;
    var expenses = document.getElementById('expense').value;

    var transfersOut = document.getElementById('transfersOut').value;

    var xmlhttp = null;
    var dat = new FormData();
    dat.append("smart_Tag", smart_Tag);
    dat.append("accountName", accountName);
    dat.append("student_budget", student_budget);
    dat.append("managerName", managerName);
    dat.append("managerEmail", managerEmail);
    dat.append("managerSignature", managerSignature);
    dat.append("managerTelephone", managerTelephone);
    dat.append("salariesBenefits", salariesBenefits);
    dat.append("OPS", ops);
    dat.append("graduateAss", graduateAss);
    dat.append("expenses", expenses);
    dat.append("transfersOut", transfersOut);
    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","operationFund.php");

    xmlhttp.send(dat);

   }


   function postAMP(){
    var positionNumber = [];
    var NodeList = document.querySelectorAll(".AMP_number");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     positionNumber.push(classes[v]);
    }
    console.log("TEREFEF WE00");
    console.log(classes[0]);

    var positionTitle = [];

    NodeList = document.querySelectorAll(".AMP_title");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     positionTitle.push(classes[v]);
    }

    var fte= [];
    NodeList = document.querySelectorAll(".fteAMP");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     fte.push(classes[v]);
    }


    var rate= [];
    var NodeList = document.querySelectorAll(".rate_AMP");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     rate.push(classes[v]);
    }
    var state = [];
    var NodeList = document.querySelectorAll(".state_AMP");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     state.push(classes[v]);
    }

    var xmlhttp = null;
    var dat = new FormData();
    dat.append("positionNumber", positionNumber);
    dat.append("positionTitle", positionTitle);
    dat.append("fte", fte);
    dat.append("annual_Rate", rate);
    dat.append("state", state);

    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","fauSalaryAMP.php");

    xmlhttp.send(dat);

   }

   function postSP(){
    var positionNumber = [];
    var NodeList = document.querySelectorAll(".SP_number");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     positionNumber.push(classes[v]);
    }
    console.log("TEREFEF WE00");
    console.log(classes[0]);

    var positionTitle = [];

    NodeList = document.querySelectorAll(".SP_title");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     positionTitle.push(classes[v]);
    }

    var fte= [];
    NodeList = document.querySelectorAll(".fteSP");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     fte.push(classes[v]);
    }


    var rate= [];
    var NodeList = document.querySelectorAll(".rate_SP");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     rate.push(classes[v]);
    }
    var state = [];
    var NodeList = document.querySelectorAll(".state_SP");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     state.push(classes[v]);
    }

    var xmlhttp = null;
    var dat = new FormData();
    dat.append("positionNumber", positionNumber);
    dat.append("positionTitle", positionTitle);
    dat.append("fte", fte);
    dat.append("annual_Rate", rate);
    dat.append("state", state);

    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","fauSalarySP.php");

    xmlhttp.send(dat);

   }

   function postOPS(){
    var positionTitle = [];
    var NodeList = document.querySelectorAll(".OPS_title");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     positionTitle.push(classes[v]);
    }
    console.log("TEREFEF WE00");
    console.log(classes[0]);

    var student = [];

    NodeList = document.querySelectorAll(".OPS_student");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     student.push(classes[v]);
    }

    var hourly_rate= [];
    NodeList = document.querySelectorAll(".OPS_hourly_rate");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     hourly_rate.push(classes[v]);
    }


    var hours_week= [];
    var NodeList = document.querySelectorAll(".OPS_hours_week");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     hours_week.push(classes[v]);
    }
    var weeks_year = [];
    var NodeList = document.querySelectorAll(".OPS_weeks_year");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     weeks_year.push(classes[v]);
    }

    var people_position = [];
    var NodeList = document.querySelectorAll(".OPS_people");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     people_position.push(classes[v]);
    }

    var xmlhttp = null;
    var dat = new FormData();
    dat.append("positionTitle", positionTitle);
    dat.append("student", student);
    dat.append("hourly_rate", hourly_rate);
    dat.append("hours_week", hours_week);
    dat.append("weeks_year", weeks_year);
    dat.append("people_position", people_position);

    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","fauOPS.php");

    xmlhttp.send(dat);

   }


   function postOPSGA(){
    var positionTitle = [];
    var NodeList = document.querySelectorAll(".OPSGA_title");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     positionTitle.push(classes[v]);
    }
    console.log("TEREFEF WE00");
    console.log(classes[0]);


    var hourly_rate= [];
    NodeList = document.querySelectorAll(".OPSGA_hourly_rate");
    classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     hourly_rate.push(classes[v]);
    }


    var hours_week= [];
    var NodeList = document.querySelectorAll(".OPSGA_hours_week");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     hours_week.push(classes[v]);
    }
    var weeks_year = [];
    var NodeList = document.querySelectorAll(".OPSGA_weeks_year");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     weeks_year.push(classes[v]);
    }

    console.log(weeks_year);

    var xmlhttp = null;
    var dat = new FormData();
    dat.append("positionTitle", positionTitle);
    dat.append("hourly_rate", hourly_rate);
    dat.append("hours_week", hours_week);
    dat.append("weeks_year", weeks_year);
    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","fauOPSGA.php");

    xmlhttp.send(dat);

   }

   function postFAUExpenses(){
    var expenseName = [];
    var NodeList = document.querySelectorAll(".expenseName");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     expenseName.push(classes[v]);
    }

    var expenseAmount = [];
    NodeList = document.querySelectorAll(".expenseAmount");
    classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     expenseAmount.push(classes[v]);
    }

    var supportServices = document.getElementById("supportServices").value;
    var foodServices = document.getElementById("foodServices").value;
    var programServices = document.getElementById("programServices").value;
    var travel = document.getElementById("travel").value;




    var xmlhttp = null;
    var dat = new FormData();
    dat.append("supportServices", supportServices);
    dat.append("programServices", programServices);
    dat.append("foodServices", foodServices);
    dat.append("travel", travel);
    dat.append("expenseAmount", expenseAmount);
    dat.append("expenseName", expenseName);
    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","fauExpenses.php");

    xmlhttp.send(dat);

   }


   function postFAUT_Out(){
    var t_out_Subject = [];
    var NodeList = document.querySelectorAll(".t_out_Subject");
    var classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     t_out_Subject.push(classes[v]);
    }

    var t_out_Amount = [];
    NodeList = document.querySelectorAll(".t_out_Amount");
    classes = Array.prototype.map.call(NodeList, function(element) {
     console.log(element.value);
     return element.value;
    });
    for(var v = 0; v<classes.length; v++){
     console.log(classes[0]);
     t_out_Amount.push(classes[v]);
    }




    var xmlhttp = null;
    var dat = new FormData();
    dat.append("t_out_Subject", t_out_Subject);
    dat.append("t_out_Amount", t_out_Amount);
    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    xmlhttp.open("POST","fauT_Out.php");

    xmlhttp.send(dat);

   }

   function postComments(){
var commentSalaries = document.getElementById("commentSalaries").value;
var commentOPS = document.getElementById("commentOPS").value;
var commentOPSGA = document.getElementById("commentOPSGA").value;
var commentSupport = document.getElementById("commentSupport").value;
var commentFood = document.getElementById("commentFood").value;
var commentPrograms = document.getElementById("commentPrograms").value;
var commentTravel = document.getElementById("commentTravel").value;
var commentOther = document.getElementById("commentOther").value;
var commentT_Out = document.getElementById("commentT_Out").value;

var dat = new FormData();
dat.append("commentSalaries",commentSalaries);
dat.append("commentOPS",commentOPS);
dat.append("commentOPSGA",commentOPSGA);
dat.append("commentSupport",commentSupport);
dat.append("commentFood",commentFood);
dat.append("commentPrograms",commentPrograms);
dat.append("commentTravel",commentTravel);
dat.append("commentOther",commentOther);
dat.append("commentT_Out",commentT_Out);
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
    console.log(this.responseText);
}
   }
   xmlhttp.open("POST", "FAU_Supplementary.php");
   xmlhttp.send(dat);
 }

   function exitForm(){

    var xmlhttp = null;
    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
      window.location = "../all_forms.php";
     }
    };
    xmlhttp.open("GET","exitForm.php");
    xmlhttp.send();


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

  </script>


  <?php
  include("../footer.php");?>

 </body>
</html>
