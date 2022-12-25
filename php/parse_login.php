<?php
  if(!empty($_POST)){

    	if(isset($_POST["txtUsuario"]) &&isset($_POST["txtPassword"])){

        if($_POST["txtUsuario"]!=""&&$_POST["txtPassword"]!=""){

          include "../php/conexion.php";

          $user_id=null;
          $sql1= "select * from usuario where usuario_nombre='$_POST[txtUsuario]' and usuario_password=md5('$_POST[txtPassword]');";
          $query = $con->query($sql1);

          while ($r=$query->fetch_array()) {
            $user_id=$r["usuario_id"];
            break;
          }

          if($user_id==null) {
            print "<script>alert(\"Acceso invalido.\");window.location='../paginas/login.html';</script>";
          }
          else {
            session_start();

            $_SESSION["usuario_id"]=$user_id;

            print "<script>window.location='../administracion/inicio.php';</script>";
          }
        }
        else {
          print "<script>alert(\"Por favor ingrese el usuario y contraseña.\");window.location='../paginas/login.html';</script>";
        }
      }
      else
      {
        print "<script>alert(\"Por favor ingrese el usuario y contraseña correctamente.\");window.location='../paginas/login.html';</script>";
      }
    }
    else {
      print "<script>alert(\"Por favor ingrese el usuario y contraseña correctamente.\");window.location='../paginas/login.html';</script>";
}
?>
