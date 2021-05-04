<?php 
include 'conn.php';
session_start();

    $npsn = $_POST['npsn'];

    $status = $_POST['status'];

    $stmt1 = $db2->prepare("UPDATE `layananpendidikan` SET `status_data` = ? WHERE npsn = ?");
    $stmt1->bind_param("ss", $status, $npsn);
        
    
    $stmt1->execute();
    $stmt1->close();
    

    header("location:../validasi_layanan.php");

?>