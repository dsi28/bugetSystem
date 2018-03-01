<?php

class uwide {


 //public $DEPARTMENT = $SB = $OPS = $OPSGA = $OPSACA = $EXP = $SB2 = $OPS2 = $OPSGA2 = $OPSACA2 = $EXP3 = $SB3 = $OPS3 = $OPSGA3 = $OPSACA3 = $EXP3 = " "; //Mirar esto
 public $DEPARTMENT;
 public $ROLE;
 public $SB;
 public $OPS;
 public $OPSGA;
 public $OPSACA;
 public $EXP;

 public $SB2;
 public $OPS2;
 public $OPSGA2;
 public $OPSACA2;
 public $EXP2;

 public $SB3;
 public $OPS3;
 public $OPSGA3;
 public $OPSACA3;
 public $EXP3;

 public function __construct($DEPARTMENT, $SB, $OPS, $OPSGA, $OPSACA, $EXP, $SB2, $OPS2, $OPSGA2, $OPSACA2, $EXP2, $SB3, $OPS3, $OPSGA3, $OPSACA3,$EXP3, $ROLE){
  $this->DEPARTMENT = $DEPARTMENT;
  $this->SB = $SB;
  $this->OPS = $OPS;
  $this->OPSACA = $OPSACA;
  $this->OPSGA = $OPSGA;	
  $this->EXP = $EXP;	
  $this->SB2 = $SB2;
  $this->OPS2 = $OPS2;
  $this->OPSACA2 = $OPSACA2;
  $this->OPSGA2 = $OPSGA2;	
  $this->EXP2 = $EXP2;	
  $this->SB3 = $SB3;
  $this->OPS3 = $OPS3;
  $this->OPSACA3 = $OPSACA3;
  $this->OPSGA3 = $OPSGA3;	
  $this->EXP3 = $EXP3;	
  $this->ROLE = $ROLE;

 }

 public function insertValues(){
  include("connectionForm.php");
  session_start();

  $DOCID=" ";

  $TIMESTAMP = $_SESSION['timestamp'];
  $query_doc = "SELECT ID FROM DOCS WHERE ROLE='".$this->ROLE."' AND FORM = 1 AND TIME_STAMP = '".$TIMESTAMP."'";
  try{
   $result = $connection->query($query_doc);
   foreach($result as $row){
    $DOCID = $row['ID'];
   }
  }catch(Exception $e){
   echo $e->getMessage();
  }


  $query1 = "SELECT * FROM uwide WHERE ROLE = '".$this->ROLE."' AND ID=$DOCID AND DEPARTMENT='".$this->DEPARTMENT."'";
  echo $query1;
  echo "Select query";

  try{
   $result = $connection->query($query1);
   echo "roowwwwww";
   echo $result->rowCount();
   if(($result->rowCount())>0){
    echo "AQUIIII";
    $this->updateValues();
   }else{
    try{
     //TODO Instead of sending the department name, we send its ID
     echo "INNNNNNNNNNNN";

     $query = "INSERT INTO uwide(ROLE, ID, DEPARTMENT, SB1,OPS1, OPSGA1, OPSACA1, EXP1,
   SB2,OPS2, OPSGA2, OPSACA2, EXP2,
   SB3,OPS3, OPSGA3, OPSACA3, EXP3)
VALUES('".$this->ROLE."',$DOCID,'".$this->DEPARTMENT."', '".$this->SB."', '".$this->OPS."','".$this->OPSGA."', '".$this->OPSACA."', '".$this->EXP."',
                        '".$this->SB2."', '".$this->OPS2."', '".$this->OPSGA2."', '".$this->OPSACA2."', '".$this->EXP2."',
                          '".$this->SB3."', '".$this->OPS3."', '".$this->OPSGA3."', '".$this->OPSACA3."', '".$this->EXP3."')";


     echo $query;
     $connection->exec($query);
    }catch(Exception $e){
     echo $e->getMessage(); 
    }
   }
  }catch(Exception $e){
   $e->getMessage();
  }
 }

 //This function update the values of the row 
 public function updateValues(){
  include("connectionForm.php");
  $DOCID = " ";
  $query_doc = "SELECT ID FROM DOCS WHERE ROLE='".$this->ROLE."' AND FORM=1";
  try{
   $result = $connection->query($query_doc);
   foreach($result as $row){
    $DOCID = $row['ID'];
   }
  }catch(Exception $e){
   echo $e->getMessage();
  }
  try{
   //TODO Instead of sending the department name, we send its ID
   $query = "UPDATE uwide SET SB1 ='".$this->SB."',OPS1 = '".$this->OPS."', OPSGA1 = '".$this->OPSGA."', OPSACA1 = '".$this->OPSACA."', EXP1 = '".$this->EXP."',
  SB2 = '".$this->SB2."',OPS2 = '".$this->OPS2."', OPSGA2 = '".$this->OPSGA2."', OPSACA2 = '".$this->OPSACA2."', EXP2 ='".$this->EXP2."',
  SB3 = '".$this->SB3."',OPS3 = '".$this->OPS3."', OPSGA3 = '".$this->OPSGA3."', OPSACA3 = '".$this->OPSACA3."', EXP3 = '".$this->EXP3."' WHERE DEPARTMENT = '".$this->DEPARTMENT."' AND ROLE='".$this->ROLE."' AND ID=$DOCID";
   echo $query;
   $connection->exec($query);
  }catch(Exception $e){
   echo $e->getMessage(); 
  }
 }

}







/*
$query = "INSERT INTO sportsTable(OPS, EXP, SB, OPS2, EXP2, SB2, OPS3, EXP3)
VALUES('$OPS', '$EXP', '$SB', '$OPS2', '$EXP2', '$SB2', '$OPS3', '$EXP3')";



$result = mysqli_query($smysql, $query);

echo("Form Submitted");


// open the file "demosaved.csv" for writing
$file = fopen('info.csv', 'w');

// save the column headers
fputcsv($file, array('OPS', 'EXP', 'SB', 'OPS2', 'EXP2', 'SB2', 'OPS3', 'EXP3'));

// Sample data. This can be fetched from mysql too
$data = array(
 array("$OPS", "$EXP", "$SB", "$OPS2", "$EXP2", "$SB2", "$OPS3", "$EXP3"),
);

// save each row of the data
foreach ($data as $row)
{
 fputcsv($file, $row);
}

// Close the file
fclose($file);
*/

?>