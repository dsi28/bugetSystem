
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
  <div id="top"></div>
  <div class="container">

  <form id="uwide2" method="post" action="reserve.php">

<br><br><br>
  <h1>Reserve Fund Summary &amp; Detail</h1>

  <h3>TRANSFERS IN : 2018-2019 Requested Budget</h3>
  <div class="form-group">
   <label for="transfersIn" class="col-sm-2 col-form-label">Transfers In from TAG(s):</label>
   <div class="row  transferIn" >
    <div class="col-5">
     <input type="text" name="transfersInName"  id="transfersInName" class="form-control" placeholder="Transfers In (Subject)">
    </div>
    <div class="col-5">
     <input type="text" name="transfersInValue"  id="transfersInValue" class="form-control" placeholder="Amount">
    </div>
   </div>
   <button type="button" class="btn btn-primary mt-2" onclick="addTransferIn()"> +Add</button>
  </div>

  <h3>EXPENSES : 2018-2019 Requested Budget</h3>
  <div class="form-group ">
   <label for="expenses" class="col-sm-2 col-form-label">Expenses:</label>
   <div class="row Expenses">
    <div class="col-5">
     <input type="text" name="expensesName" class="form-control"  id="expensesName" placeholder="Expenses(Subject)">
    </div>
    <div class="col-5">
     <input type="text" name="expensesValue" class="form-control"  id="expensesValue" placeholder="Amount">
    </div>
   </div>
  </div>
    <button  type="button" class="btn btn-primary mt-2" onclick="addExpenses()"> +Add</button>

  <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
  <div class="form-group ">
   <label for="transfersOut" class="col-sm-2 col-form-label">Transfers Out from TAG(s):</label>
   <div class="row  transferOut" >
    <div class="col-5">
     <input type="text" name="transfersOutName"  id="transfersOutName" class="form-control" placeholder="Transfers Out(Subject)">
    </div>
    <div class="col-5">
     <input type="text" name="transfersOutValue"  id="transfersOutValue" class="form-control" placeholder="Amount">
    </div>
   </div>
  </div>
  <button type="button" class="btn btn-primary mt-2" onclick="addTransferOut()"> Add</button>

  <br>

  <h1>Supplemental Form: Reserve</h1>

  <h3>TRANSFERS IN : 2017-2018 Approved Budget</h3>
  <div class="form-group row">
   <label for="transfersIn2" class="col-sm-2 col-form-label">Transfers In</label>
   <div class="col-sm-10">
    <input type="text" name="ptransfersIn" class="form-control" id="ptransfersIn2" placeholder="Transfers In">
   </div>
  </div>

  <h3>EXPENSES : 2018-2019 Requested Budget</h3>
  <div class="form-group row">
   <label for="expenses2" class="col-sm-2 col-form-label">Expenses</label>
   <div class="col-sm-10">
    <input type="text" name="p_expenses" class="form-control"  id="p_expenses2" placeholder="Expenses">
   </div>
  </div>

  <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
  <div class="form-group row">
   <label for="transfersOut2" class="col-sm-2 col-form-label">Transfers Out</label>
   <div class="col-sm-10">
    <input type="text" name="ptransfersOut" class="form-control" id="ptransfersOut" placeholder="Transfers Out">
   </div>
  </div>

  <h3>TRANSFERS IN : Justification</h3>
  <div class="form-group row">
   <label for="comment">Comment:</label>
   <textarea class="form-control" rows="5" name="transferInjustification" id="transferInjustification"></textarea>
  </div>

  <h3>EXPENSES : Justification</h3>
  <div class="form-group row">
   <label for="comment">Equipment:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_equipment" id="expensesJustification_equipment"></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Improvements:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_improvement" id="expensesJustification_improvement"></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Contingencies:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_contingencies" id="expensesJustification_contingencies"></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Other(if applicable):</label>
   <textarea class="form-control" rows="5" name="expensesJustification_other" id="expensesJustification_other"></textarea>
  </div>

  <h3>TRANSFERS OUT : Justification</h3>
  <div class="form-group">
   <label for="comment">Comment:</label>
   <textarea class="form-control" rows="5" name="transferOutjustification" id="transferOutjustification"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
<br><br><br>
  </form>

</div>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  <script type="text/javascript">
   function addTransferIn(){
       var fields = document.getElementsByClassName("transferIn");
    var newel =  " <div class='row transferIn mt-2' id='t_in"+fields.length+"'>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersInName"+fields.length+ "'" +  "id='transfersInName"+fields.length+ "' class='form-control'"+ "placeholder='Transfers In (Subject)'>"+
        "</div>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersInValue"+fields.length+ "'" + + "id='transfersInValue"+fields.length+ "'  class='form-control'" + "placeholder='Amount'>"+
        "</div>"+
            "<buttton type='button' class='btn btn-danger' id='t_in"+fields.length+"' onclick='removeField(this.id)'>-</button>"+
        "</div>";
;
    console.log(newel);

    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);


   }

   function addExpenses(){
     var fields = document.getElementsByClassName("Expenses");
    var newel =  "<div class='row Expenses mt-2' id='expenses"+fields.length+"'>"+
        "<div class='col-5'>"+
        "<input type='text'"+" name='expensesName"+fields.length+ "' class='form-control' "+" id='expensesName"+fields.length+ "'" +" placeholder='Expenses(Subject)'>"+
        " </div>"+
        "<div class='col-5'>"+
        "<input type='text' "+"name='expensesValue"+fields.length+ "' class='form-control'"+"  id='expensesValue"+fields.length+ "'" +" placeholder='Amount'>"+
        "</div>"

        +"<buttton type='button' class='btn btn-danger' id='expenses"+fields.length+"' onclick='removeField(this.id)'>-</button>"+  "</div>"+
    "</div>";


      console.log(newel);
    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
   }

   function addTransferOut(){
    var fields = document.getElementsByClassName("transferOut");
    var newel =  " <div class='row transferOut mt-2' id='t_out"+fields.length+"'>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersOutName"+fields.length+ "'" +  "id='transfersOutName"+fields.length+ "' class='form-control'"+ "placeholder='Transfers In (Subject)'>"+
        "</div>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersOutValue"+fields.length+ "'" + "id='transfersOutValue"+fields.length+ "' class='form-control'" + "placeholder='Amount'>"
          +"</div>"+
       "<buttton type='button' class='btn btn-danger' id='t_out"+fields.length+"' onclick='removeField(this.id)'>-</button>"+  "</div>"+
        "</div>";
        console.log(newel);

    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
   }



   function removeField(id){
     $('#'+id).remove();
   }


  </script>
	 <?php
		include("../footer.php");?>
 </body>
</html>
