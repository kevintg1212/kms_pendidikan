<?php 
include 'conn.php';
session_start();

$total_k =0;
$array_id_k =[];
    
	if (isset($_SESSION['arr_layanan'])) {
		$arr_layanan = $_SESSION['arr_layanan'];
		foreach($arr_layanan as $result) {
			echo $result.'<br>';

		}
	}

	if (isset($_POST['bentukSekolah'])) {
    $bentukSekolah = $_POST['bentukSekolah'];
    echo $bentukSekolah."-bentuk<br>";
	$total_k++;
	$array_id_k[$total_k]=$bentukSekolah;
	}

	if (isset($_POST['statusSekolah'])) {
    $statusSekolah = $_POST['statusSekolah'];
    echo $statusSekolah."-status<br>";
	$total_k++;
	$array_id_k[$total_k]=$statusSekolah;
	}

	if (isset($_POST['akreditasiSekolah'])) {
    $akreditasiSekolah = $_POST['akreditasiSekolah'];
    echo $akreditasiSekolah."-akreditasi<br>";
	$total_k++;
	$array_id_k[$total_k]=$akreditasiSekolah;
	}

	if (isset($_POST['wktPenyelenggaraSekolah'])) {
	$wktPenyelenggaraSekolah = $_POST['wktPenyelenggaraSekolah'];
    echo $wktPenyelenggaraSekolah."-waktuselenggara<br>";
	$total_k++;
	$array_id_k[$total_k]=$wktPenyelenggaraSekolah;
	}

	if (isset($_POST['kurikulumSekolah'])) {
	$kurikulumSekolah = $_POST['kurikulumSekolah'];
    echo $kurikulumSekolah."-kurikulum<br>";
	$total_k++;
	$array_id_k[$total_k]=$kurikulumSekolah;
	}

	if (isset($_POST['metode_penyampaian'])) {
		$metode_penyampaian = $_POST['metode_penyampaian'];
		foreach ($metode_penyampaian as $key) {
			echo $key."-metode<br>";
		$total_k++;
		$array_id_k[$total_k]=$key;
		}
	}

	if (isset($_POST['monitoring'])) {
		$monitoring = $_POST['monitoring'];
		foreach ($monitoring as $key) {
			echo $key."-monitoring<br>";
		$total_k++;
		$array_id_k[$total_k]=$key;
		}
	}

	if (isset($_POST['kegiatan_sekolah'])) {
		$kegiatan_sekolah = $_POST['kegiatan_sekolah'];
		foreach ($kegiatan_sekolah as $key) {
			echo $key."-kegiatan_sekolah<br>";
		$total_k++;
		$array_id_k[$total_k]=$key;
		}
	}

	if (isset($_POST['sarana_prasarana'])) {
		$sarana_prasarana = $_POST['sarana_prasarana'];
		foreach ($sarana_prasarana as $key) {
			echo $key."-sarana_prasarana<br>";
		$total_k++;
		$array_id_k[$total_k]=$key;
		}
	}

	if (isset($_POST['sarana_khusus'])) {
		$sarana_khusus = $_POST['sarana_khusus'];
		foreach ($sarana_khusus as $key) {
			echo $key."-sarana_khusus<br>";
		$total_k++;
		$array_id_k[$total_k]=$key;
		}
	}

	if (isset($_POST['teknologi'])) {
		$teknologi = $_POST['teknologi'];
		foreach ($teknologi as $key) {
			echo $key."-teknologi<br>";
		$total_k++;
		$array_id_k[$total_k]=$key;
		}
	}

	if (isset($_POST['penerimaanSekolah'])) {
	$penerimaanSekolah = $_POST['penerimaanSekolah'];
    echo $penerimaanSekolah."-penerimaanSekolah<br>";
	$total_k++;
	$array_id_k[$total_k]=$penerimaanSekolah;
	}

	if (isset($_POST['pendamping'])) {
	$pendamping = $_POST['pendamping'];
    echo $pendamping."-pendamping<br>";
	$total_k++;
	$array_id_k[$total_k]=$pendamping;
	}

	if (isset($_POST['hubSekolah'])) {
	$hubSekolah = $_POST['hubSekolah'];
    echo $hubSekolah."-hubSekolah<br>";
	$total_k++;
	$array_id_k[$total_k]=$hubSekolah;
	}

	if (isset($_POST['programPenempatan'])) {
	$programPenempatan = $_POST['programPenempatan'];
    echo $programPenempatan."-programPenempatan<br>";
	$total_k++;
	$array_id_k[$total_k]=$programPenempatan;
	}

	if (isset($_POST['dukunganSpesialis'])) {
	$dukunganSpesialis = $_POST['dukunganSpesialis'];
    echo $dukunganSpesialis."-dukunganSpesialis<br>";
	$total_k++;
	$array_id_k[$total_k]=$dukunganSpesialis;
	}

	if (isset($_POST['pembekalanStaff'])) {
	$pembekalanStaff = $_POST['pembekalanStaff'];
    echo $pembekalanStaff."-pembekalanStaff<br>";
	$total_k++;
	$array_id_k[$total_k]=$pembekalanStaff;
	}

	if (isset($_POST['pembekalan'])) {
	$pembekalan = $_POST['pembekalan'];
    echo $pembekalan."-pembekalan<br>";
	$total_k++;
	$array_id_k[$total_k]=$pembekalan;
	}

	if (isset($_POST['asosiasiOrangtua'])) {
	$asosiasiOrangtua = $_POST['asosiasiOrangtua'];
    echo $asosiasiOrangtua."-asosiasiOrangtua<br>";
	$total_k++;
	$array_id_k[$total_k]=$asosiasiOrangtua;
	}

	if (isset($_POST['ketersediaanForum'])) {
	$ketersediaanForum = $_POST['ketersediaanForum'];
    echo $ketersediaanForum."-ketersediaanForum<br>";
	$total_k++;
	$array_id_k[$total_k]=$ketersediaanForum;
	}

	echo '<hr>';
	$array_id_dkk=[];
	$array_id_dkk_sub=[];
	for ($i=1; $i <= $total_k; $i++) {
		$temp_id_kk = $array_id_k[$i];
		echo $temp_id_kk.'<br>';
		$result_head2 = mysqli_query($db2,"SELECT * FROM `detail_kriteriainformasi` where id_detail_kriteriainformasi = $temp_id_kk");
		while($d_head = mysqli_fetch_array($result_head2)){
			$array_id_dkk[$i]=$d_head['id_kriteriainformasi'];
			$array_id_dkk_sub[$i]=$d_head['id_sub_kriteriainformasi'];
		}
	}
