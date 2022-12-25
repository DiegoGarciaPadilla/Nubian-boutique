function validar(){
  var validado = true;
  elementos = document.getElementsByClassName("field");

  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
      validado = false
    }
  }

  if(validado){
    window.location = "/action_page.php";
  }
  else{
    alert("Hay campos vacios");
  }
}
