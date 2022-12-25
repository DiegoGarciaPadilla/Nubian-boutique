<?php

session_start();

if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {

print "<script>alert(\"Acceso
invalido!\");window.location='../paginas/login.html';</script>";
}

include "conexion.php";

  $file_name = $_FILES['txtFoto']['name'];
  $add = "../plantilla/imagenes/$file_name";
  $ruta_foto = "../plantilla/imagenes/$file_name";

  if (move_uploaded_file($_FILES['txtFoto']['tmp_name'], $add)) {
    $codigo_barras = $_POST['txtCodigoBarras'];
    $nombre_producto = $_POST['txtNombreProducto'];
    $stock = $_POST['txtStock'];
    $precio = $_POST['txtPrecio'];
    $clasificacion = $_POST['txtClasificacion'];
    $sql1 = "INSERT INTO producto (codigo_barras, nombre_producto, stock, precio, imagen, clasificacion) VALUES ('$codigo_barras', '$nombre_producto', $stock, $precio, '$ruta_foto', $clasificacion)";
    $query = $con->query($sql1);

    if ($query != null) {
      print "<script>
        alert('Se ha registrado correctamente el producto');
        window.location='../administracion/consulta_productos.php';
      </script>";
    } else {
      print "<script>
        alert('Ocurrio un error al registrar el producto');
        window.location='../administracion/consulta_productos.php';
      </script>";
    }
  }
  else {
    print "<script>
      alert('Ocurrio un error al subir la foto, verifique la ruta de la foto, el formato y el tamaño');
      window.location='../administracion/consulta_productos.php';
    </script>";
}
?>
