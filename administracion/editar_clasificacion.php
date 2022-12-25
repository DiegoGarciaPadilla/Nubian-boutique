<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {
  print "<script>
    alert(\"Acceso invalido!\");window.location='../paginas/login.html'
  </script>";
  }

  include "../php/conexion.php";

  $sql = "select * from clasificacion WHERE clasificacion_id = $_GET[id]";
  $query = $con->query($sql);
  $id_clasificacion = 0;
  $nombre_clasificacion = "";

  while ($row = $query->fetch_array()){
    $id_clasificacion = $row[0];
    $nombre_clasificacion = $row[1];
    break;
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Nubian</title>

    <link rel="stylesheet" href="../plantilla/imagenes/css/estilo.css">
    <link rel="stylesheet" href="../plantilla/imagenes/css/crud.css">
    <link rel="shotcut icon" href="../plantilla/imagenes/favicon.ico">

    <script src="https://kit.fontawesome.com/ed3939eb66.js" crossorigin="anonymous"></script>
    <script src="../plantilla/js/nav.js"></script>
    <script src="../plantilla/js/cookies.js"></script>

  </head>
  <body class="body">

    <!--Cabecera-->

    <header class="cabecera">
      <nav>
        <div class="nav_logo">
          <h3 id="blanco">nubian.</h3>
        </div>
        <ul class="nav_vinculos">
          <li><a href="inicio.php">Inicio</a></li>
          <li><a href="consulta_clasificacion.php">Administrar clasificación del producto</a></li>
          <li><a href="consulta_productos.php">Administrar productos</a></li>
          <li><a href="consulta_clientes.php">Administrar clientes</a></li>
        <div class="nav_icono" onclick=navMenu()>
          <div class="linea1"></div>
          <div class="linea2"></div>
          <div class="linea3"></div>
        </div>
      </nav>
    </header>


    <!--/ Cabecera-->

    <!--Contenido-->

    <section class="cuerpo">
      <div class="titulo">editar la clasificación de productos.</div>
      <hr>
      <br>
      <form class="form_editarclasificacion" action="../php/editar_clasificacion.php" method="get">
        <div class="campo">
          <input autofocus type="number" name="txtId" class="field" autocomplete="off"  value="<?php echo "$id_clasificacion"; ?>" readonly>
          <label for="txtId" class="form_label">
            <span class="contenido">ID de la clasificación</span>
          </label>
        </div>
        <div class="campo">
          <input type="text" name="txtNombre" class="field" autocomplete="off" value="<?php echo "$nombre_clasificacion"; ?>" required>
          <label for="txtNombre" class="form_label">
            <span class="contenido">Nombre de la clasificación</span>
          </label>
        </div>
        <br>
        <div class="boton">
          <button type="submit">Modificar</button>
        </div>
      </form>
    </section>

    <!--/ Contenido-->

    <!--Pie de página-->

    <footer class="pie">
      <p>Esta página web no representa a ninguna empresa real y esta hecha con fines meramente educativos.</p>
      <a id="gris" href="../php.html">Volver al Inicio</a>
    </footer>

    <!--/ Pie de página-->

  </body>
</html>
