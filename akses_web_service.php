<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Latihan Web Service 2</title>
    <style media="screen">body{width:600px}</style>
  </head>
  <body>
    <h2>Latihan Pertemuan 2 : Menampilkan Tabel Mahasiswa dengan JSON</h2><hr>
    <h2>41204716 - Moh. Yahya</h2>
    <form action="" method="get">
      Name : <input type="text" name="name"><br>
      Umur : <input type="text" name="umur"><br>
      <button type="submit">Search</button>
    </form>
    <?php
    if ($_GET) {
      $s_name = isset($_GET['name']) ? $_GET['name'] : '';
      $s_umur = isset($_GET['umur']) ? $_GET['umur'] : '';
      $url = "http://localhost/webservice/web_service.php?apikey=123&name={$s_name}&umur={$s_umur}";

      $fields = [
        'name' => $s_name,
        'umur' => $s_umur
      ];
      $data = http_build_query($fields);
      $options = array(
        'http'=> array(

            'header' => "content-type : application/x-www-form-urlencoded\r\n",
            'method' => 'GET',
            'content'=> $data
          ),
        );
      $context = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      $vr = json_decode($result, true);
      echo "<pre>";
          print_r($vr);
      echo "</pre>";
    }
    ?>
  </body>
</html>
