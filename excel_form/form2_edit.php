

<?php
include("connectionForm.php");
session_start();
/*$ROLE = $_SESSION['role'];
$DOCID = $_SESSION['update_form_id'];*/
$ROLE = 'ASAB';
$DOCID =6;
$P_TIN = "";
$P_EXP="";
$P_OUT="";
$T_INT_COMMENT="";
$EXP_COMMENT_1="";
$EXP_COMMENT_2="";
$EXP_COMMENT_3="";
$EXP_COMMENT_4="";
$T_OUT_COMMENT="";

$NAME_T_IN=array();
$AMOUNT_T_IN=array();
$NAME_T_OUT=array();
$AMOUNT_T_OUT=array();
$NAME_EXP=array();
$AMOUNT_EXP=array();

$query_select_update_1 = "SELECT *  FROM reserveFund WHERE ROLE='".$ROLE."' AND ID=$DOCID";
$query_select_update_2 = "SELECT * FROM transfersIn WHERE ROLE='".$ROLE."' AND T_ID= $DOCID";
$query_select_update_3 = "SELECT * FROM transfersOut WHERE ROLE='".$ROLE."' AND T_ID=$DOCID";
$query_select_update_4 = "SELECT * FROM expenses WHERE ROLE='".$ROLE."' AND T_ID=$DOCID";

