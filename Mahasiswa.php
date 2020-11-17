<?php
require_once "./Connections.php";
class Mahasiswa{
  protected $name;
  protected $umur;
  protected $keyApi = '123';
  public function setName($name){
    $this->name = $name;
  }
  public function getName(){
    return $this->name;
  }
  public function setUmur($umur){
    $this->umur = $umur;
  }
  public function getUmur(){
    return $this->umur;
  }
  public function validate_apiKey($keyApi){
    if ($this->keyApi !== $keyApi) {
      return false;
    }else{
      return true;
    }
  }
  public function getMahasiswa(){
    $objAr = new ActiveRecord();
    $sql = "SELECT * FROM tbl_webservice WHERE 1=1";
    if($this->getName()){
      $sql .="AND nama_mhs LIKE '%{$this->getName()}%'";
    }
    if($this->getUmur()){
      $sql .="AND umur_mhs LIKE '%{$this->getUmur()}%'";
    }
    return $objAr->fetchObject($sql);
  }
}
?>
