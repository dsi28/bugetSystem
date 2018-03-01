<?php
 
    include 'php/simplexlsx.class.php';

    $user_name = "dizquierdo2014";
    $password_db = "dsi28diz";
    $database = "dizquierdo2014";
    $server = "oraclelinux.eng.fau.edu";
    $test="dizquierdo2014@oraclelinux.eng.fau.edu";

 
    $xlsx = new SimpleXLSX( 'UBAC & CBAC Worksheet.xlsx' );
    try {
      $conn= new PDO("oci:dbname=$test", $user_name, $password_db)
        //$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        //echo $sql . "<br>" . $e->getMessage(); was giving me an error
        $conn = null;
        echo "Error1: " . $e->getMessage();
    }
//try{
    $stmt = $conn->prepare( "INSERT INTO dept_info(doc_name, sheet_name, dept, location, SB, OPS, EXP, SB2, OPS2, EXP2, SB3, OPS3, EXP3, ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam( 1, $doc_name);
    $stmt->bindParam( 2, $sheet_name);
    $stmt->bindParam( 3, $location);
    $stmt->bindParam( 4, $SB);
    $stmt->bindParam( 5, $OPS);
    $stmt->bindParam( 6, $EXP);
    $stmt->bindParam( 7, $SB2);
    $stmt->bindParam( 8, $OPS2);
    $stmt->bindParam( 9, $EXP2);
    $stmt->bindParam( 10, $SB3);
    $stmt->bindParam( 11, $OPS3);
    $stmt->bindParam( 12, $EXP3);
    //$stmt->bindParam( 13, $powp); where is $powp located
//} catch(prepareException e) {
 //       $conn = null;
   //     echo "Error111: " . $e->getMessage();
//}
    foreach ($xlsx->rows() as $fields)
    {
        $doc_name = $fields[0];
        $sheet_name = $fields[1];
        $location = $fields[2];
        $SB = $fields[3];
        $OPS = $fields[4];
        $EXP = $fields[5];
        $SB2 = $fields[6];
        $OPS2 = $fields[7];
        $EXP2 = $fields[8];
        $SB3 = $fields[9];
        $OPS3 = $fields[10];
        $EXP3 = $fields[11];
        //$powp = $fields[12];


        $stmt->execute();
    }