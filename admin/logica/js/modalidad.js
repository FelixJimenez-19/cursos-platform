function validar_modalidad(form){
  let descripcion = form.descripcion;
  
  if(isFull(descripcion)){
    setDesError(descripcion);
  }else{
    setError(descripcion);
  }
  
  if(isFull(descripcion)){
    return true;
  }else{
    return false;
  }
}