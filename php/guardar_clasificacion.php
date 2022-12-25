<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {

    print "<script>
      alert(\"Acceso invalido!\");window.location='../paginas/login.html';
    </script>";
  }

  include "conexion.php";

  $nombre_clasificacion = $_GET['txtNombre'];
  $sql = "INSERT INTO clasificacion (clasificacion_nombre) VALUES('$nombre_clasificacion')";
  $query = $con->query($sql);

if ($query != null) {

 print "<script>
  alert(\"Se ha registrado correctamente los datos\");
  window.location='../administracion/consulta_clasificacion.php';
  </script>";
  }
  else {

    print "<script>alert(\"Ocurrio un error al registrar los datos...\");
    window.location='../administracion/consulta_clasificacion.php';</script>";
  }

?>
