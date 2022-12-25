<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {

    print "<script>
      alert(\"Acceso invalido!\");window.location='../paginas/login.html';
    </script>";
  }

  include "conexion.php";

  $id = $_GET['txtId'];
  $nombre = $_GET['txtNombre'];
  $sql = "UPDATE clasificacion set clasificacion_nombre = '$nombre' WHERE clasificacion_id = $id";

  $query = $con->query($sql);

  if ($query != null) {
    print "<script>
    alert(\"Se han modificado correctamente los datos\");
    window.location='../administracion/consulta_clasificacion.php';
    </script>";
  }
  else {
    print "<script>
    alert(\"Ocurrio un error al modificar los datos...\");
    window.location='../administracion/editar_clasificacion.php?id=$id';
    </script>";
}
?>