if ($total_k==0) {
	echo "<script>window.location = '../hasil_pencarian1.php'</script>";
}
    

$npsn_nilai=[];
$ortu_nilai=[];
$npsn_selisih=[];
$npsn_knv=[];
$max_nilai=[];
echo '<hr>';
for ($i=1; $i <= $total_k; $i++) {
$temp_kriteria2 =	$array_id_dkk[$i];
$result_head = mysqli_query($db2,"SELECT max(nilai) as max_nilai FROM `detail_kriteriainformasi` where id_kriteriainformasi= $temp_kriteria2");
while($d_head = mysqli_fetch_array($result_head)){
	$max_nilai[$i] = $d_head['max_nilai'];
	echo $max_nilai[$i].'<br>';
}
}
?>
<html>

<head>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Layanan P. ABK</th>
			<?php for ($i=1; $i <= $total_k; $i++) { ?>
			<th>U<?php echo $i; ?></th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
	<?php 
			foreach($arr_layanan as $result) {
	?>
		<tr>
			<td><?php echo $result; ?></td>
			<?php for ($i=1; $i <= $total_k; $i++) { 
				$temp_id_detail = $array_id_dkk[$i];
				$temp_id_detail_sub = $array_id_dkk_sub[$i];
				if ($temp_id_detail_sub =="") {
					$sql_detail_sub = "";
				}else{
					$sql_detail_sub = "and id_sub_kriteriainformasi = $temp_id_detail_sub";
				}

				$result_head = mysqli_query($db2,"SELECT * FROM detail_kriteriainformasi dk right join detail_layananpendidikan dl ON dk.id_detail_kriteriainformasi = dl.id_detail_kriteriainformasi
				WHERE npsn = $result and id_kriteriainformasi = $temp_id_detail $sql_detail_sub
				ORDER BY `dl`.`npsn` ASC");
				while($d_head = mysqli_fetch_array($result_head)){
					$nilai = $d_head['nilai'];
					$npsn_nilai[$result][$i]=$nilai;

				}
				?>
			<td><?php echo $nilai; ?></td>
			<?php } ?>
		</tr>
		<?php } ?>
		<tr style="background-color: yellow;">
			<td>Profil Kebutuhan Orang Tua</td>
			<?php for ($i=1; $i <= $total_k; $i++) { 
				$temp_id_ar = $array_id_k[$i];
				//$nilai =0;
				$result_head = mysqli_query($db2,"SELECT * FROM detail_kriteriainformasi where id_detail_kriteriainformasi= $temp_id_ar");
				while($d_head = mysqli_fetch_array($result_head)){
					$nilai = $d_head['nilai'];
					$ortu_nilai[$i]=$nilai;
				}
				?>
			<td><?php echo $nilai; ?></td>
			<?php } ?>
		</tr>
		<?php 
			foreach($arr_layanan as $result) {
		?>
		<tr>
			<td>GAP <?php echo $result; ?></td>
			<?php for ($i=1; $i <= $total_k; $i++) {
				$temp_selisih = $npsn_nilai[$result][$i] - 	$ortu_nilai[$i];
				$npsn_selisih[$result][$i] = $temp_selisih;
			?>
			<td><?php echo $temp_selisih; ?></td>
			<?php } ?>
		</tr>
		<?php } ?>
		<tr style="background-color: yellow;">
			<td>Profil Kebutuhan Orang Tua</td>
			<?php for ($i=1; $i <= $total_k; $i++) { 
				$temp_id_ar = $array_id_k[$i];
				//$nilai =0;
				$result_head = mysqli_query($db2,"SELECT * FROM detail_kriteriainformasi where id_detail_kriteriainformasi= $temp_id_ar");
				while($d_head = mysqli_fetch_array($result_head)){
					$nilai = $d_head['nilai'];
					$ortu_nilai[$i]=$nilai;
				}
				?>
			<td><?php echo $nilai; ?></td>
			<?php } ?>
		</tr>
		<?php 
			foreach($arr_layanan as $result) {
		?>
		<tr>
			<td>KNV <?php echo $result; ?></td>
			<?php for ($i=1; $i <= $total_k; $i++) { 
				$selisih_temp = sqrt($npsn_selisih[$result][$i]*$npsn_selisih[$result][$i]);
				$KNV = $max_nilai[$i]-$selisih_temp;
				if ($npsn_selisih[$result][$i]>0) {
					$KNV = $KNV + 0.5;
				}
				$npsn_knv[$result][$i]=$KNV;
				?>
			<td><?php echo $KNV; ?></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</tbody>
</table>
</html>
<?php 
$total_knv=[];
foreach($arr_layanan as $result) {
	$total_knv[$result]=0;
	for ($i=1; $i <= $total_k; $i++) { 	
		$total_knv[$result]=$total_knv[$result]+$npsn_knv[$result][$i];
	}
}
foreach($arr_layanan as $result) {
	echo ($total_knv[$result]/$total_k).'<br>';
}
echo '<hr>';
foreach($arr_layanan as $result) {
	echo ($total_knv[$result]/$total_k*100/100).'<br>';
}
echo '<hr>';
arsort($total_knv);
foreach($total_knv as $key => $value) {
	echo $key.' - '.$value.'<br>';
}
$_SESSION['id_pilihan']=$array_id_k;
$_SESSION['total_akhir']=$total_knv;
$_SESSION['id_search']=$array_id_dkk;
$_SESSION['id_search_sub']=$array_id_dkk_sub;
echo "<script>window.location = '../hasil_pencarian2.php'</script>";

?>