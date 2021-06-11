function validar_certificado(form){
  let codigo = form.codigo;
  let id_tipo_certificado = form.id_tipo_certificado;
  let id_participante = form.id_participante;
  
  if(isFull(codigo)){
    setDesError(codigo);
  }else{
    setError(codigo);
  }
  if(isFull(id_tipo_certificado)){
    setDesError(id_tipo_certificado);
  }else{
    setError(id_tipo_certificado);
  }
  if(isFull(id_participante)){
    setDesError(id_participante);
  }else{
    setError(id_participante);
  }
  if(isFull(codigo) && isFull(id_tipo_certificado) && isFull(id_participante)){
    return true;
  }else{
    return false;
  }
}