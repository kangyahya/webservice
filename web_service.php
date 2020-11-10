<?php
header('Content-type: application/json');
require_once "./Connections.php";
require_once "./Mahasiswa.php";

$hasil = [];
$s_name = $_GET['name'];
$s_umur = $_GET['umur'];
$s_api = $_GET['apikey'];
$mhs = new Mahasiswa();

if ($mhs->validate_apiKey($s_api)) {
  $mhs->setName($s_name);
  $mhs->setUmur($s_umur);

  $data = $mhs->getMahasiswa();
  reset($data);
  $i =0;
  while (list(,$r) = each($data)) {
    $hasil[$i]['nama_mhs'] = $r->nama_mhs;
    $hasil[$i]['usia_mhs'] = $r->usia_mhs;
    $hasil[$i]['alamat_mhs'] = $r->alamat_mhs;
    ++$i;
  }
  $hasil['status'] = TRUE;
}else{
  $hasil['status'] = FALSE;
}
echo json_encode($hasil);
?>
