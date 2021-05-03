<?php 
include 'conn.php';
session_start();

    $id_topik = $_POST['id_topik1'];
    $nama_topik = $_POST['nama_topik'];
    
    $stmt1 = $db2->prepare("UPDATE `topik` set nama_topik=? where id_topik=? ");
    $stmt1->bind_param("ss", $nama_topik, $id_topik);
    

    $stmt1->execute();
    $stmt1->close();

    

    header("location:../data_topik_ulasan.php");

?>