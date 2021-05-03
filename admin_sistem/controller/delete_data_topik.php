<?php 
include 'conn.php';
    $id_topik = $_POST['id_topik2'];

    if($id_topik!= ""){
        $stmt = $db2->prepare("DELETE from `topik` where id_topik = ? ");
        $stmt->bind_param("s",  $id_topik);
        
    
        $stmt->execute();
        $stmt->close();
    }

    header("location:../data_topik_ulasan.php?");

?>