<?php

  session_start();

  if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_id"] == null) {
    print "<script>
      alert(\"Acceso invalido!\");window.location='../paginas/login.html';
    </script>";
  }

  include "../php/conexion.php";

  $id_cliente = $_POST['txtId'];
  $nombre_cliente = $_POST['txtNombre'];
  $telefono_cliente = $_POST['txtTelefono'];
  $email_cliente = $_POST['txtEmail'];

  $sql = "UPDATE cliente set nombre_cliente = '$nombre_cliente', telefono_cliente = '$telefono_cliente', email_cliente = '$email_cliente' WHERE id_cliente = $id_cliente";
  $query = $con->query($sql);

  if ($query != null) {
    print "<script>
      alert(\"Se han modificado correctamente los datos\");
      window.location='../administracion/consulta_clientes.php';
    </script>";
  } else {
    print "<script>
      alert(\"Ocurrio un error al modificar los datos...\");
      window.location='../administracion/editar_clientes.php?id=$id_cliente';
    </script>";
  }
  
?>
