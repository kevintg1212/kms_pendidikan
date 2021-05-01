<?php 
include 'conn.php';
session_start();
    
    $npsn = $_POST['npsn'];
    echo $npsn."<br>";
    
    $nik = $_POST['nik'];
    echo $nik."<br>";

    $nama_sekolah = $_POST['nama_sekolah'];
    echo $nama_sekolah."<br>";

    $target_dir = "../image/foto_sekolah/";
    $target_file = $target_dir . basename($_FILES["foto_sekolah"]["name"]);
    $name_image1 = basename($_FILES["foto_sekolah"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["foto_sekolah"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["foto_sekolah"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["foto_sekolah"]["name"])). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
    echo $name_image1."<br>";


    $bentuk = $_POST['bentuk'];
    echo $bentuk."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $bentuk);

    $stmt1->execute();
    $stmt1->close();


    $status = $_POST['status'];
    echo $status."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $status);

    $stmt1->execute();
    $stmt1->close();

    $jenjang = $_POST['jenjang'];
    echo "JENJANG <hr>";
    foreach ($jenjang as $key => $val) {
        echo $val."<br>";
        $stmt1 = $db2->prepare("INSERT INTO `jenjang_layananpendidikan` (npsn, id_jenjangpendidikan) VALUES(?, ?)");
        $stmt1->bind_param("ss", $npsn, $val);

        $stmt1->execute();
        $stmt1->close();

     }

    $akreditasi = $_POST['akreditasi'];
    echo $akreditasi."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $akreditasi);

    $stmt1->execute();
    $stmt1->close();
    

    $visi_sekolah = $_POST['visi_sekolah'];
    echo $visi_sekolah."<br>";

    $nilai_nilai = $_POST['nilai_nilai'];
    echo $nilai_nilai."<br>";

    $alamat_sekolah = $_POST['alamat_sekolah'];
    echo $alamat_sekolah."<br>";

    $provinsi = $_POST['provinsi'];
    echo $provinsi."<br>";

    $kota = $_POST['kota'];
    echo $kota."<br>";

    $telephone = $_POST['telephone'];
    echo $telephone."<br>";

    $email = $_POST['email'];
    echo $email."<br>";

    $website = $_POST['website'];
    echo $website."<br>";


    $kebutuhan = $_POST['kebutuhan'];
    echo "KEBUTUHAN <hr>";
    foreach ($kebutuhan as $key2 => $val2) {
        echo $val2."<br>";
        $stmt3 = $db2->prepare("INSERT INTO `kebutuhankhusus_layananpendidikan` (npsn, id_kebutuhankhusus) VALUES(?, ?)");
        $stmt3->bind_param("ss", $npsn, $val2);

        $stmt3->execute();
        $stmt3->close();

     }



    $biaya = $_POST['biaya'];
    echo $biaya."<br>";

    $waktu_penyelenggara = $_POST['waktu_penyelenggara'];
    echo $waktu_penyelenggara."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $waktu_penyelenggara);

    $stmt1->execute();
    $stmt1->close();

    $penerimaan_sekolah = $_POST['penerimaan_sekolah'];
    echo $penerimaan_sekolah."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $penerimaan_sekolah);

    $stmt1->execute();
    $stmt1->close();

    $penglaman_sekolah = $_POST['penglaman_sekolah'];
    echo $penglaman_sekolah."<br>";

    $ketersediaan_hubungan = $_POST['ketersediaan_hubungan'];
    echo $ketersediaan_hubungan."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $ketersediaan_hubungan);

    $stmt1->execute();
    $stmt1->close();


    $ketersediaan_program = $_POST['ketersediaan_program'];
    echo $ketersediaan_program."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $ketersediaan_program);

    $stmt1->execute();
    $stmt1->close();

    $syarat_p = $_POST['syarat_p'];
    echo $syarat_p."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $syarat_p);

    $stmt1->execute();
    $stmt1->close();

    $teknis_pendaftaran = $_POST['teknis_pendaftaran'];
    echo $teknis_pendaftaran."<br>";

    $keamanan_sekolah = $_POST['keamanan_sekolah'];
    echo $keamanan_sekolah."<br>";


    $specialist = $_POST['specialist'];
    echo $specialist."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $specialist);

    $stmt1->execute();
    $stmt1->close();


    $pelatihan = $_POST['pelatihan'];
    echo $pelatihan."<br>";

    $rata_pengalaman = $_POST['rata_pengalaman'];
    echo $rata_pengalaman."<br>";

    $staff_opr = $_POST['staff_opr'];
    echo $staff_opr."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $staff_opr);

    $stmt1->execute();
    $stmt1->close();
    

    $siswa_lain = $_POST['siswa_lain'];
    echo $siswa_lain."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $siswa_lain);

    $stmt1->execute();
    $stmt1->close();

    $kesediaan_asosiasi = $_POST['kesediaan_asosiasi'];
    echo $kesediaan_asosiasi."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $kesediaan_asosiasi);

    $stmt1->execute();
    $stmt1->close();


    $kesediaan_forum = $_POST['kesediaan_forum'];
    echo $kesediaan_forum."<br>";
    $stmt1 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
    $stmt1->bind_param("ss", $npsn, $kesediaan_forum);

    $stmt1->execute();
    $stmt1->close();

    $berkomunikasi_pengajar = $_POST['berkomunikasi_pengajar'];
    echo $berkomunikasi_pengajar."<br>";

    
    $sub_kriteria = $_POST['sub_kriteria'];

    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
    on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
    where sub_kriteriainformasi.id_kriteriainformasi=6 AND nilai=1");
    while($temp1 = mysqli_fetch_array($result)){
        $id_detail = $temp1['id_detail_kriteriainformasi'];
        if (in_array($id_detail, $sub_kriteria)) {
            $stmt4 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt4->bind_param("ss", $npsn, $id_detail);
            echo "xxx= ".$id_detail."<br>";
            $stmt4->execute();
            $stmt4->close();
        }else{
            $id_detail= $id_detail+1;
            $stmt5 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt5->bind_param("ss", $npsn, $id_detail);
            echo "yyy= ".$id_detail."<br>";
            $stmt5->execute();
            $stmt5->close();

        }
    }

    $metode_m = $_POST['metode_m'];

    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
    on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
    where sub_kriteriainformasi.id_kriteriainformasi=7 AND nilai=1");
    while($temp1 = mysqli_fetch_array($result)){
        $id_detail = $temp1['id_detail_kriteriainformasi'];
        if (in_array($id_detail, $metode_m)) {
            $stmt4 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt4->bind_param("ss", $npsn, $id_detail);
    
            $stmt4->execute();
            $stmt4->close();
        }else{
            $id_detail= $id_detail+1;
            $stmt5 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt5->bind_param("ss", $npsn, $id_detail);
    
            $stmt5->execute();
            $stmt5->close();

        }
    }


    $jumlah_murid = $_POST['jumlah_murid'];
    echo $jumlah_murid."<br>";

    $pengaturan_kelas = $_POST['pengaturan_kelas'];
    echo $pengaturan_kelas."<br>";


    $sarpas_umum = $_POST['sarpas_umum'];

    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
    on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
    where sub_kriteriainformasi.id_kriteriainformasi=9 AND nilai=1");
    while($temp1 = mysqli_fetch_array($result)){
        $id_detail = $temp1['id_detail_kriteriainformasi'];
        if (in_array($id_detail, $sarpas_umum)) {
            $stmt4 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt4->bind_param("ss", $npsn, $id_detail);
    
            $stmt4->execute();
            $stmt4->close();
        }else{
            $id_detail= $id_detail+1;
            $stmt5 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt5->bind_param("ss", $npsn, $id_detail);
    
            $stmt5->execute();
            $stmt5->close();

        }
    }

    $sarpas_khusus = $_POST['sarpas_khusus'];

    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
    on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
    where sub_kriteriainformasi.id_kriteriainformasi=10 AND nilai=1");
    while($temp1 = mysqli_fetch_array($result)){
        $id_detail = $temp1['id_detail_kriteriainformasi'];
        if (in_array($id_detail, $sarpas_khusus)) {
            $stmt4 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt4->bind_param("ss", $npsn, $id_detail);
    
            $stmt4->execute();
            $stmt4->close();
        }else{
            $id_detail= $id_detail+1;
            $stmt5 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt5->bind_param("ss", $npsn, $id_detail);
    
            $stmt5->execute();
            $stmt5->close();

        }
    }


    $teknologi = $_POST['teknologi'];

    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
    on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
    where sub_kriteriainformasi.id_kriteriainformasi=11 AND nilai=1");
    while($temp1 = mysqli_fetch_array($result)){
        $id_detail = $temp1['id_detail_kriteriainformasi'];
        if (in_array($id_detail, $teknologi)) {
            $stmt4 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt4->bind_param("ss", $npsn, $id_detail);
    
            $stmt4->execute();
            $stmt4->close();
        }else{
            $id_detail= $id_detail+1;
            $stmt5 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt5->bind_param("ss", $npsn, $id_detail);
    
            $stmt5->execute();
            $stmt5->close();

        }
    }


    $kebijakan_sekolah = $_POST['kebijakan_sekolah'];
    echo $kebijakan_sekolah."<br>";

    $kegiatan = $_POST['kegiatan'];

    $result = mysqli_query($db2,"SELECT * FROM `sub_kriteriainformasi` inner join detail_kriteriainformasi
    on sub_kriteriainformasi.id_sub_kriteriainformasi = detail_kriteriainformasi.id_sub_kriteriainformasi                      
    where sub_kriteriainformasi.id_kriteriainformasi=8 AND nilai=1");
    while($temp1 = mysqli_fetch_array($result)){
        $id_detail = $temp1['id_detail_kriteriainformasi'];
        if (in_array($id_detail, $kegiatan)) {
            $stmt4 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt4->bind_param("ss", $npsn, $id_detail);
    
            $stmt4->execute();
            $stmt4->close();
        }else{
            $id_detail= $id_detail+1;
            $stmt5 = $db2->prepare("INSERT INTO `detail_layananpendidikan` (npsn, id_detail_kriteriainformasi) VALUES(?, ?)");
            $stmt5->bind_param("ss", $npsn, $id_detail);
    
            $stmt5->execute();
            $stmt5->close();

        }
    }

    $name_file = basename($_FILES["surat"]["name"]);
    $targetfolder = "../file/";
    $targetfolder = $targetfolder . basename( $_FILES['surat']['name']) ;
    $file_type=$_FILES['surat']['type'];
    if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
        if(move_uploaded_file($_FILES['surat']['tmp_name'], $targetfolder))
        {
        echo "File Berhasil di Upload  file ". basename( $_FILES['surat']['name']). " is uploaded";
        //Jalankan perintah insert ke database
        }
        else {
        echo "File Gagal di Upload";
        }
    }
    else {
        echo "Hanya Boleh upload PDF, JPEG GIF .<br>";
    }
    echo $name_file."<br>";



    $stmt2 = $db2->prepare("INSERT INTO `layananpendidikan` (npsn, nik, id_provinsi, id_kabupaten, nama_sekolah,
    foto_sekolah, visi_sekolah, nilai_sekolah, alamat, telepon, email, website, biaya_sekolah, pengalaman_sekolah,
    pelatihan_pendidikankhusus_pengajar, pengalaman_pengajar, cara_komunikasi_pengajar, jumlah_murid, pengaturan_kelas,
    kebijakan_sekolah, keamanan_sekolah, teknis_pendaftaran, surat_ijin_operasional, status_data)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt2->bind_param("ssssssssssssssssssssssss", $npsn, $nik, $provinsi, $kota, $nama_sekolah,
    $name_image1, $visi_sekolah, $nilai_nilai, $alamat_sekolah, $telephone, $email, $website, $biaya, $penglaman_sekolah,
    $pelatihan, $rata_pengalaman, $berkomunikasi_pengajar, $jumlah_murid, $pengaturan_kelas,
    $kebijakan_sekolah, $keamanan_sekolah, $teknis_pendaftaran, $name_file, $status_data
    );


    $status_data = "Pending";

    $stmt2->execute();
    $stmt2->close();

    header("location:../layanan_pendidikan_pending.php");


?>