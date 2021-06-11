function validar_carga_horaria(form){
  let hora_teorica = form.hora_teorica;
  let hora_practica = form.hora_practica;
  
  if(isFull(hora_teorica)){
    setDesError(hora_teorica);
  }else{
    setError(hora_teorica);
  }
  
  if(isFull(hora_practica)){
    setDesError(hora_practica);
  }else{
    setError(hora_practica);
  }
  
  if(isFull(hora_teorica) && isFull(hora_practica)){
    return true;
  }else{
    return false;
  }
}