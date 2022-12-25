<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {
  print "<script>
    alert(\"Acceso invalido!\");window.location='../paginas/login.html'
  </script>";
}

include "../php/conexion.php";

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
    <script src="../plantilla/js/administracion.js"></script>

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
      <div class="titulo">administración de productos.</div>
      <hr>
      <br>
      <div class="lft">
        <form class="form_producto" action="../php/guardar_productos.php" method="post" enctype="multipart/form-data">
          <div class="titulo">guardar producto.</div>
          <div class="campo">
            <input type="text" name="txtCodigoBarras" class="field" autocomplete="off" required>
            <label for="txtNombre" class="form_label">
              <span class="contenido">Código de barras</span>
            </label>
          </div>
          <div class="campo">
            <input type="text" name="txtNombreProducto" class="field" autocomplete="off" autocomplete="off" required>
            <label for="txtNombreProducto" class="form_label">
              <span class="contenido">Nombre del producto</span>
            </label>
          </div>
          <div class="campo">
            <input type="number" name="txtStock" class="field" autocomplete="off" min="0" autocomplete="off" required>
            <label for="txtStock" class="form_label">
              <span class="contenido">Stock</span>
            </label>
          </div>
          <div class="campo">
            <input type="number" name="txtPrecio" class="field" autocomplete="off" min="0" autocomplete="off" required>
            <label for="txtPrecio" class="form_label">
              <span class="contenido">Precio</span>
            </label>
          </div>
          <div class="campo">
            <input type="file" name="txtFoto" class="field" autocomplete="off" autocomplete="off" required>
            <label for="txtFoto" class="form_label"></label>
          </div>
          <select name="txtClasificacion">
            <option selected disabled value="">Clasificacion</option>
            <?php

              $sql = "select * from clasificacion";
              $query = $con->query($sql);

              while ($row = $query->fetch_array()) {
                echo "<option value='$row[0]'>$row[1]</option>";
              }
            ?>
          </select>
          <br>
          <div class="boton">
            <button type="submit">Guardar</button>
          </div>
        </form>
      </div>
      <div class="rgt">
          <table border="1">
            <div class="titulo">consulta de productos.</div>
            <thead>
              <tr>
                <td>Codigo</td>
                <td>Nombre de producto</td>
                <td>Stock</td>
                <td>Precio</td>
                <td>Clasificación</td>
                <td>Foto</td>
                <td>Opciones</td>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = "select p.codigo_barras, p.nombre_producto, p.stock, p.precio, c.clasificacion_nombre, p.imagen from producto p INNER JOIN clasificacion c ON c.clasificacion_id = p.clasificacion";
              $query = $con->query($sql);

              while ($row = $query->fetch_array()) {
                echo "
                <tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td><img src='$row[5]' alt='$row[1]' height='50px'></td>
                <td>
                  <a href='editar_productos.php?id=$row[0]'>
                    <img src='../plantilla/imagenes/Edit_48px_1.png' alt='editar'>
                  </a>
                  <a href='#' onclick='eliminarProducto($row[0])'>
                    <img src='../plantilla/imagenes/Delete_48px_3.png' alt='eliminar'>
                  </a>
                </td>
                </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
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
