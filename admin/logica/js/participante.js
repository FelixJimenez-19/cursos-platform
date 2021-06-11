function validar_participante(form){
  let cedula = form.cedula;
  let apellido = form.apellido;
  let nombre = form.nombre;
  let sexo = form.sexo;
  let nivel_instruccion = form.nivel_instruccion;
  let direccion = form.direccion;
  let email = form.email;
  let celular = form.celular;
  let telefono = form.telefono;
  let descripcion = form.descripcion;
  let empresa_nombre = form.empresa_nombre;
  let empresa_actividad = form.empresa_actividad;
  let empresa_direccion = form.empresa_direccion;
  let empresa_telefono = form.empresa_telefono;
  
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
  if(isFull(sexo)){
    setDesError(sexo);
  }else{
    setError(sexo);
  }
  if(isFull(nivel_instruccion)){
    setDesError(nivel_instruccion);
  }else{
    setError(nivel_instruccion);
  }
  if(isFull(direccion)){
    setDesError(direccion);
  }else{
    setError(direccion);
  }
  if(isFull(email)){
    setDesError(email);
  }else{
    setError(email);
  }
  if(isFull(celular)){
    setDesError(celular);
  }else{
    setError(celular);
  }
  if(isFull(telefono)){
    setDesError(telefono);
  }else{
    setError(telefono);
  }
  if(isFull(descripcion)){
    setDesError(descripcion);
  }else{
    setError(descripcion);
  }
  if(isFull(empresa_nombre)){
    setDesError(empresa_nombre);
  }else{
    setError(empresa_nombre);
  }
  if(isFull(empresa_actividad)){
    setDesError(empresa_actividad);
  }else{
    setError(empresa_actividad);
  }
  if(isFull(empresa_direccion)){
    setDesError(empresa_direccion);
  }else{
    setError(empresa_direccion);
  }
  if(isFull(empresa_telefono)){
    setDesError(empresa_telefono);
  }else{
    setError(empresa_telefono);
  }
  if(
    isCedula(cedula) && 
    isFull(cedula) &&
    isFull(apellido) &&
    isFull(nombre) &&
    isFull(sexo) &&
    isFull(nivel_instruccion) &&
    isFull(direccion) &&
    isFull(email) &&
    isFull(celular) &&
    isFull(telefono) &&
    isFull(descripcion) &&
    isFull(empresa_nombre) &&
    isFull(empresa_actividad) &&
    isFull(empresa_direccion) &&
    isFull(empresa_telefono)
  ){
    return true;
  }else{
    return false;
  }
}