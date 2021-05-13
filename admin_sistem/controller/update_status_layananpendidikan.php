<?php 
include 'conn.php';
session_start();

    $npsn = $_POST['npsn'];
    $status = $_POST['status'];
    if (isset($_POST['status2'])) {
        $status2 = $_POST['status2'];
    }else{
        $status2 = "";
    }
    

    if($status != 'Warning' && $status2 != 'Warning2') {
        $stmt1 = $db2->prepare("UPDATE `layananpendidikan` SET `status_data` = ? WHERE npsn = ?");
        $stmt1->bind_param("ss", $status, $npsn);
            
        
        $stmt1->execute();
        $stmt1->close();
    }

    if($status2 == 'Warning2') {
        $stmt1 = $db2->prepare("UPDATE `layananpendidikan` SET `status_data` = ? WHERE npsn = ?");
        $stmt1->bind_param("ss", $status, $npsn);
            
        
        $stmt1->execute();
        $stmt1->close();
    }

    if($status == 'Warning' && $status2 == '') {
        $_SESSION['option']="warning";
        header("location:../lihat_detail.php?npsn=$npsn");

    } else {
        header("location:../validasi_layanan.php");
    }


?>