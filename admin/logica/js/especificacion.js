function validar_especificacion(form){
  let codigo = form.codigo;
  let descripcion = form.descripcion;
  let id_area = form.id_area;
  
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
  
  if(isFull(id_area)){
    setDesError(id_area);
  }else{
    setError(id_area);
  }
  
  if(isFull(codigo) && isFull(descripcion) && !isExcededLength(codigo, 2) && isFull(id_area)){
    return true;
  }else{
    return false;
  }
}