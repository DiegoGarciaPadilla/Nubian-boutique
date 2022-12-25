<?php

   include "../php/conexion.php";


  $sqlProducto = "select * from producto WHERE codigo_barras = '$_GET[producto]'";
  $queryProducto = $con->query($sqlProducto);
  $row = $queryProducto->fetch_array();

  $codigo = $row[0];
  $nombreProducto = $row[1];
  $stock = $row[2];
  $precio = $row[3];
  $imagenProducto = $row[4];

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Nubian</title>

    <link rel="stylesheet" href="../plantilla/imagenes/css/estilo.css">
    <link rel="stylesheet" href="../plantilla/imagenes/css/formularios.css">
    <link rel="shotcut icon" href="../plantilla/imagenes/favicon.ico">

    <script src="https://kit.fontawesome.com/ed3939eb66.js" crossorigin="anonymous"></script>
    <script src="../plantilla/js/nav.js"></script>
    <script src="../plantilla/js/cookies.js"></script>

    <style>
      .boton button {
        color: #333;
        background-color: white;
         border: 1px solid #333;
      }

      .boton button:hover {
        color: white;
        background-color: #333;
      }
    </style>

  </head>
  <body class="body">

    <!--Cabecera-->

    <header class="cabecera">
      <nav>
        <div class="nav_logo">
          <h3 id="blanco">nubian.</h3>
        </div>
        <ul class="nav_vinculos">
          <li><a href="../index.php">Inicio</a></li>
          <li><a href="ropa.php">Ropa</a></li>
          <li><a href="sneakers.php">Sneakers</a></li>
          <li><a href="bolsas.php">Bolsas</a></li>
          <li><a href="accesorios.php">Accesorios</a></li>
          <li><a href="contacto.html">Contacto</a></li>
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
      <div class="titulo">comprar: <?php echo $nombreProducto;  ?> </div>
      <hr>
      <div class="rgt">
        <div class="comprarImagen">
          <img class="imagen_25" width="50%" src="<?php echo $imagenProducto; ?>" alt="producto">
          <p>PRECIO: $<?php echo $precio;?></p>
        </div>
      </div> 
      <div class="lft">
        <form class="form_compra" action="../php/procesa_compra.php" name="form_compra" method="get">
          <select name="txtCliente">
            <option selected disabled value="">Cliente</option>
            <?php
              $sqlCliente = "select * from cliente";
              $queryCliente = $con->query($sqlCliente);
                  
              if ($queryCliente == null || $queryCliente == 0) {
    	          echo "<option>No hay clientes</option>";
              } else {
                while ($row = $queryCliente->fetch_array()) {
                  echo "<option value='$row[0]'>$row[1]</option>";
                }
              }
            ?>
          </select>
          <select name="txtCantidad">
            <option selected disabled value="">Cantidad a comprar</option>
            <?php
              
              for ($i = 1; $i<= $stock; $i++){
                echo "<option value='$i'>$i</option>";
              }

            ?>
          </select>
          <input style="display:none" type="text"  name="txtProducto" value="<?php echo $codigo ?>">
          <div class="boton">
            <button type="submit">Comprar</button>
          </div>
        </form>
      </div> 
    </section>

    <!--/ Contenido-->

    <!--Pie de página-->

    <footer class="pie">
      <p>Esta página web no representa a ninguna empresa real y esta hecha con fines meramente educativos.</p>
      <a id="gris" href="login.html">Acceder como administrador</a>
    </footer>

    <!--/ Pie de página-->

  </body>
</html>
