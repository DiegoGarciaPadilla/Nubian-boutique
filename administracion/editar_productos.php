<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {
    print "<script>
      alert(\"Acceso invalido!\");window.location='../paginas/login.html';
    </script>";
  }

  include "../php/conexion.php";

  $sql = "select * from producto WHERE codigo_barras='$_GET[id]'";
  $query = $con->query($sql);

  $codigo_barras = "";
  $nombre_producto = "";
  $stock = 0;
  $precio = 0;
  $fotoActual = "";
  $clasificacion = 0;

  while ($row = $query->fetch_array()) {
    $codigo_barras = $row[0];
    $nombre_producto = $row[1];
    $stock = $row[2];
    $precio = $row[3];
    $fotoActual = $row[4];
    $clasificacion = $row[5];
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
      <div class="titulo">editar producto: <?php echo "$nombre_producto"; ?></div>
      <hr>
      <br>
      <form class="form_editarproductos" action="../php/editar_productos.php" method="post" enctype="multipart/form-data">
        <div class="campo">
          <input type="text" name="txtCodigoBarras" class="field" autocomplete="off"  value="<?php echo "$codigo_barras"; ?>">
          <label for="txtNombre" class="form_label">
            <span class="contenido">Código de barras</span>
          </label>
        </div>
        <div class="campo">
          <input type="text" name="txtNombreProducto" class="field" autocomplete="off" autocomplete="off"  value="<?php echo "$nombre_producto"; ?>">
          <label for="txtNombreProducto" class="form_label">
            <span class="contenido">Nombre del producto</span>
          </label>
        </div>
        <div class="campo">
          <input type="number" name="txtStock" class="field" autocomplete="off" min="0" autocomplete="off"   value="<?php echo "$stock"; ?>">
          <label for="txtStock" class="form_label">
            <span class="contenido">Stock</span>
          </label>
        </div>
        <div class="campo">
          <input type="number" name="txtPrecio" class="field" autocomplete="off" min="0" autocomplete="off"  value="<?php echo "$precio"; ?>">
          <label for="txtPrecio" class="form_label">
            <span class="contenido">Precio</span>
          </label>
        </div>
        <div class="ancho100" style="margin-bottom: 1vh">
          <label align="center" for="txtFotoActual">Foto actual</label>
          <br>
          <img src="<?php echo "$fotoActual"; ?>" alt="<?php echo "$nombre_producto"; ?>" height="150px">
        </div>
        <div class="ancho100" style="border-bottom: 3px solid #333" style="margin-bottom: 3vh">
          <label for="txtFoto">¿Desea actualizar la foto?:</label>
          <br>
          <label for="radioSiActualizaFoto">Si </label>
          <input type="radio" id="radioSiActualizaFoto" name="radioActualizaFoto" value="si">
          <label for="radioNoActualizaFoto">No </label>
          <input type="radio" id="radioNoActualizaFoto" name="radioActualizaFoto" value="no" checked>
          <br><br>
        </div>
        <div class="campo">
          <input type="file" name="txtFoto" class="field" autocomplete="off" autocomplete="off">
          <label for="txtFoto" class="form_label"></label>
        </div>
        <select name="txtClasificacion" id="txtClasificacion">
          <option selected disabled value="">Clasificacion</option>
          <?php

          $sql2 = "select * from clasificacion";
          $query2 = $con->query($sql2);

          while ($row2 = $query2->fetch_array()) {

          ?>
          <option value='<?php echo "$row2[0]" ?>'
            <?php if($row2[0] == $clasificacion) {
              echo "selected=\"selected\"";
            } ?>>
            <?php echo "$row2[1]"; ?>
          </option>
          <?php
        }
        ?>
      </select>
      <div class="boton">
        <button type="submit">Modificar</button>
      </div>
      </form>
    </section>

    <!--/ Contenido-->

    <!--Pie de página-->

    <footer class="pie">
      <p>Esta página web no representa a ninguna empresa real y esta hecha con fines meramente educativos.</p>
      <a id="gris" href="../index.php">Volver al Inicio</a>
    </footer>

    <!--/ Pie de página-->

  </body>
</html>
