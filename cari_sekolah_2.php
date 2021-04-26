<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMS Layanan Pendidikan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-collapse"
  style="padding-left: 50px; padding-right: 50px; padding-top: 10px; margin-bottom: 200px;">




  <div class="wrapper">
    <?php include "view/header.php";?>

    <!-- Content Wrapper. Contains page content -->
    <div class="" style="min-height: 100%;">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content" style="">
        <div class="container-fluid" style="margin-top:100px;">
          <h1><b>Temukan Informasi Layanan Pendidikan ABK</b></h1><br>
          <div style="margin-top:100px; margin-left:200px;">
          <h4><b>Pilih kriteria yang sangat penting bagi anda</b></h4><br>

            

 <!-- Main content -->

                <div class="container-fluid">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Checklist Kriteria Yang Menurut Anda Sangat Penting.</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped"
                                        style="font-size: 15px; -webkit-print-color-adjust: exact;">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;"><input type="checkbox" id="allCheck" /></th>
                                                <th>Kriteria</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td onclick="myCheck1()"><input
                                                id="A1" style="width: 100%;"
                                                type="checkbox" name="retur_d[]"
                                                value="" /></td>
                                                <td>Kriteria</td>
                                            </tr>
                                            <tr>
                                                <td onclick="myCheck2()"><input
                                                id="A2" style="width: 100%;"
                                                type="checkbox" name="retur_d[]"
                                                value="" /></td>
                                                <td>Kriteria</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row (main row) -->


                    

                </div><!-- /.container-fluid -->
            


          </div>
          <div class="" style="text-align: center; padding-top: 50px;">
            <a href="cari_sekolah_3.php" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;"
              class="btn btn-primary btn-sm">Selanjutnya ></a>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>



    $(document).ready(function(){
        $(':checkbox[id="allCheck"]').click(function(){
            if($(this).is(':checked')){
            $("input:checkbox").prop("checked", true);
            } else {
            $("input:checkbox").prop("checked", false);
            }
        });

        });

  </script>

</body>

</html>