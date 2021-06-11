function validar_curso(form){
  let nombre = form.nombre;
  let fecha_inicio = form.fecha_inicio;
  let fecha_fin = form.fecha_fin;
  let numero_cupos = form.numero_cupos;
  let link_whatsapp = form.link_whatsapp;
  let id_modelo_curso = form.id_modelo_curso;
  
  if(isFull(nombre)){
    setDesError(nombre);
  }else{
    setError(nombre);
  }
  if(isFull(fecha_inicio)){
    setDesError(fecha_inicio);
  }else{
    setError(fecha_inicio);
  }
  if(isFull(fecha_fin)){
    setDesError(fecha_fin);
  }else{
    setError(fecha_fin);
  }
  if(isFull(numero_cupos)){
    setDesError(numero_cupos);
  }else{
    setError(numero_cupos);
  }
  if(isFull(link_whatsapp)){
    setDesError(link_whatsapp);
  }else{
    setError(link_whatsapp);
  }
  if(isFull(id_modelo_curso)){
    setDesError(id_modelo_curso);
  }else{
    setError(id_modelo_curso);
  }
  if(isFull(nombre) && isFull(fecha_inicio)  && isFull(fecha_fin) && isFull(numero_cupos) && isFull(link_whatsapp) && isFull(id_modelo_curso)){
    return true;
  }else{
    return false;
  }
}

function openPdf(id){
  document.getElementById("contenedor_reporte").style = "display:flex;";
  document.getElementById("iframe_pdf").src = 'reportes/reporte_curso_pdf.php?id='+id;
  document.getElementById("reporte_modelo_curso_excel").href = 'reportes/reporte_curso_excel.php?id='+id;
  
  
}
function closePdf(){
  document.getElementById("contenedor_reporte").style = "display:none;";
  document.getElementById("iframe_pdf").src = "";
  document.getElementById("reporte_modelo_curso_excel").href = "";
}