try{
    $result_1 = $connection->query($query_select_update_1);
    $result_2 = $connection->query($query_select_update_2);
    $result_3 = $connection->query($query_select_update_3);
    $result_4 = $connection->query($query_select_update_4);


  foreach($result_1 as $row){
  $P_TIN = $row['P_TIN'];
  $P_EXP=$row['P_EXP'];
  $P_OUT=$row['P_OUT'];
  $T_INT_COMMENT=$row['T_INT_COMMENT'];
  $EXP_COMMENT_1=$row['EXP_COMMENT_1'];
  $EXP_COMMENT_2=$row['EXP_COMMENT_2'];
  $EXP_COMMENT_3=$row['EXP_COMMENT_3'];;
  $EXP_COMMENT_4=$row['EXP_COMMENT_4'];
  $T_OUT_COMMENT=$row['T_OUT_COMMENT'];
}

}catch(Exception $e){
  echo $e->getMessage();
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

 </head>

 <body>

  <div id="top"></div>
  <div class="container">


  <form id="uwide2" method="post" action="reserve_update.php">


  <h1>Reserve Fund Summary &amp; Detail</h1>

  <h3>TRANSFERS IN : 2018-2019 Requested Budget</h3>
  <div class="form-group">
   <label for="transfersIn" class="col-sm-2 col-form-label">Transfers In from TAG(s):</label>
   <div class="row  transferIn" >
    <div class="col-5">
     <input type="text" name="transfersInName"  id="transfersInName" class="form-control" placeholder="Transfers In (Subject)"  readonly='readonly'>
    </div>
    <div class="col-5">
     <input type="text" name="transfersInValue"  id="transfersInValue" class="form-control" placeholder="Amount">
    </div>
   </div>
  </div>

  <h3>EXPENSES : 2018-2019 Requested Budget</h3>
  <div class="form-group ">
   <label for="expenses" class="col-sm-2 col-form-label">Expenses:</label>
   <div class="row Expenses">
    <div class="col-5">
     <input type="text" name="expensesName" class="form-control"  id="expensesName" placeholder="Expenses(Subject)" readonly='readonly'>
    </div>
    <div class="col-5">
     <input type="text" name="expensesValue" class="form-control"  id="expensesValue" placeholder="Amount">
    </div>
   </div>
  </div>

  <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
  <div class="form-group ">
   <label for="transfersOut" class="col-sm-2 col-form-label">Transfers Out from TAG(s):</label>
   <div class="row  transferOut" >
    <div class="col-5">
     <input type="text" name="transfersOutName"  id="transfersOutName" class="form-control" placeholder="Transfers Out(Subject)" readonly='readonly'>
    </div>
    <div class="col-5">
     <input type="text" name="transfersOutValue"  id="transfersOutValue" class="form-control" placeholder="Amount">
    </div>
   </div>
  </div>

  <br>

  <h1>Supplemental Form: Reserve</h1>

  <h3>TRANSFERS IN : 2017-2018 Approved Budget</h3>
  <div class="form-group row">
   <label for="transfersIn2" class="col-sm-2 col-form-label">Transfers In</label>
   <div class="col-sm-10">
    <input type="text" name="ptransfersIn" class="form-control" id="ptransfersIn2" placeholder="Transfers In" value='<?php echo $P_TIN;?>'>
   </div>
  </div>

  <h3>EXPENSES : 2018-2019 Requested Budget</h3>
  <div class="form-group row">
   <label for="expenses2" class="col-sm-2 col-form-label">Expenses</label>
   <div class="col-sm-10">
    <input type="text" name="p_expenses" class="form-control"  id="p_expenses2" placeholder="Expenses" value='<?php echo $P_EXP;?>'>
   </div>
  </div>

  <h3>TRANSFERS OUT : 2018-2019 Requested Budget</h3>
  <div class="form-group row">
   <label for="transfersOut2" class="col-sm-2 col-form-label">Transfers Out</label>
   <div class="col-sm-10">
    <input type="text" name="ptransfersOut" class="form-control" id="ptransfersOut" placeholder="Transfers Out" value='<?php echo $P_OUT;?>'>
   </div>
  </div>

  <h3>TRANSFERS IN : Justification</h3>
  <div class="form-group row">
   <label for="comment">Comment:</label>
   <textarea class="form-control" rows="5" name="transferInjustification" id="transferInjustification" value='<?php echo $T_INT_COMMENT;?>'></textarea>
  </div>

  <h3>EXPENSES : Justification</h3>
  <div class="form-group row">
   <label for="comment">Equipment:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_equipment" id="expensesJustification_equipment" value='<?php echo $EXP_COMMENT_1;?>'></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Improvements:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_improvement" id="expensesJustification_improvement" value='<?php echo $EXP_COMMENT_2;?>'></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Contingencies:</label>
   <textarea class="form-control" rows="5" name="expensesJustification_contingencies" id="expensesJustification_contingencies" value='<?php echo $EXP_COMMENT_3;?>'></textarea>
  </div>

  <div class="form-group">
   <label for="comment">Other(if applicable):</label>
   <textarea class="form-control" rows="5" name="expensesJustification_other" id="expensesJustification_other" value='<?php echo $EXP_COMMENT_4;?>'></textarea>
  </div>

  <h3>TRANSFERS OUT : Justification</h3>
  <div class="form-group">
   <label for="comment">Comment:</label>
   <textarea class="form-control" rows="5" name="transferOutjustification" id="transferOutjustification" value='<?php echo $T_OUT_COMMENT;?>'></textarea>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>

  </form>

  <footer class="footer">
   <div class="container">
<h1>FOOTER</h1></div>
  </footer>

</div>

  <footer class="footer bg-danger">
  <div class="container">
   <h1>This is my footer</h1>
   </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  <script type="text/javascript">
   function addTransferIn(){
       var fields = document.getElementsByClassName("transferIn");
    var newel =  " <div class='row transferIn mt-2' id='t_in"+fields.length+"'>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersInName"+fields.length+ "'" +  "id='transfersInName"+fields.length+ "' class='form-control'"+ "placeholder='Transfers In (Subject)' readonly='readonly'>"+
        "</div>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersInValue"+fields.length+ "'" +  "id='transfersInValue"+fields.length+ "'  class='form-control'" + "placeholder='Amount'>"+
        "</div>"+
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
        "<input type='text'"+" name='expensesName"+fields.length+ "' class='form-control' "+" id='expensesName"+fields.length+ "'" +" placeholder='Expenses(Subject)' readonly='readonly'>"+
        " </div>"+
        "<div class='col-5'>"+
        "<input type='text' "+"name='expensesValue"+fields.length+ "' class='form-control'"+"  id='expensesValue"+fields.length+ "'" +" placeholder='Amount'>"+
        "</div>"

        +  "</div>"+
    "</div>";


      console.log(newel);
    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
   }

   function addTransferOut(){
    var fields = document.getElementsByClassName("transferOut");
    var newel =  " <div class='row transferOut mt-2' id='t_out"+fields.length+"'>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersOutName"+fields.length+ "'" +  "id='transfersOutName"+fields.length+ "' class='form-control'"+ "placeholder='Transfers In (Subject)' readonly='readonly'>"+
        "</div>"+
        " <div class='col-5'>"+
        "<input type='text'"+ "name='transfersOutValue"+fields.length+ "'" + "id='transfersOutValue"+fields.length+ "' class='form-control'" + "placeholder='Amount'>"
          +"</div>"+
        "</div>"+
        "</div>";
        console.log(newel);

    fields[fields.length-1].insertAdjacentHTML('afterend'
                                               , newel);
   }




   function fillT_IN(name, amount, counter){
     if(counter == 0){
       document.getElementById("transfersInName").value = name;
       document.getElementById("transfersInValue").value = amount;
     }else{
     document.getElementById("transfersInName"+counter).value = name;
     document.getElementById("transfersInValue"+counter).value = amount;
   }
   }

   function fillT_OUT(name, amount, counter){
     if(counter == 0){
       document.getElementById("transfersOutName").value = name;
       document.getElementById("transfersOutValue").value = amount;
     }else{
     document.getElementById("transfersOutName"+counter).value = name;
     document.getElementById("transfersOutValue"+counter).value = amount;
   }
   }

   function fillEXP(name, amount, counter){
     if(counter == 0){
       document.getElementById("expensesName").value = name;
       document.getElementById("expensesValue").value = amount;
     }else{
     document.getElementById("expensesName"+counter).value = name;
     document.getElementById("expensesValue"+counter).value = amount;
   }
   }

  <?php
  $counter= 0;
  foreach($result_2 as $row){

    $NAME_T_IN[$counter]=$row['NAME'];
    $AMOUNT_T_IN[$counter]=$row['AMOUNT'];
    $counter++;
  }
    $counter= 0;
  foreach($result_3 as $row){
    $NAME_T_OUT[$counter]=$row['NAME'];
    $AMOUNT_T_OUT[$counter]=$row['AMOUNT'];
      $counter++;
  }
  $counter= 0;
  foreach($result_4 as $row){
    $NAME_EXP[$counter]=$row['NAME'];
    $AMOUNT_EXP[$counter]=$row['AMOUNT'];
      $counter++;
  }
$counter=0;
$printing = "";
$addingfields = "";
$count = count($NAME_T_IN);
while($counter<$count){
    if($counter>0){
      $addingfields .= "addTransferIn();";
    }
  $printing .= "fillT_IN('$NAME_T_IN[$counter]', $AMOUNT_T_IN[$counter], $counter);\n";

  $counter = $counter+1;

}
$counter = 0;
while($counter<$count){
    if($counter>0){
      $addingfields .= "addTransferOut();";
    }
  $printing .= "fillT_OUT('$NAME_T_OUT[$counter]', $AMOUNT_T_OUT[$counter], $counter);\n";

  $counter = $counter+1;

}
$counter = 0;
while($counter<$count){
    if($counter>0){
      $addingfields .= "addExpenses();";
    }
  $printing .= "fillEXP('$NAME_EXP[$counter]', $AMOUNT_EXP[$counter], $counter);\n";

  $counter = $counter+1;

}
echo $addingfields;
echo $printing;




  ?>
  </script>
 </body>
</html>
