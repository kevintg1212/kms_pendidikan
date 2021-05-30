<?php 
include 'conn.php';
    $npsn = $_POST['npsn'];

        $stmt = $db2->prepare("DELETE from `layananpendidikan` where npsn = ? ");
        $stmt->bind_param("s",  $npsn);
        
    
        $stmt->execute();
        $stmt->close();

        $stmt2 = $db2->prepare("DELETE from `kebutuhankhusus_layananpendidikan` where npsn = ? ");
        $stmt2->bind_param("s",  $npsn);
        
    
        $stmt2->execute();
        $stmt2->close();


        $stmt3 = $db2->prepare("DELETE from `jenjang_layananpendidikan` where npsn = ? ");
        $stmt3->bind_param("s",  $npsn);
        
    
        $stmt3->execute();
        $stmt3->close();


        $stmt4 = $db2->prepare("DELETE from `detail_layananpendidikan` where npsn = ? ");
        $stmt4->bind_param("s",  $npsn);
        
    
        $stmt4->execute();
        $stmt4->close();


        $stmt4 = $db2->prepare("DELETE from `ulasan` where npsn = ? ");
        $stmt4->bind_param("s",  $npsn);
        
    
        $stmt4->execute();
        $stmt4->close();

    
    header("location:../pengajuan_penghapusan.php?");

?>