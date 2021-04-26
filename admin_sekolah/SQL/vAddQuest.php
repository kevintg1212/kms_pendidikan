<?php 
include 'config.php';
 

$pertanyaan = $_POST['pertanyaan'];
$kriteria = $_POST['kriteria'];
$standard = $_POST['standard'];
echo $pertanyaan;
echo $kriteria;
echo $standard;

$pilihan1 = $_POST['pilihan1'];
$pilihan2 = $_POST['pilihan2'];
$pilihan3 = $_POST['pilihan3'];
$pilihan4 = $_POST['pilihan4'];
$pilihan5 = $_POST['pilihan5'];

$bobot1 = $_POST['bobot1'];
$bobot2 = $_POST['bobot2'];
$bobot3 = $_POST['bobot3'];
$bobot4 = $_POST['bobot4'];
$bobot5 = $_POST['bobot5'];


$query1 = mysqli_query($koneksi,"select * from kriteria where kriteria='$kriteria'");
$d = mysqli_fetch_array($query1);
$id = $d['id_kriteria'];
echo $id;

$query2  = mysqli_query($koneksi,"INSERT INTO questionnaire (pertanyaan, id_kriteria, id_standard) VALUES('$pertanyaan','$id', '$standard')");
$query21 = mysqli_query($koneksi,"select * from questionnaire where pertanyaan='$pertanyaan' and id_kriteria='$id'");
$d1 = mysqli_fetch_array($query21);
$id2 = $d1['id_questionnaire'];
echo $id2;

$query3  = mysqli_query($koneksi,"INSERT INTO pilihan (id_questionnaire, pilihan, bobot) VALUES('$id2','$pilihan1','$bobot1')");
$query4  = mysqli_query($koneksi,"INSERT INTO pilihan (id_questionnaire, pilihan, bobot) VALUES('$id2','$pilihan2','$bobot2')");
$query5  = mysqli_query($koneksi,"INSERT INTO pilihan (id_questionnaire, pilihan, bobot) VALUES('$id2','$pilihan3','$bobot3')");
$query6  = mysqli_query($koneksi,"INSERT INTO pilihan (id_questionnaire, pilihan, bobot) VALUES('$id2','$pilihan4','$bobot4')");
$query7  = mysqli_query($koneksi,"INSERT INTO pilihan (id_questionnaire, pilihan, bobot) VALUES('$id2','$pilihan5','$bobot5')");

if($standard==1){
$querys  = mysqli_query($koneksi,"select * from pilihan where pilihan='$pilihan1' and bobot='$bobot1'");
}else if($standard==2){
	$querys  = mysqli_query($koneksi,"select * from pilihan where pilihan='$pilihan2' and bobot='$bobot2'");
	}else if($standard==3){
		$querys  = mysqli_query($koneksi,"select * from pilihan where pilihan='$pilihan3' and bobot='$bobot3'");
		}else if($standard==4){
			$querys  = mysqli_query($koneksi,"select * from pilihan where pilihan='$pilihan4' and bobot='$bobot4'");
			}else if($standard==5){
				$querys  = mysqli_query($koneksi,"select * from pilihan where pilihan='$pilihan5' and bobot='$bobot5'");
				}

				$qrS = mysqli_fetch_array($querys);
				$idS = $qrS['id_pilihan'];
				echo $idS;

$query8  = mysqli_query($koneksi,"update questionnaire set id_standard='$idS' where id_questionnaire = '$id2'");


if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}else{
	header("location:../quest.php");
}


 
?>