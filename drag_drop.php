<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMS Layanan Pendidikan</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    @import url("https://fonts.googleapis.com/css?family=Arimo:400,700|Roboto+Slab:400,700");

:root {
  font-size: calc(0.5vw + 1vh);
}

* {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  min-width: 420px;
}

h1,
h4 {
  font-family: "Arimo", sans-serif;
  line-height: 1.3;
}

header h1 {
  font-size: 2.4rem;
  margin: 4rem auto;
}

span {
  font-size: 3rem;
}

p {
  font-family: "Roboto Slab", serif;
}

a,
a:link,
a:active,
a:visited {
  color: #0066aa;
  text-decoration: none;
  border-bottom: #000013 0.16rem solid;
}

a:hover {
  color: #000013;
  border-bottom: #0066aa 0.16rem solid;
}

header,
footer {
  width: 40rem;
  margin: 2rem auto;
  text-align: center;
}

.add-task-container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 20rem;
  height: 5.3rem;
  margin: auto;
  background: #a8a8a8;
  border: #000013 0.2rem solid;
  border-radius: 0.2rem;
  padding: 0.4rem;
}

.main-container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.columns {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  margin: 1.6rem auto;
}

.column {
  width: 8.4rem;
  margin: 0 0.6rem;
  background: #a8a8a8;
  border: #000013 0.2rem solid;
  border-radius: 0.2rem;
}

.column-header {
  padding: 0.1rem;
  border-bottom: #000013 0.2rem solid;
}

.column-header h4 {
  text-align: center;
}

.to-do-column .column-header {
  background: #ff872f;
}

.doing-column .column-header {
  background: #13a4d9;
}

.done-column .column-header {
  background: #15d072;
}

.trash-column .column-header {
  background: #ff4444;
}

.task-list {
  min-height: 3rem;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

li {
  list-style-type: none;
}

.column-button {
  text-align: center;
  padding: 0.1rem;
}

.button {
  font-family: "Arimo", sans-serif;
  font-weight: 700;
  border: #000013 0.14rem solid;
  border-radius: 0.2rem;
  color: #000013;
  padding: 0.6rem 1rem;
  margin-bottom: 0.3rem;
  cursor: pointer;
}

.delete-button {
  background-color: #ff4444;
  margin: 0.1rem auto 0.6rem auto;
}

.delete-button:hover {
  background-color: #fa7070;
}

.add-button {
  background-color: #ffcb1e;
  padding: 0 1rem;
  height: 2.8rem;
  width: 10rem;
  margin-top: 0.6rem;
}

.add-button:hover {
  background-color: #ffdd6e;
}

.task {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  vertical-align: middle;
  list-style-type: none;
  background: #fff;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  margin: 0.4rem;
  height: 4rem;
  border: #000013 0.15rem solid;
  border-radius: 0.2rem;
  cursor: move;
  text-align: center;
  vertical-align: middle;
}

#taskText {
  background: #fff;
  border: #000013 0.15rem solid;
  border-radius: 0.2rem;
  text-align: center;
  font-family: "Roboto Slab", serif;
  height: 4rem;
  width: 7rem;
  margin: auto 0.8rem auto 0.1rem;
}

.task p {
  margin: auto;
}

/* Dragula CSS Release 3.2.0 from: https://github.com/bevacqua/dragula */

.gu-mirror {
  position: fixed !important;
  margin: 0 !important;
  z-index: 9999 !important;
  opacity: 0.8;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
  filter: alpha(opacity=80);
}

.gu-hide {
  display: none !important;
}

.gu-unselectable {
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
}

