<?php
  include_once('../conexionbd/conexion.php');

  class Archivo{
    private $archivo;
    private $con;

    public function __construct() {
      $this->con = new Conexion();
      $this->con->conectar();
    }

    public function set($atributo, $contenido) {
      $this->$atributo = $contenido;
    }

    public function crear() {
      try{
        $ruta = '../archivo.txt';
        copy($_FILES['archivo']['tmp_name'], $ruta);


        $total = 0;
        $this->archivo = file_get_contents($ruta);
        $datos1 = explode("\n", $this->archivo);

        while($total < count(array_count_values(file($ruta)))){
          $datos2 = explode(",", $datos1[$total]);

          $sql = "INSERT INTO usuarios(correo, nombre, apellido, codigo) VALUES('{$datos2[0]}', '{$datos2[1]}', '{$datos2[2]}', '{$datos2[3]}')";
          $this->con->consultaSimple($sql);

          $total++;
        }

        return true;

      }catch(Exception $e){
        echo "Mensaje: ".$e;
      }
    }

    public function listar() {
        $sql = "SELECT * jj";
        $resultado =$this->con->consultaRetorno($sql);

        if(mysqli_num_rows($resultado)){
          return echo "trae los datos";
        }
    }
  }
?>
