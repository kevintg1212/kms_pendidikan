<!DOCTYPE html>

<?php 
include 'controller/conn.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
// if($_SESSION['status'] !="login"){
// 	header("location:../login.php");
// }

?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Layanan Pendidikan ABK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="../dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .hidden{
    display: none;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini" style="max-width: 100%; overflow-x: hidden;">
  <div class="modal fade" id="modal-cancel">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">PERHATIAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menolak ulasan ini? / Apakah anda akan menerima ulasan ini? </p>
        </div>
        <form action="SQL/vDeleteEvent.php" method="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ya</button>
            <input class="event" type="hidden" name="id_ev">
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-edit-jenjang-pendidikan">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Jenjang Pendidikan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="controller/conn_edit_kerusakan.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
                <label for="nik" class="col-sm col-form-label">Jenjang Pendidikan</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan"
                        placeholder="ID Bahan Baku" value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

          <!-- id-pendidikan -->
          <input class="id_jenjangpendidikan1" type="hidden" id="id_jenjangpendidikan1" name="id_jenjangpendidikan1">
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal fade" id="modal-edit-kebutuhan-khusus">
    <div class="modal-dialog" style="max-width: 750px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Kebutuhan Khusus</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="controller/conn_edit_kerusakan.php" method="post">
          <div class="modal-body">
            <div class="form-group row">
                <label for="nik" class="col-sm col-form-label">Kebutuhan Khusus</label>
                <div class="col-sm">
                    <input type="text" class="form-control" id="kebutuhan_khusus" name="kebutuhan_khusus"
                    value="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

          <!-- id-pendidikan -->
          <input class="id_kebutuhankhusus1" type="hidden" id="id_kebutuhankhusus1" name="id_kebutuhankhusus1">
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!-- /.navbar -->

    <?php include "aside.php" ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content"></section>

      <!-- Default box -->

      <div class="row p-2">
        <div class="col-12">
          <div class="card" style="padding: 30px; margin: 30px;">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h5>Kriteria Informasi</h5>
                </div>
              </div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col">
                  <p> Nama Kriteria Informasi </p>
                </div>
                <div class="col">
                  <select class="form-control select2" style="width: 100%;" name="kota" id="kota" >
                    <option selected="selected" value="" disabled>-- Pilih Kabupaten/Kota --</option>
                    <?php 
                      $result = mysqli_query($db2,"SELECT * FROM `wilayah_kabupaten`");
                      while($tmp1 = mysqli_fetch_array($result)){
                    ?>
                    <option style="display: none;" class="city c-<?php echo $tmp1['provinsi_id'];?>" id="c-<?php echo $tmp1['provinsi_id'];?>" value="<?php echo $tmp1['nama'];?>"><?php echo $tmp1['nama'];?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <p>Sub Kriteria Informasi</p>
                </div>
                <div class="col">
                  <table id="subKriteria" class="table table-borderless">
                    <tbody>
								  	    <?php
                        $sqlJurnal= mysqli_query($db2,"
                        select p.id_pembelian, p.tanggal_pembelian, p.tanggal_pengiriman, s.id_supplier, s.nama_toko, d.id_bahan_baku, b.nama_bahan_baku, d.jumlah_pembelian, b.uom, u. nik, u.nama
                        from `pembelian` AS p 
                        inner join detail_pembelian as d on p.id_pembelian = d.id_pembelian 
                        inner join bahan_baku as b on d.id_bahan_baku = b.id_bahan_baku
                        inner join user as u on p.nik = u.nik 
                        inner join supplier as s on p.id_supplier = s.id_supplier 
                        where p.id_pembelian = '$id_pembelian'
                        ");
                        $x=0;
                        while($dataJurnal = mysqli_fetch_array($sqlJurnal)){
                        ?>
                        <tr class=''>
                          <td>
                            <input value="<?php echo $dataJurnal['sub_kriteriainformasi']; ?>" type="text" name="deskripsi[<?php echo $x;?>]" id="deskripsi[<?php echo $x;?>] "class="form-control" placeholder="Sub Kriteria Informasi">
                          </td>
                          <td>
                            <input type="text" class="form-control" id="uom[<?php echo $x;?>]" name="uom[<?php echo $x;?>]" value="<?php echo $dataJurnal['uom']; ?>" placeholder ="Keterangan" >
                          </td>
                          <td style="text-align: center;">
                            <a class="btn btn-danger btn-sm delete_another" onClick=" $(this).closest('tr').remove();">
                              <i class="fas fa-times">
                              </i>
                            </a>
                          </td>
                        </tr>
                          <?php $x++;} 
                          for ($i=$x; $i <= 50; $i++) { 
								  	      $no++;
                          ?>
                        <tr class="hidden">
                          <td>
                            <input value="<?php echo $dataJurnal['sub_kriteriainformasi']; ?>" type="text" name="deskripsi[<?php echo $i;?>]" id="deskripsi[<?php echo $i;?>] "class="form-control" placeholder="Sub Kriteria Informasi">
                          </td>
                          <td>
                            <input type="text" class="form-control" id="uom[<?php echo $i;?>]" name="uom[<?php echo $i;?>]" value="<?php echo $dataJurnal['uom']; ?>" placeholder ="Keterangan" >
                          </td>
                          <td style="text-align: center;">
                            <a class="btn btn-danger btn-sm delete_another" onClick=" $(this).closest('tr').remove();">
                              <i class="fas fa-times">
                              </i>
                            </a>
                          </td>
                        </tr>
								  	    <?php }?>																				
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="row justify-content-end">
                <div class="col-1">
                  <a class="btn btn-sm btn-info add_another" id="btnAddCol" onClick="$('#subKriteria').find('tr.hidden:first').removeClass('hidden');"> add more +</a>
                </div>
              </div>

              <div class="row">
                <p> <b> Detail Kriteria Informasi </b> </p>
              </div>


              <div class="card-body shadow-sm p-3 mb-3 bg-white rounded">
                <div class="row">
                  <table id="detailKriteria" class="table table-borderless">
                    <tbody>
                        <?php
                        $sqlJurnal= mysqli_query($db2,"
                        select p.id_pembelian, p.tanggal_pembelian, p.tanggal_pengiriman, s.id_supplier, s.nama_toko, d.id_bahan_baku, b.nama_bahan_baku, d.jumlah_pembelian, b.uom, u. nik, u.nama
                        from `pembelian` AS p 
                        inner join detail_pembelian as d on p.id_pembelian = d.id_pembelian 
                        inner join bahan_baku as b on d.id_bahan_baku = b.id_bahan_baku
                        inner join user as u on p.nik = u.nik 
                        inner join supplier as s on p.id_supplier = s.id_supplier 
                        where p.id_pembelian = '$id_pembelian'
                        ");
                        $x=0;
                        while($dataJurnal = mysqli_fetch_array($sqlJurnal)){
                        ?>
                        <tr class=''>
                          <td>
                            <input value="<?php echo $dataJurnal['sub_kriteriainformasi']; ?>" type="text" name="deskripsi[<?php echo $x;?>]" id="deskripsi[<?php echo $x;?>] "class="form-control" placeholder="Sub Kriteria Informasi">
                          </td>
                          <td>
                            <input type="text" class="form-control" id="uom[<?php echo $x;?>]" name="uom[<?php echo $x;?>]" value="<?php echo $dataJurnal['uom']; ?>" placeholder ="Keterangan" >
                          </td>
                          <td style="text-align: center;">
                            <a class="btn btn-danger btn-sm delete_another" onClick=" $(this).closest('tr').remove();">
                              <i class="fas fa-times">
                              </i>
                            </a>
                          </td>
                        </tr>
                          <?php $x++;} 
                          for ($i=$x; $i <= 50; $i++) { 
                          $no++;
                          ?>
                        <tr class="hidden">
                          <td>
                            <input value="<?php echo $dataJurnal['sub_kriteriainformasi']; ?>" type="text" name="deskripsi[<?php echo $i;?>]" id="deskripsi[<?php echo $i;?>] "class="form-control" placeholder="Sub Kriteria Informasi">
                          </td>
                          <td>
                            <input type="text" class="form-control" id="uom[<?php echo $i;?>]" name="uom[<?php echo $i;?>]" value="<?php echo $dataJurnal['uom']; ?>" placeholder ="Keterangan" >
                          </td>
                          <td style="text-align: center;">
                            <a class="btn btn-danger btn-sm delete_another" onClick=" $(this).closest('tr').remove();">
                              <i class="fas fa-times">
                              </i>
                            </a>
                          </td>
                        </tr>
                        <?php }?>																				
                    </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="col-1">
                    <a class="btn btn-sm btn-info add_another" id="btnAddCol" onClick="$('#detailKriteria').find('tr.hidden:first').removeClass('hidden');"> add more +</a>
                  </div>
                </div>
              </div>

            </div>

            
          </div>
        </div>
      </div>

    </div>
    <!-- /.card -->

    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
</body>
<script>
  $('#modal-cancel').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient_e = button.data('e') // Extract info from data-* attributes
    var recipient_v = button.data('v')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.event').val(recipient_e)
    modal.find('.volunteer').val(recipient_v)
  })

  $('#modal-edit-jenjang-pendidikan').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient_e = button.data('e'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.id_jenjangpendidikan1').val(recipient_e);
  })


  $('#modal-edit-kebutuhan-khusus').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient_e = button.data('e'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.id_kebutuhankhusus1').val(recipient_e);
  })
</script>

</html>