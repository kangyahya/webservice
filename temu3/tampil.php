<?php
$getFile = file_get_contents('http://localhost/webservice/temu3/people.json');
$jsonFile = json_decode($getFile);
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
    <br>
    <br>
    <br>
    <br>
    <div class="container">
      <div class="jumbotron">
        <h3>Latihan Web Service - Pertemuan 3</h3>
        <p>Create, <b>Read,</b> Update and Delete Data from JSON</p>
      </div>
    </div>
    <div class="container">
      <div class="btn-toolbar">
        <a href="insert.php" class="btn btn-primary"> <i class="icon-plus"></i> Tambah Data</a>
        <div class="btn-group"></div>
      </div>
    </div>
    <br><br>
    
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=0;
              foreach($jsonFile->records as $index => $obj): $no++;
              ?>
              <tr>
                <td><?=$no;?></td>
                <td><?=$obj->fname?></td>
                <td><?=$obj->lname?></td>
                <td><?=$obj->age?></td>
                <td><?=$obj->gender?></td>
                <td>
                  <a href="update.php?id=<?=$index?>" class="btn btn-xs btn-primary">Edit</a>
                  <a href="delete.php?id=<?=$index?>" class="btn btn-xs btn-danger">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