.gu-transit {
  opacity: 0.2;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
  filter: alpha(opacity=20);
}

  </style>
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
          <div style="margin-top:150px; margin-left:200px;">
            <h4><b>Lakukan pengelompokkan kriteria lainnya berdasarkan tingkat prioritas anda</b></h4><br>
            <h5>Anda hanya perlu melakukan drag and drop pada kriteria yang ingin dipindahkan</h5><br>
            <div class="row" style="margin-top:50px; margin-left:20px;">
              <div class="col-md-4">
                <label>Bentuk Sekolah</label>
              </div>
              <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>-- Pilih Bentuk Sekolah --</option>
                  <option>Bentuk A</option>
                </select>
              </div>
            </div>

            <div class="row" style="margin-top:50px; margin-left:20px;">
              <div class="col-md-4">
                <label>Status Sekolah</label>
              </div>
              <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>-- Pilih Status Sekolah --</option>
                  <option>Status A</option>
                </select>
              </div>
            </div>

            <div class="row" style="margin-top:50px; margin-left:20px;">
              <div class="col-md-4">
                <label>Jenjang Pendidikan</label>
              </div>
              <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>-- Pilih Jenjang Pendidikan --</option>
                  <option>Jenjang A</option>
                </select>
              </div>
            </div>

            <div class="row" style="margin-top:50px; margin-left:20px;">
              <div class="col-md-4">
                <label>Akreditasi Sekolah</label>
              </div>
              <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>-- Pilih Akreditasi Sekolah --</option>
                  <option>Jenjang A</option>
                </select>
              </div>
            </div>

            <div class="row" style="margin-top:50px; margin-left:20px;">
              <div class="col-md-4">
                <label>Kebutuhan Khusus yang dilayani</label>
              </div>
              <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>-- Pilih Kebutuhan Khusus yang dilayani --</option>
                  <option>Jenjang A</option>
                </select>
              </div>
            </div>

            <div class="row" style="margin-top:50px; margin-left:20px;">
              <div class="col-md-4">
                <label>Lokasi Sekolah</label>
              </div>
              <div class="col-md-6">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled>-- Pilih Lokasi Sekolah --</option>
                  <option>Jenjang A</option>
                </select>
              </div>
            </div>

          </div>
          <div class="" style="text-align: center; padding-top: 50px;">
            <h5>Ingin menampilkan kriteria lainnya? <a href="#"> Tampilkan.</a></h5>
            <a href="" style="margin-top: 20px; color: white; width: 150px; background-color: #05319D;"
              class="btn btn-primary btn-sm">Selanjutnya ></a>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>

    <h1>Drag & Drop<br/><span>Lean Kanban Board</span></h1>
</header>

<div class="add-task-container">
  <input type="text" maxlength="12" id="taskText" placeholder="New Task..." onkeydown="if (event.keyCode == 13)
                        document.getElementById('add').click()">
  <button id="add" class="button add-button" onclick="addTask()">Add New Task</button>
</div>

<div class="main-container">
  <ul class="columns">

    <li class="column to-do-column">
      <div class="column-header">
        <h4>To Do</h4>
      </div>
      <ul class="task-list" id="to-do">
        <li class="task">
          <p>Analysis</p>
        </li>
        <li class="task">
          <p>Coding</p>
        </li>
        <li class="task">
          <p>Card Sorting</p>
        </li>
        <li class="task">
          <p>Measure</p>
        </li>
      </ul>
    </li>

    <li class="column doing-column">
      <div class="column-header">
        <h4>Doing</h4>
      </div>
      <ul class="task-list" id="doing">
        <li class="task">
          <p>Hypothesis</p>
        </li>
        <li class="task">
          <p>User Testing</p>
        </li>
        <li class="task">
          <p>Prototype</p>
        </li>
      </ul>
    </li>

    <li class="column done-column">
      <div class="column-header">
        <h4>Done</h4>
      </div>
      <ul class="task-list" id="done">
        <li class="task">
          <p>Ideation</p>
        </li>
        <li class="task">
          <p>Sketches</p>
        </li>
      </ul>
    </li>

    <li class="column trash-column">
      <div class="column-header">
        <h4>Trash</h4>
      </div>
      <ul class="task-list" id="trash">
        <li class="task">
          <p>Interviews</p>
        </li>
        <li class="task">
          <p>Research</p>
        </li>

      </ul>
      <div class="column-button">
        <button class="button delete-button" onclick="emptyTrash()">Delete</button>
      </div>
    </li>

  </ul>
</div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js"></script>
    
    <script>


      

/* Custom Dragula JS */
dragula([
  document.getElementById("to-do"),
  document.getElementById("doing"),
  document.getElementById("done"),
  document.getElementById("trash")
]);
removeOnSpill: false
  .on("drag", function(el) {
    el.className.replace("ex-moved", "");
  })
  .on("drop", function(el) {
    el.className += "ex-moved";
  })
  .on("over", function(el, container) {
    container.className += "ex-over";
  })
  .on("out", function(el, container) {
    container.className.replace("ex-over", "");
  });

/* Vanilla JS to add a new task */
function addTask() {
  /* Get task text from input */
  var inputTask = document.getElementById("taskText").value;
  /* Add task to the 'To Do' column */
  document.getElementById("to-do").innerHTML +=
    "<li class='task'><p>" + inputTask + "</p></li>";
  /* Clear task text from input after adding task */
  document.getElementById("taskText").value = "";
}

/* Vanilla JS to delete tasks in 'Trash' column */
function emptyTrash() {
  /* Clear tasks from 'Trash' column */
  document.getElementById("trash").innerHTML = "";
}

    </script>

</body>

</html>