function validar_modelo_curso(form){
  let nombre = form.nombre;
  let id_profesor = form.id_profesor;
  
  if(isFull(nombre)){
    setDesError(nombre);
  }else{
    setError(nombre);
  }
  if(isFull(id_profesor)){
    setDesError(id_profesor);
  }else{
    setError(id_profesor);
  }
  if(isFull(nombre) && isFull(id_profesor)){
    return true;
  }else{
    return false;
  }
}

function openPdf(id){
  document.getElementById("contenedor_reporte").style = "display:flex;";
  document.getElementById("iframe_pdf").src = 'reportes/reporte_modelo_curso_pdf.php?id='+id;
  document.getElementById("reporte_modelo_curso_excel").href = 'reportes/reporte_modelo_curso_excel.php?id='+id;
  
  
}
function closePdf(){
  document.getElementById("contenedor_reporte").style = "display:none;";
  document.getElementById("iframe_pdf").src = "";
  document.getElementById("reporte_modelo_curso_excel").href = "";
}