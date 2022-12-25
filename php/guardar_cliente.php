<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {
    print "<script>
      alert(\"Acceso invalido!\");window.location='../paginas/login.html';
    </script>";
  }

  include "../php/conexion.php";

  $nombre_cliente = $_POST['txtNombre'];
  $telefono_cliente = $_POST['txtTelefono'];
  $email_cliente = $_POST['txtEmail'];

  $sql = "INSERT INTO cliente (nombre_cliente, telefono_cliente, email_cliente) VALUES ('$nombre_cliente', '$telefono_cliente', '$email_cliente')";
  $query = $con->query($sql);

  if ($query != null) {

 print "<script>
 alert(\"Se ha registrado correctamente los datos\");
 window.location='../administracion/consulta_clientes.php';
 </script>";

} else {

 print "<script>
  alert(\"Ocurrio un error al registrar los datos...\");
  window.location='../administracion/consulta_clientes.php';
  </script>";

}

?>
