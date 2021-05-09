<?php 
include 'conn.php';
session_start();

$lokasiSekolah = $_POST['lokasiSekolah'];
echo $lokasiSekolah."<br>";


if (isset($_POST['biayaMinimum']) && $_POST['biayaMinimum']!="") {
	$biayaMinimum = $_POST['biayaMinimum'];
	echo $biayaMinimum."a<br>";
	$biayaMaximum = $_POST['biayaMaximum'];
	echo $biayaMaximum."b<br>";
	$sql_biaya = "AND (biaya_sekolah BETWEEN ".$biayaMinimum." AND ".$biayaMaximum.")";
}else{
	$sql_biaya = "";
}



if (isset($_POST['jmlMinimum']) && $_POST['jmlMinimum']!="") {
	$jmlMinimum = $_POST['jmlMinimum'];
	echo $jmlMinimum."<br>";
	$jmlMaximum = $_POST['jmlMaximum'];
	echo $jmlMaximum."<br>";
	$sql_jmlh = "AND (jumlah_murid BETWEEN ".$jmlMinimum." AND ".$jmlMaximum.")";
}else{
	$sql_jmlh = "";
}

if (isset($_POST['tahun_sekolah']) && $_POST['tahun_sekolah']!="") {
	$tahun_sekolah = $_POST['tahun_sekolah'];
	echo $tahun_sekolah."<br>";
	$sql_thn_sklh = "AND pengalaman_sekolah >=  ".$tahun_sekolah;
}else{
	$sql_thn_sklh = "";
}

if (isset($_POST['tahun_pengajar']) && $_POST['tahun_pengajar']!="") {
	$tahun_pengajar = $_POST['tahun_pengajar'];
	echo $tahun_pengajar."<br>";
	$sql_thn_peng = "AND pengalaman_pengajar >=  ".$tahun_pengajar;
}else{
	$sql_thn_peng = "";
}



$kebutuhanKhusus = $_POST['kebutuhanKhusus'];
echo $kebutuhanKhusus."<br>";

$jenjangPendidikan = $_POST['jenjangPendidikan'];
echo $jenjangPendidikan."<br>";

$arr_layanan[]="";

$result_head = mysqli_query($db2,"SELECT * from `layananpendidikan` where id_kabupaten=$lokasiSekolah $sql_biaya
$sql_jmlh $sql_thn_sklh $sql_thn_peng ");
while($d_head = mysqli_fetch_array($result_head)){
	echo $d_head['nama_sekolah']."<br>";
	array_push($arr_layanan,$d_head['npsn']);
}
$_SESSION['arr_layanan']=$arr_layanan;
$rowcount=mysqli_num_rows($result_head);
echo $rowcount;

if ($rowcount>=1) {
	header("location:../cari_sekolah_2.php");
}else{
	$_SESSION['cari']="xx";
	header("location:../cari_sekolah.php");
}



?>