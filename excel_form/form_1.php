<?php session_start(); ?>
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
 </head>
 <body>

  <?php  include("../navbar_signed.php");?>
  <div class="container">

   <div id="top" class="mt-3"></div>
   <form id="uwide" method="post" action="">
	   <br><br>
    <h2 id = "department">Jupiter Burrow Activity Center</h2>
    <input name="department" id = "department_hidden" type="hidden" value='1'>

    <select id="department_dropdown" onChange="departmentChange()">
     <option value="0" >Jupiter Burrow Activity Center</option>
     <option value="1">Jupiter Campus Rec</option>
     <option value="2">Broward Wellness Center</option>
     <option value="3">Broward Program Board</option>
     <option value="4">Student Involvement and Leardship-Davie</option>
     <option value="5">Davie Student Union Operation</option>
     <option value="6">Jupiter Program Board</option>
     <option value="7">Boca Campus Recreation</option>
     <option value="8">SG Banquet</option>
     <option value="9">Travel Conference (Boca Club Conference)</option>
     <option value="10">Boca Raton Program Board(Boca Program Board)</option>
     <option value="11">Student Media(Director of Student Media)</option>
     <option value="12">Diversity Award Training</option>
     <option value="13">Graduate &amp; Professional Student Orgs (GPSO)</option>
     <option value="14">iCommute</option>

    </select>

    <h3>2016-2017 Approved Budget</h3>
    <div class="form-group row">
     <label for="S/B" class="col-sm-2 col-form-label">SB</label>
     <div class="col-sm-10">
      <input type="text" name="SB1"  id="sb1" class="form-control" placeholder="S/B">
     </div>
    </div>
    <input type="hidden" value="" name="data" id="data">
    <div class="form-group row">
     <label for="OPS" class="col-sm-2 col-form-label">OPS</label>
     <div class="col-sm-10">
      <input type="text" name="OPS1" class="form-control"  id="ops1" placeholder="OPS">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPSGA" class="col-sm-2 col-form-label">OPSGA</label>
     <div class="col-sm-10">
      <input type="text" name="OPSGA1" class="form-control" id="opsga1" placeholder="OPSGA">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPSACA" class="col-sm-2 col-form-label">OPSACA</label>
     <div class="col-sm-10">
      <input type="text" name="OPSACA1" class="form-control" id="opsaca1" placeholder="OPSACA">
     </div>
    </div>

    <div class="form-group row">
     <label for="EXP" class="col-sm-2 col-form-label">EXP</label>
     <div class="col-sm-10">
      <input type="text" name="EXP1" class="form-control"  id="exp1" placeholder="EXP">
     </div>
    </div>

    <h3>2017-2018 Budget Requests</h3>
    <div class="form-group row">
     <label for="S/B" class="col-sm-2 col-form-label">SB</label>
     <div class="col-sm-10">
      <input type="text" name="SB2" class="form-control" id="sb2" placeholder="S/B">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPS" class="col-sm-2 col-form-label">OPS</label>
     <div class="col-sm-10">
      <input type="text" name="OPS2" class="form-control" id="ops2" placeholder="OPS">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPSGA" class="col-sm-2 col-form-label">OPSGA</label>
     <div class="col-sm-10">
      <input type="text" name="OPSGA2" class="form-control" id="opsga2"  placeholder="OPSGA">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPSACA" class="col-sm-2 col-form-label">OPSACA</label>
     <div class="col-sm-10">
      <input type="text" name="OPSACA2" class="form-control" id="opsaca2" placeholder="OPSACA">
     </div>
    </div>

    <div class="form-group row">
     <label for="EXP" class="col-sm-2 col-form-label">EXP</label>
     <div class="col-sm-10">
      <input type="text" name="EXP2" class="form-control" id="exp2" placeholder="EXP">
     </div>
    </div>

    <h3>2017-2018 Approved Budget Requests</h3>
    <div class="form-group row">
     <label for="S/B" class="col-sm-2 col-form-label">SB</label>
     <div class="col-sm-10">
      <input type="text" name="SB3" class="form-control" id="sb3" placeholder="S/B">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPS" class="col-sm-2 col-form-label">OPS</label>
     <div class="col-sm-10">
      <input type="text" name="OPS3" class="form-control" id="ops3" placeholder="OPS">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPSGA" class="col-sm-2 col-form-label">OPSGA</label>
     <div class="col-sm-10">
      <input type="text" name="OPSGA3" class="form-control" id="opsga3" placeholder="OPSGA">
     </div>
    </div>

    <div class="form-group row">
     <label for="OPSACA" class="col-sm-2 col-form-label">OPSACA</label>
     <div class="col-sm-10">
      <input type="text" name="OPSACA3" class="form-control" id="opsaca3" placeholder="OPSACA">
     </div>
    </div>

    <div class="form-group row">
     <label for="EXP" class="col-sm-2 col-form-label">EXP</label>
     <div class="col-sm-10">
      <input type="text" name="EXP3" class="form-control" id="exp3" placeholder="EXP">
     </div>
    </div>

    <button onclick ="nextFormUwide()" type="button" class="btn btn-primary text-white" href="#top" id="next"><a href="#top" class="text-white">NEXT</a></button> <!--Find a way to do it on background -->
    <button type="button" onclick="nextFormUwide()" id="submit_btn" class="btn btn-success" >Submit final draft</button>
   </form>
	  
	  <br>
	  <br>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  <script>
   var counter = 0;
   var json_array = [];
   var json_object = null;
   var departmentArray = ['Jupiter Burrow Activity Center', 'Jupiter Campus Rec', 'Broward Wellness Center', 'Broward Program Board', 'Student Involement and Leadership-Davie', 'Davie Student Union Operation', 'Jupiter Program Board(MacArthur Program Board)', 'Boca Campus Recreation', 'SG Banquet(Banquet)', 'Travel Converence (Boca Club Conference)', 'Boca Raton Program Board(Boca Program Board)', 'Student Media(Director of Student Media)', 'Diversity Award Training', 'Graduate & Professional Student Orgs(GPSO)', 'iCommute'];
   document.getElementById("submit_btn").style.display = "none";
   function nextFormUwide(){

    var dropdown_depart = document.getElementById("department_dropdown");


    //If the obj is already in the array, we display it. 
    var index = checkArray(departmentArray[counter+1], json_array);
    if(index >-1){
     //Setting the values of the input fields
     document.getElementById('sb1').setAttribute("value",json_array[index]['first_section']['SB']);
     document.getElementById('sb2').setAttribute("value",json_array[index]['second_section']['SB']);
     document.getElementById('sb3').setAttribute("value",json_array[index]['third_section']['SB']);
     document.getElementById('ops1').setAttribute("value", json_array[index]['first_section']['OPS']);
     document.getElementById('ops2').setAttribute("value", json_array[index]['second_section']['OPS']);
     document.getElementById('ops3').setAttribute("value", json_array[index]['third_section']['OPS']);
     document.getElementById('opsga1').setAttribute("value", json_array[index]['first_section']['OPSGA']);
     document.getElementById('opsga2').setAttribute("value", json_array[index]['second_section']['OPSGA']);
     document.getElementById('opsga3').setAttribute("value", json_array[index]['third_section']['OPSGA']);
     document.getElementById('opsaca1').setAttribute("value", json_array[index]['first_section']['OPSACA']);
     document.getElementById('opsaca2').setAttribute("value", json_array[index]['second_section']['OPSACA']);
     document.getElementById('opsaca3').setAttribute("value", json_array[index]['third_section']['OPSACA']);
     document.getElementById('exp1').setAttribute("value", json_array[index]['first_section']['EXP']);
     document.getElementById('exp2').setAttribute("value", json_array[index]['second_section']['EXP']);
     document.getElementById('exp3').setAttribute("value", json_array[index]['third_section']['EXP']);
		
    }

    var array = departmentArray[counter];

    if(counter < departmentArray.length-1)
    {
     var dpment = array;
     var sb1 = document.getElementById('sb1').value;
     var ops1 = document.getElementById('ops1').value;
     var opsga1 = document.getElementById('opsga1').value;
     var opsaca1 = document.getElementById('opsaca1').value;
     var exp1 = document.getElementById('exp1').value;
     //Second section
     var sb2 = document.getElementById('sb2').value;
     var ops2 = document.getElementById('ops2').value;
     var opsga2 = document.getElementById('opsga2').value;
     var opsaca2 = document.getElementById('opsaca2').value;
     var exp2 = document.getElementById('exp2').value;
     //Third Section
     var sb3 = document.getElementById('sb3').value;
     var ops3 = document.getElementById('ops3').value;
     var opsga3 = document.getElementById('opsga3').value;
     var opsaca3 = document.getElementById('opsaca3').value;
     var exp3 = document.getElementById("exp3").value;
     var exp_3 = exp3;
     var role = document.getElementById("brand").innerHTML;

     post(); //Posting data to server
     json_object = createJSON(dpment,sb1, ops1, opsga1, opsaca1, exp1,sb2, ops2, opsga2, opsaca2, exp2, sb3, ops3, opsga3, opsaca3, exp_3, role);
     var index_json = checkArray(json_object["department"],json_array);
     if( index_json < 0){

      console.log(typeof(json_object));

      document.getElementById("data").value = json_object;
      json_array.push(json_object);
     }else{
      updateJSON(dpment,sb1, ops1, opsga1, opsaca1, exp1,sb2, ops2, opsga2, opsaca2, exp2, sb3, ops3, opsga3, opsaca3, exp3, index_json);
     }
    }else{
		post();
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState==4 && this.status==200){
				console.log(this.responseText);
				updateApproval();
				relocate();
			}
		}
		xmlhttp.open('GET', '../email/sendMail.php');
		xmlhttp.send();
		
	
    }
    console.log(json_array); 
    counter +=1;
    document.getElementById('department_hidden').value = counter;
    document.getElementById('department').innerHTML =  departmentArray[counter] ;
    document.getElementById("uwide").reset();
    dropdown_depart.value = counter;
    if(counter == departmentArray.length-1){
     document.getElementById("submit_btn").style.display = "block";
     document.getElementById("next").style.display = "none";
    }else{
     document.getElementById("submit_btn").style.display = "none";    
     document.getElementById("next").style.display = "block";

    }


   }
   //this function updates the JSON if it is already created 
   function updateJSON(dpment,sb1, ops1, opsga1, opsaca1, exp1,sb2, ops2, opsga2, opsaca2, exp2, sb3, ops3, opsga3, opsaca3, exp3, index){

    json_array[index]['first_section']['SB'] = sb1;

    json_array[index]['second_section']['SB'] = sb2;

    json_array[index]['third_section']['SB'] = sb3;

    json_array[index]['first_section']['OPS'] = ops1;

    json_array[index]['second_section']['OPS'] = ops2;

    json_array[index]['third_section']['OPS'] = ops3;

    json_array[index]['first_section']['OPSGA'] = opsga1;

    json_array[index]['second_section']['OPSGA'] = opsga2;

    json_array[index]['third_section']['OPSGA'] = opsga3;

    json_array[index]['first_section']['OPSACA'] = opsaca1;

    json_array[index]['second_section']['OPSACA'] = opsaca2;

    json_array[index]['third_section']['OPSACA']  = opsaca3;

    json_array[index]['first_section']['EXP'] = exp1;

    json_array[index]['second_section']['EXP'] = exp2;

    json_array[index]['third_section']['EXP'] = exp3;
   }

   //this function checks if the object is already in the array (checking its deparment property) returning its index if so, or else, returning -1
   function checkArray(department, json_array){
    if(json_array.length == 0){
     return -1;
    }
    for(var k = 0; k<json_array.length;k++){
     if(json_array[k]["department"] === department){ 
      return k;

     }
    }
    return -1;
   }
   //This function changes the department header of the form as well as filling up all the fields neccessary if the department has been filled previously
   function departmentChange(){
    //This function change title whenever the dropdown value is changed.
    var department = document.getElementById("department_dropdown");
    counter = parseInt(department.options[department.selectedIndex].value);
    console.log(counter);
    var array = department.options[department.selectedIndex].text; 
    document.getElementById('department_hidden').value = counter+1;
    document.getElementById('department').innerHTML = array;
    var index = checkArray(array, json_array);
    if(index != -1){
     //Setting the values of the input fields
     document.getElementById('sb1').setAttribute("value",json_array[index]['first_section']['SB']);
     document.getElementById('sb2').setAttribute("value",json_array[index]['second_section']['SB']);
     document.getElementById('sb3').setAttribute("value",json_array[index]['third_section']['SB']);
     document.getElementById('ops1').setAttribute("value", json_array[index]['first_section']['OPS']);
     document.getElementById('ops2').setAttribute("value", json_array[index]['second_section']['OPS']);
     document.getElementById('ops3').setAttribute("value", json_array[index]['third_section']['OPS']);
     document.getElementById('opsga1').setAttribute("value", json_array[index]['first_section']['OPSGA']);
     document.getElementById('opsga2').setAttribute("value", json_array[index]['second_section']['OPSGA']);
     document.getElementById('opsga3').setAttribute("value", json_array[index]['third_section']['OPSGA']);
     document.getElementById('opsaca1').setAttribute("value", json_array[index]['first_section']['OPSACA']);
     document.getElementById('opsaca2').setAttribute("value", json_array[index]['second_section']['OPSACA']);
     document.getElementById('opsaca3').setAttribute("value", json_array[index]['third_section']['OPSACA']);
     document.getElementById('exp1').setAttribute("value", json_array[index]['first_section']['EXP']);
     document.getElementById('exp2').setAttribute("value", json_array[index]['second_section']['EXP']);
     document.getElementById('exp3').setAttribute("value", json_array[index]['third_section']['EXP']);
    }else{
     document.getElementById('sb1').setAttribute("value"," ");
     document.getElementById('sb2').setAttribute("value"," ");
     document.getElementById('sb3').setAttribute("value"," ");
     document.getElementById('ops1').setAttribute("value"," ");
     document.getElementById('ops2').setAttribute("value"," ");
     document.getElementById('ops3').setAttribute("value"," ");
     document.getElementById('opsga1').setAttribute("value"," ");
     document.getElementById('opsga2').setAttribute("value"," ");
     document.getElementById('opsga3').setAttribute("value"," ");
     document.getElementById('opsaca1').setAttribute("value"," ");
     document.getElementById('opsaca2').setAttribute("value"," ");
     document.getElementById('opsaca3').setAttribute("value"," ");
     document.getElementById('exp1').setAttribute("value"," ");
     document.getElementById('exp2').setAttribute("value"," ");
     document.getElementById('exp3').setAttribute("value"," ");
    }

   }

   function createJSON(dpment,sb1, ops1, opsga1, opsaca1, exp1,sb2, ops2, opsga2, opsaca2, exp2, sb3, ops3, opsga3, opsaca3, exp3, rol){
    //This function generates a Javascript object with the data passed on the arguments 
    var json_obj = {
     department : dpment,
     role: rol,
     first_section: {
      NAME: "2016-2017 Approved Budgets",
      SB : sb1,
      OPS : ops1,
      OPSGA : opsga1,
      OPSACA : opsaca1,
      EXP : exp1
     }

     ,
     second_section: {
      NAME: "2017-2018 Budget Requests",
      SB : sb2,
      OPS : ops2,
      OPSGA : opsga2,
      OPSACA : opsaca2,
      EXP : exp2
     }

     ,
     third_section: {
      NAME: "2017-2018 Approved Budget Request",
      SB : sb3,
      OPS : ops3,
      OPSGA : opsga3,
      OPSACA : opsaca3,
      EXP : exp3
     }

     ,


    }
    //   console.log(json_obj);
    // console.log(json_obj['first_section']);
    //console.log(json_obj['second_section']);
    //console.log(json_obj['third_section']);
    //console.log(JSON.stringify(json_obj));
    return json_obj;
   }
   //Mirar si puedes usar un input para mandar el array 
   function post(){
    console.log("Llamada");
    var department = departmentArray[counter];
    console.log(department);
    console.log(counter);
    var sb1 = document.getElementById('sb1').value;
    console.log(sb1);
    var ops1 = document.getElementById('ops1').value;
    var opsga1 = document.getElementById('opsga1').value;
    var opsaca1 = document.getElementById('opsaca1').value;
    var exp1 = document.getElementById('exp1').value;
    //Second section
    var sb2 = document.getElementById('sb2').value;
    var ops2 = document.getElementById('ops2').value;
    var opsga2 = document.getElementById('opsga2').value;
    var opsaca2 = document.getElementById('opsaca2').value;
    var exp2 = document.getElementById('exp2').value;
    //Third Section
    var sb3 = document.getElementById('sb3').value;
    var ops3 = document.getElementById('ops3').value;
    var opsga3 = document.getElementById('opsga3').value;
    var opsaca3 = document.getElementById('opsaca3').value;
    var exp3 = document.getElementById("exp3").value;
    var exp_3 = exp3;
    var role = document.getElementById("brand").innerHTML;
    // if(confirm("Are you sure you want to submit it?")){

    var xmlhttp = null;
    var dat = new FormData();
    dat.append("department", department);
    dat.append("role", role);
    dat.append("SB1", sb1);
    dat.append("SB2", sb2);
    dat.append("SB3", sb3);
    dat.append("OPS1", ops1);
    dat.append("OPS2", ops2);
    dat.append("OPS3", ops3);
    dat.append("OPSACA1", opsaca1);
    dat.append("OPSACA2", opsaca2);
    dat.append("OPSACA3", opsaca3);
    dat.append("OPSGA1", opsga1);
    dat.append("OPSGA2", opsga2);
    dat.append("OPSGA3", opsga3);
    dat.append("EXP1", exp1);
    dat.append("EXP2", exp2);
    dat.append("EXP3", exp3);
    if(window.XMLHttpRequest){
     xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function(){
     if(this.readyState == 4 && this.status == 200){
      console.log(this.responseText);
     }
    };
    var check = checkArray(department, json_array);
    console.log("CHEEECK" + check);
    if(check == -1){
     xmlhttp.open("POST","uwide_post.php");
     if(counter == departmentArray.length){

     }
    }else{
     xmlhttp.open("POST","uwide_post_update.php");


    }
    xmlhttp.send(dat);








   }

   function relocate(){
	   
	   
    console.log("called");
    var role = '<?php echo $_SESSION['role']; ?>';
	console.log(typeof(role));
    switch(role){
     case 'ASAB':
      window.location = "../asab.php";
      break;
     case 'AGSC':
      window.location = "../agsc.php";
      break;
     case 'CSAB':
      window.location = "../csab.php";
      break;
     case 'SG':
      window.location = "../sg-advisors.php";
      break;
     case 'ACCOUNT':
      window.location = "../manager.php";
      break;
    }
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

 </body>
</html>