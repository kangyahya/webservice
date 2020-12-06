<?php
if (isset($_GET["id"])) {
  $id = (int) $_GET['id'];
  $getFile = file_get_contents('people.json');
  $jsonFile = json_decode($getFile, true);
  $jsonFile = $jsonFile["records"];
  $jsonFile = $jsonFile[$id];
}
if (isset($_POST["id"])) {
  $id = (int) $_POST['id'];
  $getFile = file_get_contents('people.json');
  $all = json_decode($getFile, true);
  $jsonFile = $all["records"];
  $jsonFile = $jsonFile[$id];
  $post["fname"] = isset($_POST['fname']) ? $_POST['fname'] : '' ;
  $post["lname"] = isset($_POST['lname']) ? $_POST['lname'] : '' ;
  $post["age"] = isset($_POST['age']) ? $_POST['age'] : '' ;
  $post["gender"] = isset($_POST['gender']) ? $_POST['gender'] : '' ;
  if ($jsonFile) {
    unset($all["records"][$id]);
    $all["records"][$id] = $post;
    $all["records"] = array_values($all["records"]);
    file_put_contents('people.json', json_encode($all));
  }
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
          <?php if (isset($_GET["id"])): ?>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="form-group">
              <label for="inputFName">Nama Depan</label>
              <input type="text" name="fname" class="form-control" required id="inputFName" placeholder="Fisrt Name" value="<?=$jsonFile["fname"]?>"><span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputLName">Nama Belakang</label>
              <input type="text" name="lname" class="form-control" required id="inputLName" placeholder="Last Name" value="<?=$jsonFile["lname"]?>"><span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputAge">Usia</label>
              <input type="number" name="age" class="form-control" required id="inputAge" placeholder="AGE" value="<?=$jsonFile["age"]?>"><span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="inputJk">Jenis Kelamin</label>
              <select name="gender" class="form-control" required id="inputJk">
                <option value="">Please Select</option>
                <option value="Male" <?=($jsonFile["gender"]=="Male")?"selected":"" ?>>Male</option>
                <option value="Female" <?=($jsonFile["gender"]=="Female")?"selected":"" ?>>Female</option>
              </select>
              <span class="help-block"></span>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">U B A H   D A T A</button>
              <a href="tampil.php" class="btn btn-default">B A C K</a>
            </div>
          </form>
        <?php endif; ?>
        </div>
      </div>
    </div>
    <br>
  </body>
</html>
