<?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        // Include librari phpmailer
        include('phpmailer/Exception.php');
        include('phpmailer/PHPMailer.php');
        include('phpmailer/SMTP.php');
        $email_pengirim = 'kmspendidikan@gmail.com'; // Isikan dengan email pengirim
        $nama_pengirim = 'KMS Pendidikan'; // Isikan dengan nama pengirim
        $email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
        $subjek = "Penghapusan Data Layanan Pendidikan"; // Ambil subjek dari inputan form
        $pesan = "Penghapusan data layanan pendidikan telah diterima, data anda sudah terhapus.
        Anda bisa memasukan data layanan pendidikan yang baru kembali."; // Ambil pesan dari inputan form

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim; // Email Pengirim
        $mail->Password = 'kmspendidikan1217001'; // Isikan dengan Password email pengirim
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima, '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
        // Load file content.php
        ob_start();
        // include "content.php";
        // $content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
        // ob_end_clean();
        $mail->Subject = $subjek;
        $mail->Body = $pesan;
        //$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email
        // Jika tanpa attachment
            $send = $mail->send();


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