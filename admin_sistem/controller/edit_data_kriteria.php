<?php 
include 'conn.php';
session_start();

    $idKriteriainformasi = mysqli_real_escape_string($db2,$_POST['idAwal']);

    
    
    $stmt3 = $db2->prepare("DELETE from `sub_kriteriainformasi` where id_kriteriainformasi = ? ");
    $stmt3->bind_param("s",  $idKriteriainformasi);


    $stmt3->execute();
    $stmt3->close();

    $stmt4 = $db2->prepare("DELETE from `detail_kriteriainformasi` where id_kriteriainformasi = ? ");
    $stmt4->bind_param("s",  $idKriteriainformasi);


    $stmt4->execute();
    $stmt4->close();

    $sub_kinfo = [];
    $parameter_arr = [];

    $sub_kriterainformasi = $_POST['subKriteria'];
    $keterangan = $_POST['keterangan'];
    $parameter = $_POST['parameter'];
    $nilai = $_POST['nilai'];
    for ($i=0; $i < 51; $i++) { 
        if (isset($sub_kriterainformasi[$i])) {
            if (strpos($sub_kriterainformasi[$i],"Warning")) {
                unset($sub_kriterainformasi[$i]);
            }
        }
        if (isset($keterangan[$i])) {
            if (strpos($keterangan[$i],"Warning")) {
                unset($keterangan[$i]);
            }
        }
        if (isset($parameter[$i])) {
            if (strpos($parameter[$i],"Warning")) {
                unset($parameter[$i]);
            }
        }
        if (isset($nilai[$i])) {
            if (strpos($nilai[$i],"Warning")) {
                unset($nilai[$i]);
            }
        }
    }
    foreach($sub_kriterainformasi as $key => $sub_kriterainformasi_v) {
        
        $sub_kriterainformasi_v = mysqli_real_escape_string($db2,$sub_kriterainformasi[$key]);

        if($sub_kriterainformasi_v != "") {
            $sub_kinfo[$key] = $sub_kriterainformasi_v;
        }
    
    }

    foreach($parameter as $key => $parameter_v) {
        
        $parameter_v = mysqli_real_escape_string($db2,$parameter[$key]);

        if($parameter_v != "") {
            $parameter_arr[$key] = $parameter_v;
        }
    
    } 

    

    if($sub_kinfo != "") {
        foreach($sub_kinfo as $key => $sub_kriteriainformasi_v) {

            $sub_kriteriainformasi_v = mysqli_real_escape_string($db2,$sub_kinfo[$key]);
            $keterangan_v = mysqli_real_escape_string($db2,$keterangan[$key]);
    
            $stmt2 = $db2->prepare("INSERT INTO `sub_kriteriainformasi` (id_kriteriainformasi, sub_kriteriainformasi, keterangan) VALUES(?, ?, ?)");
            $stmt2->bind_param("sss", $idKriteriainformasi, $sub_kriteriainformasi_v, $keterangan_v);
            echo $idKriteriainformasi."<br>";
            echo $sub_kriteriainformasi_v."<br>";
            echo $keterangan_v."<br>";
            echo "+++++++========+++++<br>";
            $stmt2->execute();
            $stmt2->close();

            if($parameter_arr != "") {
                foreach($parameter_arr as $key => $parameter_v) {
            
                    $parameter_v = mysqli_real_escape_string($db2,$parameter_arr[$key]);
                    $nilai_v = mysqli_real_escape_string($db2,$nilai[$key]);

                    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` ORDER BY `sub_kriteriainformasi`.`id_sub_kriteriainformasi` DESC LIMIT 1");
                    while($temp1 = mysqli_fetch_array($result)){
                        $id_sub_kriteriainformasi = $temp1['id_sub_kriteriainformasi'];
                    }
                    
                    $stmt2 = $db2->prepare("INSERT INTO `detail_kriteriainformasi` (id_kriteriainformasi, id_sub_kriteriainformasi, parameter, nilai) VALUES(?, ?, ?, ?)");
                    $stmt2->bind_param("ssss", $idKriteriainformasi, $id_sub_kriteriainformasi ,$parameter_v, $nilai_v);
            
                    $stmt2->execute();
                    $stmt2->close();
            
                };
            }
    
        };
    };

    if($sub_kriterainformasi[0] == "") {
        foreach($parameter_arr as $key => $parameter_v) {
    
            $parameter_v = mysqli_real_escape_string($db2,$parameter_arr[$key]);
            $nilai_v = mysqli_real_escape_string($db2,$nilai[$key]);

            $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` ORDER BY `sub_kriteriainformasi`.`id_sub_kriteriainformasi` DESC LIMIT 1");
            while($temp1 = mysqli_fetch_array($result)){
                $id_sub_kriteriainformasi = $temp1['id_sub_kriteriainformasi'];
            }
            $id_sub_kriteriainformasi = null;
            $stmt2 = $db2->prepare("INSERT INTO `detail_kriteriainformasi` (id_kriteriainformasi, id_sub_kriteriainformasi, parameter, nilai) VALUES(?, ?, ?, ?)");
            $stmt2->bind_param("ssss", $idKriteriainformasi, $id_sub_kriteriainformasi ,$parameter_v, $nilai_v);
    
            echo $idKriteriainformasi."<br>";
            echo $id_sub_kriteriainformasi."<br>";
            echo $parameter_v."<br>";
            echo $nilai_v."<br>";
            echo "+++++++========+++++<br>";

            $stmt2->execute();
            $stmt2->close();
    
        };
    }


    header("location:../data_kriteria.php");

?>