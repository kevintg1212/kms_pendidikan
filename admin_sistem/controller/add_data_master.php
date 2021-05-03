<?php 
include 'conn.php';
session_start();

    $jenjang_pendidikan = $_POST['jenjang_pendidikan'];

    $kebutuhan_khusus = $_POST['kebutuhan_khusus'];

    if($jenjang_pendidikan != ""){
        $stmt1 = $db2->prepare("INSERT into `jenjang_pendidikan` (jenjang_pendidikan) value (?)");
        $stmt1->bind_param("s", $jenjang_pendidikan);
        
    
        $stmt1->execute();
        $stmt1->close();
    }
    
    if ( $kebutuhan_khusus != "" ){
        $stmt2 = $db2->prepare("INSERT into `kebutuhan_khusus` (kebutuhan_khusus) value (?)");
        $stmt2->bind_param("s", $kebutuhan_khusus);
        
    
        $stmt2->execute();
        $stmt2->close();
    }
    

    header("location:../data_master.php");

?>