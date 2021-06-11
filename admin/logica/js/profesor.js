function validar_profesor(form){
  let cedula = form.cedula;
  let apellido = form.apellido;
  let nombre = form.nombre;
  let indice_dactilar = form.indice_dactilar;
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
  if(isFull(indice_dactilar)){
    setDesError(indice_dactilar);
  }else{
    setError(indice_dactilar);
  }
  if(isFull(pass)){
    setDesError(pass);
  }else{
    setError(pass);
  }
  if(isCedula(cedula) && isFull(cedula) && isFull(apellido) && isFull(nombre) && isFull(indice_dactilar) && isFull(pass)){
    return true;
  }else{
    return false;
  }
}