let matricula_id = "";
let matricula_estado = "";
function abrirModalEliminar(id, estado){
  matricula_id = id;
  matricula_estado = estado;
  document.querySelector(".contendor_eliminar").style.display = "flex";
  cargar_informacion(id, estado);
}
function cerrarModalEliminar(){
  document.querySelector(".contendor_eliminar").style.display = "none";
}
function accionar(){
  validar_form_informacion();
}

function validar_form_informacion(){
  let form_informacion = document.getElementById("form_informacion");
  let id_matricula = form_informacion.id_matricula;
  let estado = form_informacion.estado;
  let certificado_nombre_participante = form_informacion.certificado_nombre_participante;
  let certificado_cedula_participante = form_informacion.certificado_cedula_participante;
  let certificado_nombre_curso = form_informacion.certificado_nombre_curso;
  let certificado_nombre_institucion = form_informacion.certificado_nombre_institucion;
  let certificado_ciudad_institucion = form_informacion.certificado_ciudad_institucion;
  let certificado_rector_institucion = form_informacion.certificado_rector_institucion;
  let certificado_cordinador_institucion = form_informacion.certificado_cordinador_institucion;
  let certificado_fecha_curso = form_informacion.certificado_fecha_curso;
  let certificado_horas_curso = form_informacion.certificado_horas_curso;
  let certificado_lugar_fecha_emision = form_informacion.certificado_lugar_fecha_emision;
  let certificado_codigo = form_informacion.certificado_codigo;
  
  if(isFull(id_matricula)){
    setDesError(id_matricula);
  }else{
    setError(id_matricula);
  }
  if(isFull(estado)){
    setDesError(estado);
  }else{
    setError(estado);
  }
  if(isFull(certificado_nombre_participante)){
    setDesError(certificado_nombre_participante);
  }else{
    setError(certificado_nombre_participante);
  }
  if(isCedula(certificado_cedula_participante) && isFull(certificado_cedula_participante)){
    setDesError(certificado_cedula_participante);
  }else{
    setError(certificado_cedula_participante);
  }
  if(isFull(certificado_nombre_curso)){
    setDesError(certificado_nombre_curso);
  }else{
    setError(certificado_nombre_curso);
  }
  if(isFull(certificado_nombre_institucion)){
    setDesError(certificado_nombre_institucion);
  }else{
    setError(certificado_nombre_institucion);
  }
  if(isFull(certificado_ciudad_institucion)){
    setDesError(certificado_ciudad_institucion);
  }else{
    setError(certificado_ciudad_institucion);
  }
  if(isFull(certificado_rector_institucion)){
    setDesError(certificado_rector_institucion);
  }else{
    setError(certificado_rector_institucion);
  }
  if(isFull(certificado_cordinador_institucion)){
    setDesError(certificado_cordinador_institucion);
  }else{
    setError(certificado_cordinador_institucion);
  }
  if(isFull(certificado_fecha_curso)){
    setDesError(certificado_fecha_curso);
  }else{
    setError(certificado_fecha_curso);
  }
  if(isFull(certificado_horas_curso)){
    setDesError(certificado_horas_curso);
  }else{
    setError(certificado_horas_curso);
  }
  if(isFull(certificado_lugar_fecha_emision)){
    setDesError(certificado_lugar_fecha_emision);
  }else{
    setError(certificado_lugar_fecha_emision);
  }
  if(isFull(certificado_codigo)){
    setDesError(certificado_codigo);
  }else{
    setError(certificado_codigo);
  }

  if(
    isFull(form_informacion) &&
    isFull(id_matricula) &&
    isFull(estado) &&
    isFull(certificado_nombre_participante) &&
    isCedula(certificado_cedula_participante) &&
    isFull(certificado_cedula_participante) &&
    isFull(certificado_nombre_curso) &&
    isFull(certificado_nombre_institucion) &&
    isFull(certificado_ciudad_institucion) &&
    isFull(certificado_rector_institucion) &&
    isFull(certificado_cordinador_institucion) &&
    isFull(certificado_fecha_curso) &&
    isFull(certificado_horas_curso) &&
    isFull(certificado_lugar_fecha_emision) &&
    isFull(certificado_codigo)
  ){
    aprobar_reprobar();
  }
}