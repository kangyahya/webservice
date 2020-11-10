<?php
class Connections {
  protected $dns = "mysql:host=localhost; dbname=db_webservice";
  protected $db_user = "root";
  protected $db_pass = "";
  protected $connect = "";
  public function getConnection(){
    try {
      $db = new PDO($this->dns, $this->db_user, $this->db_pass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if ($db===FALSE) {
        throw new Exception("Koneksi Gagal");
      }else{
        $this->connect = $db;
      }
    } catch (Exception $e) {
      echo "Error : ".$e->getMessage();
    }
    return $this->connect
  }
  public function closeConnection(){
    $this->connect = null;
  }
}
class ActiveRecord extends Connections{
  public function fetchObject($sql){
    $clone = [];
    try {
      $data = $this->getConnection()->prepare($sql);
      $data->setFetchMode(PDO::FETCH_INTO, $this);
      $data->execute();
      foreach($data->fetch() as $dt){
        $clone[] = clone $dt;
      }
      $this->closeConnection();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    return $clone;
  }
}
?>
