<?php 
include 'conn.php';
    $id_jenjangpendidikan = $_POST['id_jenjangpendidikan2'];
    $id_kebutuhankhusus = $_POST['id_kebutuhankhusus2'];

    if($id_jenjangpendidikan!= ""){
        $stmt = $db2->prepare("DELETE from `jenjang_pendidikan` where id_jenjangpendidikan = ? ");
        $stmt->bind_param("s",  $id_jenjangpendidikan);
        
    
        $stmt->execute();
        $stmt->close();
    }

    if($id_kebutuhankhusus!= ""){
        $stmt = $db2->prepare("DELETE from `kebutuhan_khusus` where id_kebutuhankhusus = ? ");
        $stmt->bind_param("s",  $id_kebutuhankhusus);
        
    
        $stmt->execute();
        $stmt->close();
    }
    
    header("location:../data_master.php?");

?>