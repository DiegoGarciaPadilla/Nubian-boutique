<?php

    include "../php/conexion.php";

    $sqlVenta = "INSERT INTO venta (venta_fecha, venta_cliente) VALUES (NOW(), $_GET[txtCliente])";
    $queryVenta = $con->query($sqlVenta);
    $mensajeVenta = "";

    if ($queryVenta != null) {
        $sqlUltimaVenta = "select max(venta_id) from venta";
        $queryUltimaVenta = $con->query($sqlUltimaVenta);
        $ultimaId = 0;

        while ($row1 = $queryUltimaVenta->fetch_array()) {
            if ($row1[0] == null) {
                $ultimaId = 1;
            }
            else {
                $ultimaId = $row1[0];
            }
            break;
        }

    $sqlPrecio = "SELECT precio from producto WHERE codigo_barras = '$_GET[txtProducto]'";
    $queryPrecio = $con->query($sqlPrecio);
    $precioProducto = 0;

    while ($row2 = $queryPrecio->fetch_array()) {
        $precioProducto = $row2[0];
        break;
    }
    
    $cantidad = (int) preg_replace('/[^0-9]/', '', $_GET['txtCantidad']);

    $total = $cantidad * $precioProducto;
    $sqlDetalleVenta = "insert into detalle_venta(detalle_venta, detalle_producto, detalle_importe) values ($ultimaId, $_GET[txtProducto], $total)";
    $queryDetalleVenta = $con->query($sqlDetalleVenta);

    if ($queryDetalleVenta != null) {
        $mensajeVenta = "Se ha registrado correctamente la venta, le llegara una notificacion a su correo electronico";
        print "<script>
            alert('$mensajeVenta');
            window.location='../index.php';
        </script>";

        $sqlStock = "UPDATE producto SET stock = stock - $cantidad  WHERE codigo_barras = '$_GET[txtProducto]'";
        $query = $con->query($sqlStock);
    }
    else {
        $mensajeVenta = "Ocurrio un error al registrar la venta, por favor vuelva a intentarlo";
        print "<script>
            alert('$mensajeVenta');
            window.location='../index.php';
        </script>";
    }

    }
    else {
        print "<script>
            alert(\"Ocurrio un error al guardar la venta...\");
            window.location='../paginas/comprar.php?producto=$_GET[txtProducto]';
        </script>";
    }
?>