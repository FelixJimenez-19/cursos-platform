function validar_contacto(form){
  let nombre = form.nombre;
  let url = form.url;
  if(isFull(nombre)){
    setDesError(nombre);
  }else{
    setError(nombre);
  }
  if(isFull(url)){
    setDesError(url);
  }else{
    setError(url);
  }
  if(isFull(nombre) && isFull(url)){
    return true;
  }else{
    return false;
  }
}