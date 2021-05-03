<?php 
include 'conn.php';
session_start();

    $nama_topik = $_POST['nama_topik'];

    $stmt1 = $db2->prepare("INSERT into `topik` (nama_topik) value (?)");
    $stmt1->bind_param("s", $nama_topik);


    $stmt1->execute();
    $stmt1->close();
    

    header("location:../data_topik_ulasan.php");

?>