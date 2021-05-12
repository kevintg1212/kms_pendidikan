<?php 
include 'conn.php';
session_start();

    $id_jenjangpendidikan = $_POST['id_jenjangpendidikan1'];
    $jenjang_pendidikan = $_POST['jenjang_pendidikan2'];

    $id_kebutuhankhusus = $_POST['id_kebutuhankhusus1'];
    $kebutuhan_khusus = $_POST['kebutuhan_khusus'];

    if($id_jenjangpendidikan != 0){
        $stmt1 = $db2->prepare("UPDATE `jenjang_pendidikan` set jenjang_pendidikan=? where id_jenjangpendidikan=? ");
        $stmt1->bind_param("ss", $jenjang_pendidikan, $id_jenjangpendidikan);
        
    
        $stmt1->execute();
        $stmt1->close();
    }
    
    if ( $id_kebutuhankhusus != 0 ){
        $stmt2 = $db2->prepare("UPDATE `kebutuhan_khusus` set kebutuhan_khusus=? where id_kebutuhankhusus=? ");
        $stmt2->bind_param("ss", $kebutuhan_khusus, $id_kebutuhankhusus);
        
    
        $stmt2->execute();
        $stmt2->close();
    }
    

    header("location:../data_master.php");

?>