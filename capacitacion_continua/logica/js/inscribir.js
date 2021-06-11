function validar_inscribir(form){
  let id = form.id;
  let id_curso = form.id_curso;
  let cedula = form.cedula;
  let apellido = form.apellido;
  let nombre = form.nombre;
  let sexo = form.sexo;
  let instruccion = form.instruccion;
  let direccion = form.direccion;
  let email = form.email;
  let celular = form.celular;
  let telefono = form.telefono;
  let descripcion = form.descripcion;
  let empresa_nombre = form.empresa_nombre;
  let empresa_actividad = form.empresa_actividad;
  let empresa_direccion = form.empresa_direccion;
  let empresa_telefono = form.empresa_telefono;
  let terminos = form.terminos;
  if(isCedula(cedula) && isFull(cedula)){
    setDesErrorInscribir(cedula);
  }else{
    setErrorInscribir(cedula);
  }
  if(isFull(apellido)){
    setDesErrorInscribir(apellido);
  }else{
    setErrorInscribir(apellido);
  }
  if(isFull(nombre)){
    setDesErrorInscribir(nombre);
  }else{
    setErrorInscribir(nombre);
  }
  if(isFull(direccion)){
    setDesErrorInscribir(direccion);
  }else{
    setErrorInscribir(direccion);
  }
  if(isFull(email)){
    setDesErrorInscribir(email);
  }else{
    setErrorInscribir(email);
  }
  if(isFull(celular)){
    setDesErrorInscribir(celular);
  }else{
    setErrorInscribir(celular);
  }
  if(isFull(telefono)){
    setDesErrorInscribir(telefono);
  }else{
    setErrorInscribir(telefono);
  }
  if(isFull(descripcion)){
    setDesErrorInscribir(descripcion);
  }else{
    setErrorInscribir(descripcion);
  }
  if(isFull(empresa_nombre)){
    setDesErrorInscribir(empresa_nombre);
  }else{
    setErrorInscribir(empresa_nombre);
  }
  if(isFull(empresa_actividad)){
    setDesErrorInscribir(empresa_actividad);
  }else{
    setErrorInscribir(empresa_actividad);
  }
  if(isFull(empresa_direccion)){
    setDesErrorInscribir(empresa_direccion);
  }else{
    setErrorInscribir(empresa_direccion);
  }
  if(isFull(empresa_telefono)){
    setDesErrorInscribir(empresa_telefono);
  }else{
    setErrorInscribir(empresa_telefono);
  }
  
  
  if(isFull(sexo)){
    document.getElementById("sexoMasculino").nextElementSibling.style.color = "#303F9F";
    document.getElementById("sexoFemenino").nextElementSibling.style.color = "#303F9F";
  }else{
    document.getElementById("sexoMasculino").nextElementSibling.style.color = "#D32F2F";
    document.getElementById("sexoFemenino").nextElementSibling.style.color = "#D32F2F";
  }
  
  if(isFull(instruccion)){
    document.getElementById("instruccionPrimario").nextElementSibling.style.color = "#303F9F";
    document.getElementById("instruccionSecundario").nextElementSibling.style.color = "#303F9F";
    document.getElementById("instruccionSupeior").nextElementSibling.style.color = "#303F9F";
  }else{
    document.getElementById("instruccionPrimario").nextElementSibling.style.color = "#D32F2F";
    document.getElementById("instruccionSecundario").nextElementSibling.style.color = "#D32F2F";
    document.getElementById("instruccionSupeior").nextElementSibling.style.color = "#D32F2F";
  }
  if(terminos.checked){
    document.getElementById("terminos").nextElementSibling.style.color = "#303F9F";
  }else{
    document.getElementById("terminos").nextElementSibling.style.color = "#D32F2F";
  }


  if(
    isCedula(cedula)          &&  isFull(cedula)            && 
    isFull(apellido)          &&  isFull(nombre)            && 
    isFull(sexo)              &&  isFull(instruccion)       &&
    isFull(direccion)         &&  isFull(email)             &&
    isFull(celular)           &&  isFull(telefono)          &&
    isFull(descripcion)       &&  isFull(empresa_nombre)    &&
    isFull(empresa_actividad) &&  isFull(empresa_direccion) &&
    isFull(empresa_telefono)  &&  terminos.checked
  ){
    //Acciones de formulario..
    let datos = {
      "id_participante": id.value,
      "id_curso": id_curso.value,
      "estado": "Inscrito",
      "cedula": cedula.value,
      "apellido": apellido.value,
      "nombre": nombre.value,
      "sexo": sexo.value,
      "instruccion": instruccion.value,
      "direccion": direccion.value,
      "email": email.value,
      "celular": celular.value,
      "telefono": telefono.value,
      "descripcion": descripcion.value,
      "empresa_nombre": empresa_nombre.value,
      "empresa_actividad": empresa_actividad.value,
      "empresa_direccion": empresa_direccion.value,
      "empresa_telefono": empresa_telefono.value
    };
    _datos = datos;
    procesoMatricula(datos);
  }
    
  return false;
}
function guardarParticipanteSinValidar(){
  let form = document.getElementById("formularioInscribir");
  let id = form.id;
  let id_curso = form.id_curso;
  let cedula = form.cedula;
  let apellido = form.apellido;
  let nombre = form.nombre;
  let sexo = form.sexo;
  let instruccion = form.instruccion;
  let direccion = form.direccion;
  let email = form.email;
  let celular = form.celular;
  let telefono = form.telefono;
  let descripcion = form.descripcion;
  let empresa_nombre = form.empresa_nombre;
  let empresa_actividad = form.empresa_actividad;
  let empresa_direccion = form.empresa_direccion;
  let empresa_telefono = form.empresa_telefono;
  let terminos = form.terminos;
  let datos = {
    "id_participante": id.value,
    "id_curso": id_curso.value,
    "estado": "Inscrito",
    "cedula": cedula.value,
    "apellido": apellido.value,
    "nombre": nombre.value,
    "sexo": sexo.value,
    "instruccion": instruccion.value,
    "direccion": direccion.value,
    "email": email.value,
    "celular": celular.value,
    "telefono": telefono.value,
    "descripcion": descripcion.value,
    "empresa_nombre": empresa_nombre.value,
    "empresa_actividad": empresa_actividad.value,
    "empresa_direccion": empresa_direccion.value,
    "empresa_telefono": empresa_telefono.value
  };
  sendEmail(_datos);
  closeConfirm();
  guardaParticipante(datos);
  vaciar_Campos();
  document.getElementById("formularioInscribir").cedula.value = "";
  document.getElementById("formularioInscribir").cedula.focus();
}





function openProgressBar(mensaje){
  document.querySelector(".content_modal_progress").style.display = "flex";
  document.querySelector(".content_modal_progress .modal_progress span").innerHTML = mensaje;
}
function closeProgressBar(){
  document.querySelector(".content_modal_progress").style.display = "none";
  document.querySelector(".content_modal_progress .modal_progress span").innerHTML = "";
}

function openConfirm(mensaje){
  document.querySelector(".content_modal_confirm").style.display = "flex";
  document.querySelector(".content_modal_confirm .modal_confirm span").innerHTML = mensaje;
}
function closeConfirm(){
  document.querySelector(".content_modal_confirm").style.display = "none";
  document.querySelector(".content_modal_confirm .modal_confirm span").innerHTML = "";
}

function openModalMatriculado(){
  document.querySelector("#content_modal_matriculado").style.display = "flex";
}
function closeModalMatriculado(){
  document.querySelector("#content_modal_matriculado").style.display = "none";
}