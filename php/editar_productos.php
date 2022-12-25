<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {

    print "<script>
      alert(\"Acceso invalido!\");window.location='../paginas/login.html';
    </script>";
  }

  include "conexion.php";

  if ($_POST['radioActualizaFoto'] == "no") {

    $sql = "UPDATE `producto` SET `nombre_producto`='$_POST[txtNombreProducto]',`stock`=$_POST[txtStock], `precio`=$_POST[txtPrecio],`clasificacion`=$_POST[txtClasificacion] WHERE codigo_barras = $_POST[txtCodigoBarras]";
    $query = $con->query($sql);

    if ($query != null) {
      print "<script>
        alert('Se ha modificado correctamente el producto');
        window.location='../administracion/consulta_productos.php';
      </script>";
    } else {
      print "<script>
        alert('Ocurrio un error al modificar el producto');
        window.location='../administracion/consulta_productos.php';
      </script>";
    }
  }

  else if ($_POST['radioActualizaFoto'] == "si") {

    $file_name = $_FILES['txtFoto']['name'];
    $add = "../plantilla/imagenes/$file_name";
    $ruta_foto = "../plantilla/imagenes/$file_name";

    if (move_uploaded_file($_FILES['txtFoto']['tmp_name'], $add)) {

   $codigo_barras = $_POST['txtCodigoBarras'];
   $nombre_producto = $_POST['txtNombreProducto'];
   $stock = $_POST['txtStock'];
   $precio = $_POST['txtPrecio'];
   $clasificacion = $_POST['txtClasificacion'];

   $sql = "UPDATE `producto` SET`nombre_producto`='$nombre_producto',`stock`=$stock, `precio`=$precio, `imagen`='$ruta_foto', `clasificacion`=$clasificacion WHERE codigo_barras = '$codigo_barras'";
   $query = $con->query($sql);

   if ($query != null) {
   print "<script>
      alert('Se ha modificado correctamente el producto');
      window.location='../administracion/consulta_productos.php';
    </script>";
    } else {
      print "<script>
          alert('Ocurrio un error al modificar el producto');
          window.location='../administracion/consulta_productos.php';
        </script>";
      }
    } else {
      print "<script>
        alert('Ocurrio un error al subir la foto, verifique la ruta de la foto, el formato y el tamaño');
        window.location='../administracion/consulta_productos.php';
        </script>";
      }
    }


?>
