<?php
if (!empty($_POST)) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $file = file_get_contents('http://localhost/webservice/temu3/people.json');
  $data = json_decode($file, true);
  unset($_POST['add']);
  $data["records"] = array_values($data["records"]);
  array_push($data["records"],$_POST);
  file_put_contents('people.json', json_encode($data));
  header('location:tampil.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Kang Yahya">
    <title>Latihan Web Service 3 : JSON Data CRUD without database</title>
    <link rel="stylesheet" href="http://localhost/webservice/temu3/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/webservice/temu3/assets/css/latihwebservice3.css">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="tampil.php" class="navbar-brand">STMIK IKMI CIREBON</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="clr1 active"> <a href="tampil.php">Home</a> </li>
            <li class="clr2"> <a href="#">JSON</a> </li>
            <li class="clr3"> <a href="#">XML</a> </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br><br><br>
    <div class="container">
      <div class="jumbotron">
        <h3>Latihan Web Service - Pertemuan 3</h3>
        <p><b>Create,</b> Read, Update and Delete Data from JSON</p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-5 col-sm-offset-3">
          <h3>Tambah Pengguna Baru</h3>
          <form action="" method="post">
            <div class="form-group">
              <label for="inputFName">Nama Depan</label>
              <input type="text" name="fname" class="form-control" required id="inputFName" placeholder="Fisrt Name"><span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputLName">Nama Belakang</label>
              <input type="text" name="lname" class="form-control" required id="inputLName" placeholder="Last Name"><span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputAge">Usia</label>
              <input type="number" name="age" class="form-control" required id="inputAge" placeholder="AGE"><span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputJk">Jenis Kelamin</label>
              <select name="gender" class="form-control" required id="inputJk">
                <option value="">Please Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">T A M B A H</button>
              <a href="tampil.php" class="btn btn-default">B A C K</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
  </body>
</html>
