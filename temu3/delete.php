<?php
if (isset($_GET["id"])) {
  $id = (int) $_GET['id'];
  $getFile = file_get_contents('people.json');
  $all = json_decode($getFile, true);
  $jsonFile = $all["records"];
  $jsonFile = $jsonFile[$id];
  if ($jsonFile) {
    unset($all["records"][$id]);
    $all["records"] = array_values($all["records"]);
    file_put_contents('people.json', json_encode($all));
  }
  header('location:tampil.php');
}
?>
