<?php 
include 'conn.php';
session_start();
    
	if (isset($_SESSION['arr_layanan'])) {
		$arr_layanan = $_SESSION['arr_layanan'];
		foreach($arr_layanan as $result) {
			echo $result.'<br>';
		}
	}

    $bentukSekolah = $_POST['bentukSekolah'];
    echo $bentukSekolah."-bentuk<br>";
    
    $statusSekolah = $_POST['statusSekolah'];
    echo $statusSekolah."-status<br>";

    $akreditasiSekolah = $_POST['akreditasiSekolah'];
    echo $akreditasiSekolah."-akreditasi<br>";

	$wktPenyelenggaraSekolah = $_POST['wktPenyelenggaraSekolah'];
    echo $wktPenyelenggaraSekolah."-waktuselenggara<br>";

	$kurikulumSekolah = $_POST['kurikulumSekolah'];
    echo $kurikulumSekolah."-kurikulum<br>";

	$metode_penyampaian = $_POST['metode_penyampaian'];
	foreach ($metode_penyampaian as $key) {
		echo $key."-metode<br>";
	}

	$monitoring = $_POST['monitoring'];
	foreach ($monitoring as $key) {
		echo $key."-monitoring<br>";
	}

	$kegiatan_sekolah = $_POST['kegiatan_sekolah'];
	foreach ($kegiatan_sekolah as $key) {
		echo $key."-kegiatan_sekolah<br>";
	}

	$sarana_prasarana = $_POST['sarana_prasarana'];
	foreach ($sarana_prasarana as $key) {
		echo $key."-sarana_prasarana<br>";
	}

	$sarana_khusus = $_POST['sarana_khusus'];
	foreach ($sarana_khusus as $key) {
		echo $key."-sarana_khusus<br>";
	}

	$teknologi = $_POST['teknologi'];
	foreach ($teknologi as $key) {
		echo $key."-teknologi<br>";
	}

	$penerimaanSekolah = $_POST['penerimaanSekolah'];
    echo $penerimaanSekolah."-penerimaanSekolah<br>";

	$pendamping = $_POST['pendamping'];
    echo $pendamping."-pendamping<br>";

	$hubSekolah = $_POST['hubSekolah'];
    echo $hubSekolah."-hubSekolah<br>";

	$programPenempatan = $_POST['programPenempatan'];
    echo $programPenempatan."-programPenempatan<br>";

	$dukunganSpesialis = $_POST['dukunganSpesialis'];
    echo $dukunganSpesialis."-dukunganSpesialis<br>";

	$pembekalanStaff = $_POST['pembekalanStaff'];
    echo $pembekalanStaff."-pembekalanStaff<br>";

	$pembekalan = $_POST['pembekalan'];
    echo $pembekalan."-pembekalan<br>";

	$asosiasiOrangtua = $_POST['asosiasiOrangtua'];
    echo $asosiasiOrangtua."-asosiasiOrangtua<br>";

	$ketersediaanForum = $_POST['ketersediaanForum'];
    echo $ketersediaanForum."-ketersediaanForum<br>";



    //header("location:../layanan_pendidikan_pending.php");


?>