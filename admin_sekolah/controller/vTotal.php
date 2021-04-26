
<?php 
include 'config.php';
session_start();

if( isset($_POST['id_ev']) )
{
  $_SESSION['id_ev'] = $_POST['id_ev'];
}


$querydx  = mysqli_query($koneksi,"DELETE FROM formasi;");
$autoI  = mysqli_query($koneksi,"ALTER TABLE formasi AUTO_INCREMENT = 1;");

$allSelect  = mysqli_query($koneksi,"SELECT v.`id_volunteer`, r.`id_role`, k.`id_kriteria`, v.`nama`, p.`pilihan`, k.`status`, r.`vPrimary`, r.`vSecondary`, p.`bobot`, pp.`bobot` AS standard,(pp.`bobot`-p.`bobot`) AS selisih, q.`pertanyaan`, k.`kriteria`, r.`nama_role`
FROM volunteer v
JOIN vol_pilihan vp ON v.id_volunteer = vp.`id_vol`
JOIN pilihan p ON p.`id_pilihan` = vp.`id_pilihan`
JOIN questionnaire q ON q.`id_questionnaire` = p.`id_questionnaire`
JOIN pilihan pp ON pp.`id_pilihan` = q.`id_standard`
JOIN kriteria k ON k.`id_kriteria` = q.`id_kriteria`
JOIN role_kriteria rk ON rk.`id_kriteria` = k.`id_kriteria`
JOIN ROLE r ON r.`id_role` = rk.`id_role`
ORDER BY v.`id_volunteer` ASC, r.`nama_role` ASC, k.`status` ASC");

$roleSelect  = mysqli_query($koneksi,"SELECT DISTINCT r.`nama_role`, r.`id_role`
FROM volunteer v
JOIN vol_pilihan vp ON v.id_volunteer = vp.`id_vol`
JOIN pilihan p ON p.`id_pilihan` = vp.`id_pilihan`
JOIN questionnaire q ON q.`id_questionnaire` = p.`id_questionnaire`
JOIN pilihan pp ON pp.`id_pilihan` = q.`id_standard`
JOIN kriteria k ON k.`id_kriteria` = q.`id_kriteria`
JOIN role_kriteria rk ON rk.`id_kriteria` = k.`id_kriteria`
JOIN ROLE r ON r.`id_role` = rk.`id_role`
ORDER BY v.`id_volunteer` ASC, r.`nama_role` ASC, k.`status` ASC");


$nameSelect  = mysqli_query($koneksi,"SELECT DISTINCT v.`nama`
FROM volunteer v
JOIN vol_pilihan vp ON v.id_volunteer = vp.`id_vol`
JOIN pilihan p ON p.`id_pilihan` = vp.`id_pilihan`
JOIN questionnaire q ON q.`id_questionnaire` = p.`id_questionnaire`
JOIN pilihan pp ON pp.`id_pilihan` = q.`id_standard`
JOIN kriteria k ON k.`id_kriteria` = q.`id_kriteria`
JOIN role_kriteria rk ON rk.`id_kriteria` = k.`id_kriteria`
JOIN ROLE r ON r.`id_role` = rk.`id_role`
ORDER BY v.`id_volunteer` ASC, r.`nama_role` ASC, k.`status` ASC");


$no = 1;               
while($dss = mysqli_fetch_array($allSelect)){
    $sl = $dss['selisih'];

    $nilaiBobot; 
    $pembobotan = mysqli_query($koneksi,"SELECT * from pembobotan where selisih = $sl");
    while($bn = mysqli_fetch_array($pembobotan)){
      $nilaiBobot[$dss['id_volunteer']][$dss['id_role']][$dss['id_kriteria']]=$bn['bobot_nilai']; 
    //   echo $bn['bobot_nilai']; 

    }
    $no++; } 



$no = 1;               
while($dss = mysqli_fetch_array($allSelect)){

    $sl = $dss['selisih']; 
    $pembobotan = mysqli_query($koneksi,"SELECT * from pembobotan where selisih = $sl");
    while($bn = mysqli_fetch_array($pembobotan)){
      $bbn =$bn['bobot_nilai'];
    //   echo $bbn; 
    }

    if($dss['status']==0){
        $prs =$dss['vSecondary'];
        // echo $prs;
      }else{
        $prs =$dss['vPrimary'];
        // echo $prs;
      }

      $ncf = $prs*$bbn/100;
    //   echo $ncf;
      $no++; }
      
?>

<?php 
      
        $tb=1;                               
        while($dna = mysqli_fetch_array($roleSelect)){
         $namaRole= $dna['nama_role'];
         $idRole= $dna['id_role'];
        ?>

        <div class="card-body p-0" style="color:white; backgoround-color:white;">
        <a>Table NA <?php echo $namaRole; ?></a>
          <table style="color:white; backgoround-color:white;" id="example<?php echo $tb; ?>" class="table table-striped table-bordered table-sm" data-show-toggle="true">
              <thead>
                  <tr>
                      <th style="width: 10%">
                          No
                      </th>
                      <th style="width: 20%">
                          Nama
                      </th>
                      <th>
                          NCF
                      </th>
                      <th>
                          NSF
                      </th>
                      <th>
                          N(a)
                      </th>
                  </tr>
              </thead>

              
              <tbody>
              <?php 
              $tb++;
              $nox =1;
               $preSelect  = mysqli_query($koneksi,"SELECT DISTINCT v.`nama`, v.`id_volunteer`
               FROM volunteer v
               JOIN vol_pilihan vp ON v.id_volunteer = vp.`id_vol`
               JOIN pilihan p ON p.`id_pilihan` = vp.`id_pilihan`
               JOIN questionnaire q ON q.`id_questionnaire` = p.`id_questionnaire`
               JOIN pilihan pp ON pp.`id_pilihan` = q.`id_standard`
               JOIN kriteria k ON k.`id_kriteria` = q.`id_kriteria`
               JOIN role_kriteria rk ON rk.`id_kriteria` = k.`id_kriteria`
               JOIN ROLE r ON r.`id_role` = rk.`id_role`
               WHERE r.`id_role` = $idRole
               ORDER BY v.`id_volunteer` ASC, r.`nama_role` ASC, k.`status` ASC");           
               
                
               while($dss = mysqli_fetch_array($preSelect)){
                $dnama = $dss['nama'];
                $idnama = $dss['id_volunteer'];
               ?>
                  <tr>
                      <td>
                      <?php echo $nox; ?>
                      </td>
                      <td>
                      <?php echo $dnama; ?>
                      </td>
                      <td>
                      <?php 
                         $tncf =0;
                         $bantu =0;
                         $proSelect  = mysqli_query($koneksi,"SELECT DISTINCT v.`id_volunteer`, r.`id_role`, k.`id_kriteria`, v.`nama`, r.`nama_role`, k.`status`, r.`vPrimary`, r.`vSecondary`
                         FROM volunteer v
                         JOIN vol_pilihan vp ON v.id_volunteer = vp.`id_vol`
                         JOIN pilihan p ON p.`id_pilihan` = vp.`id_pilihan`
                         JOIN questionnaire q ON q.`id_questionnaire` = p.`id_questionnaire`
                         JOIN pilihan pp ON pp.`id_pilihan` = q.`id_standard`
                         JOIN kriteria k ON k.`id_kriteria` = q.`id_kriteria`
                         JOIN role_kriteria rk ON rk.`id_kriteria` = k.`id_kriteria`
                         JOIN ROLE r ON r.`id_role` = rk.`id_role`
                         WHERE r.`id_role` = $idRole and v.`id_volunteer` = $idnama and  k.`status` =1
                         ORDER BY v.`id_volunteer` ASC, r.`nama_role` ASC, k.`status` ASC");
                         while($dtt = mysqli_fetch_array($proSelect)){ 
                          $idkriteria = $dtt['id_kriteria'];
                          $prima =$dtt['vPrimary'];
                          $tncf = $tncf+$nilaiBobot[$idnama][$idRole][$idkriteria];
                          $bantu++;
                         }
                         if ($bantu==0) {
                          echo (0);
                          $tncfa =0;
                          $ncfTm =0;
                         }else{
                          $ncfTm = $tncf/$bantu;
                          echo $ncfTm;
                          $tncfa = ($ncfTm)*($prima/100);
                         }
                         
                        ?>
                      </td>
                      <td>
                      <?php 
                         $tnsf =0;
                         $bantu =0;
                         $priSelect  = mysqli_query($koneksi,"SELECT DISTINCT v.`id_volunteer`, r.`id_role`, k.`id_kriteria`, v.`nama`, r.`nama_role`, k.`status`, r.`vPrimary`, r.`vSecondary`
                         FROM volunteer v
                         JOIN vol_pilihan vp ON v.id_volunteer = vp.`id_vol`
                         JOIN pilihan p ON p.`id_pilihan` = vp.`id_pilihan`
                         JOIN questionnaire q ON q.`id_questionnaire` = p.`id_questionnaire`
                         JOIN pilihan pp ON pp.`id_pilihan` = q.`id_standard`
                         JOIN kriteria k ON k.`id_kriteria` = q.`id_kriteria`
                         JOIN role_kriteria rk ON rk.`id_kriteria` = k.`id_kriteria`
                         JOIN ROLE r ON r.`id_role` = rk.`id_role`
                         WHERE r.`id_role` = $idRole and v.`id_volunteer` = $idnama and  k.`status` =0
                         ORDER BY v.`id_volunteer` ASC, r.`nama_role` ASC, k.`status` ASC");
                         while($dtts = mysqli_fetch_array($priSelect)){ 
                          $idkriterias = $dtts['id_kriteria'];
                          $tnsf = $tnsf+$nilaiBobot[$idnama][$idRole][$idkriterias];
                          $second =$dtts['vSecondary'];
                          $bantu++;
                         }
                         if ($bantu==0) {
                          echo (0);
                          $nsfSm =0;
                          $tnsfa = 0;
                         }else{
                          $nsfSm =$tnsf/$bantu;
                          echo $nsfSm;
                          $tnsfa = ($nsfSm)*($second /100);
                         }
                        ?>
                      </td>
                      <td>
                      <?php
                        $totalna = $tncfa+$tnsfa; 
                         echo $totalna;
                         $queryx  = mysqli_query($koneksi,"INSERT INTO formasi (id_role, id_volunteer, Nama, NCF, NSF, Total) VALUES($idRole,$idnama,'$dnama',$ncfTm,$nsfSm,$totalna)");


                        ?>
                      </td>

 

                  </tr>
                 <?php $nox++; }?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->

        
        <?php  }  
        
if ($_POST['id_ev']) {
  die("<script>location.href = '../viewEvent.php'</script>");
}else{
  die("<script>location.href = '../index.php'</script>");
}
          
 
        
         ?>