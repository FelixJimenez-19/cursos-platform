function validar_area(form){
  let codigo = form.codigo;
  let descripcion = form.descripcion;
  
  if(isFull(codigo)){
    if(isExcededLength(codigo, 2)){
      setError(codigo);
    }else{
      setDesError(codigo);
    }
  }else{
    setError(codigo);
  }
  if(isFull(descripcion)){
    setDesError(descripcion);
  }else{
    setError(descripcion);
  }
  
  if(isFull(codigo) && isFull(descripcion) && !isExcededLength(codigo, 2)){
    return true;
  }else{
    return false;
  }
}