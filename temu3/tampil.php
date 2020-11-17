<?php
$getFile = file_get_contents('people.json');
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

  </body>
</html>
