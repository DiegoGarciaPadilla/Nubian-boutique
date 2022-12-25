<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Nubian</title>

    <link rel="stylesheet" href="plantilla/imagenes/css/estilo.css">
    <link rel="stylesheet" href="plantilla/imagenes/css/index.css">
    <link rel="shotcut icon" href="plantilla/imagenes/favicon.ico">

    <script src="https://kit.fontawesome.com/ed3939eb66.js" crossorigin="anonymous"></script>
    <script src="plantilla/js/nav.js"></script>
    <script src="plantilla/js/cookies.js"></script>

  </head>
  <body class="body">

    <!--Cabecera-->

    <header class="cabecera">
      <nav>
        <div class="nav_logo">
          <h3 id="blanco">nubian.</h3>
        </div>
        <ul class="nav_vinculos">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="paginas/ropa.php">Ropa</a></li>
          <li><a href="paginas/sneakers.php">Sneakers</a></li>
          <li><a href="paginas/bolsas.php">Bolsas</a></li>
          <li><a href="paginas/accesorios.php">Accesorios</a></li>
          <li><a href="paginas/contacto.html">Contacto</a></li>
        </ul>
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

      <div class="titulo">luxury streetwear.</div>
      <br>
      <div class="img1">
        <img src="plantilla/imagenes/offWhite1.webp">
        <img id="img1_ocultar" src="plantilla/imagenes/supreme1.webp">
        <img id="img1_ocultar" src="plantilla/imagenes/offWhite2.webp">
      </div>
      <br>
      <h3 id="sub">Encuentra colecciones exclusivas de los más prestigiosos diseñadores de Paris, Milán y New York.</h3>
      <br>
      <br>
      <div class="titulo">novedades.</div>
      <div class="articulos">
        <?php

        include "php/conexion.php";

        $sql = "SELECT p.codigo_barras, p.nombre_producto, p.stock, p.precio, c.clasificacion_nombre, p.imagen
          FROM producto p
          INNER JOIN clasificacion c
          ON c.clasificacion_id = p.clasificacion";
        $query = $con->query($sql);

        while ($row = $query->fetch_array()) {
          $nuevaRuta = str_replace("../", "", $row[5]);
          ?>

          <div class="articulo" onclick="location.href='paginas/comprar.php?producto=<?php echo $row[0]; ?>'">
            <img class="modelo" src="<?php echo "$nuevaRuta"; ?>" alt="<?php echo "$row[1]";?>">
              <div class="detalles">
                <p><?php echo "$row[1]"; ?></p>
                <p><?php echo "$$row[3]";?></p>
              </div>
            </div>
          <?php
        }
        ?>
      </div>
    </section>

    <!--/ Contenido-->

    <!--Pie de página-->

    <footer class="pie">
      <p>Esta página web no representa a ninguna empresa real y esta hecha con fines meramente educativos.</p>
      <a id="gris" href="paginas/login.html">Acceder como administrador</a>
    </footer>

    <!--/ Pie de página-->

  </body>
</html>
