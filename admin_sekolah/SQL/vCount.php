
<?php 
include 'config.php';

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

$no=0;
$table;




 
?>