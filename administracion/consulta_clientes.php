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
    <link rel="stylesheet" href="../plantilla/imagenes/css/select.css">
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
      <div class="titulo">administración de clientes.</div>
      <hr>
      <br>
      <div class="lft">
        <form class="form_clientes" action="../php/guardar_cliente.php" method="post">
          <div class="titulo">guardar cliente.</div>
          <div class="campo">
            <input type="text" name="txtNombre" class="field" autocomplete="off" required>
            <label for="txtNombre" class="form_label">
              <span class="contenido">Nombre del cliente</span>
            </label>
          </div>
          <div class="campo">
            <input type="text" name="txtTelefono" class="field" autocomplete="off" autocomplete="off" required>
            <label for="txtTelefono" class="form_label">
              <span class="contenido">Teléfono del cliente</span>
            </label>
          </div>
          <div class="campo">
            <input type="text" name="txtEmail" class="field" autocomplete="off" autocomplete="off" required>
            <label for="txtEmail" class="form_label">
              <span class="contenido">E-Mail</span>
            </label>
          </div>
          <br>
          <div class="boton">
            <button type="submit">Guardar</button>
          </div>
        </form>
      </div>
      <div class="rgt">
        <table border="1">
          <div class="titulo">consulta de clientes.</div>
          <thead>
            <tr>
              <td>ID del cliente</td>
              <td>Nombre</td>
              <td>Teléfono</td>
              <td>Correo</td>
              <td>Opciones</td>
            </tr>
          </thead>
            <?php
              $sql = "select * from cliente";
              $query = $con->query($sql);

              while ($row = $query->fetch_array()) {
            ?>

            <tr>
              <td><?php echo "$row[0]"; ?></td>
              <td><?php echo "$row[1]"; ?></td>
              <td><?php echo "$row[2]"; ?></td>
              <td><?php echo "$row[3]"; ?></td>
              <td>
                <a href="<?php echo "editar_cliente.php?id=$row[0]" ?>">
                  <img src="../plantilla/imagenes/Edit_48px_1.png" alt="editar">
                </a>
                <a href='#' <?php echo "onclick='eliminarCliente($row[0])'" ?>>
                  <img src='../plantilla/imagenes/Delete_48px_3.png' alt="eliminar">
                </a>
              </td>
            </tr>
            <?php
            }
            ?>
          <tbody>
          </tbody>
        </table>
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
