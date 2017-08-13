
<?php
  include_once('../controladores/ArchivoControlador.php');
  $controlador = new ArchivoControlador();

  if(isset($_POST['enviar'])) {
    if(end(explode(".", $_FILES['archivo']['name'])) != 'txt'){
      $mensaje = "El tipo de archivo no corresponde.";
    }else {
      $resultado = $controlador->crear($_FILES['archivo']);

      if($resultado) {
        $controlador->index();
        //colocar aqui el redireccionamiento y enviar la variable por get
        echo mysqli_num_rows($resultado);
      }else {
        $mensaje = 'Ocurrió un problema al intentar subir el archivo.';
      }
    }
  }
?>

<!DOCTYPE html>

<html lang="es">
  <head>
    <title></title>
  </head>

  <body>
    <section class="formulario">
      <h2>GEMAS SAS</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <h3>Formulario de carga de información</h3>
        <input type="file" name="archivo" required>
        <br>
        <?php
          if(!empty($mensaje)) {
            echo "<p class='mensaje'>". $mensaje ."</p>";
          }
        ?>
        <br>
        <input type="submit" name="enviar" value="Enviar formulario">
      </form>
    </section>

  </body>
</html>
