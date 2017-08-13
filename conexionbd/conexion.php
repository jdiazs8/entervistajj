<?php
  class Conexion {
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct() {
      $this->host = 'localhost';
      $this->user = 'root';
      $this->pass = '';
      $this->db = 'jj';
    }

    public function conectar() {
      try{
        $this->con = mysqli_connect($this->host, $this->user, $this->pass);
        mysqli_select_db($this->con, $this->db);
        mysqli_set_charset($this->con, 'utf8');
      }catch(Exception $e){
        echo 'Mensaje: '.$e ;
      }

    }

    public function consultaSimple($sql) {
      try{
        mysqli_query($this->con, $sql);
      }catch(Exception $e) {
        echo 'Mensaje: '.$e ;
      }
    }

    public function consultaRetorno($sql) {
      try{
        return mysqli_query($this->con, $sql);
      }catch(Exception $e) {
        echo 'Mensaje: '.$e ;
      }
    }
  }
?>
