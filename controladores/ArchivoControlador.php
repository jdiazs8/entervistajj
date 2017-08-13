<?php
  include_once('../modelos/Archivo.php');

  class ArchivoControlador {
    private $archivo;

    public function __construct() {
      $this->archivo = new Archivo();
    }

    public function index() {
      return $this->archivo->listar();
    }

    public function crear($archivo) {
      $this->archivo->set('archivo', $archivo);

      return $this->archivo->crear();;
    }
  }
?>
