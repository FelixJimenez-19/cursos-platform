function openCertificar(id){
  document.getElementById("contenedor_reporte").style = "display:flex;";
  document.getElementById("iframe_pdf").src = 'paginas/aprobar_reprobar_participantes.php?id_curso='+id;
  
  
}
function closePdf(){
  document.getElementById("contenedor_reporte").style = "display:none;";
  document.getElementById("iframe_pdf").src = "";
}