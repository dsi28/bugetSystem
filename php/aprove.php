<?php
$url = $_POST['url'];
//for $approver we need to get the user name
//for $doc_name we need the doc_name
  include("connectionForm.php");
$query1 = "select doc_name from doc_status where doc_name ='".$doc_name."' "; 
$result = $connection->exec($query1);
$count = $result->rowCount();
    if($count==0){
         try{   
                $query = "insert into doc_status(doc_name, approval, edit_status, approver) 
                values('".$doc_name."', 'Y', 'A', '".$approver."')";
    echo $query;
    $connection->exec($query);
  }catch(Exception $e){
    echo $e->getMessage(); 
  }
}else {
       try{ 
            $query2="update doc_status set approval='Y', edit_status='A', approver='".$approver."' where doc_name='".$doc_name."' ";    
            echo $query2;
            $connection->exec($query2);
       }catch(Exception $e){
            echo $e->getMessage();
       }
    }

header("location:$url");
?>