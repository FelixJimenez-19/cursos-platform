function validar_certificado_tipo(form){
  let nombre = form.nombre;
  
  if(isFull(nombre)){
    setDesError(nombre);
  }else{
    setError(nombre);
  }
  if(isFull(nombre)){
    return true;
  }else{
    return false;
  }
}