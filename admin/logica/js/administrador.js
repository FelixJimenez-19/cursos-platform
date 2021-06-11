function validar_administrador(form){
  let cedula = form.cedula;
  let apellido = form.apellido;
  let nombre = form.nombre;
  let pass = form.pass;
  
  if(isCedula(cedula) && isFull(cedula)){
    setDesError(cedula);
  }else{
    setError(cedula);
  }
  if(isFull(apellido)){
    setDesError(apellido);
  }else{
    setError(apellido);
  }
  if(isFull(nombre)){
    setDesError(nombre);
  }else{
    setError(nombre);
  }
  if(isFull(pass)){
    setDesError(pass);
  }else{
    setError(pass);
  }
  if(isCedula(cedula) && isFull(cedula) && isFull(apellido) && isFull(nombre) && isFull(pass)){
    return true;
  }else{
    return false;
  }
}