function eliminarClasificacion(id) {

  var opcion = confirm("¿Esta seguro que desea eliminar este registro?");
  var cadenaRuta = "";

  if (opcion === true) {
    cadenaRuta = "../php/eliminar_clasificacion.php?id="+id;
    window.location = cadenaRuta;
  }
  else {
    alert("Se han cancelado su operación");
  }
}

function eliminarProducto(id) {

  var opcion = confirm("¿Esta seguro que desea eliminar este registro?");
  var cadenaRuta = "";

  if (opcion === true) {
    cadenaRuta = "../php/eliminar_producto.php?id="+id;
    window.location = cadenaRuta;
  }
 else {
   alert("Se han cancelado su operación");
  }

}

function eliminarCliente(id) {

  var opcion = confirm("¿Esta seguro que desea eliminar este registro?");
  var cadenaRuta = "";

  if (opcion === true) {
    cadenaRuta = "../php/eliminar_cliente.php?id="+id;
    window.location = cadenaRuta;
  }
 else {
   alert("Se han cancelado su operación");
 }
}
