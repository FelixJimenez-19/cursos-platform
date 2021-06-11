function openPdf(id){
  document.getElementById("contenedor_reporte").style = "display:flex;";
  document.getElementById("iframe_pdf").src = '../../admin/presentacion/reportes/reporte_curso_pdf.php?id='+id;
  document.getElementById("reporte_modelo_curso_excel").href = '../../admin/presentacion/reportes/reporte_curso_excel.php?id='+id;
}

function closePdf(){
  document.getElementById("contenedor_reporte").style = "display:none;";
  document.getElementById("iframe_pdf").src = "";
  document.getElementById("reporte_modelo_curso_excel").href = "";
}

function openPdf(id){
  document.getElementById("contenedor_reporte").style = "display:flex;";
  document.getElementById("iframe_pdf").src = '../../admin/presentacion/reportes/reporte_curso_pdf.php?id='+id;
  document.getElementById("reporte_modelo_curso_excel").href = '../../admin/presentacion/reportes/reporte_curso_excel.php?id='+id;
}



function openInscribir(element){
  document.getElementById("contenedor_inscribir").style = "display:flex;";
  document.getElementById("iframe_inscribir").src = 'paginas/inscribir.php?id='+element.name;
}

function closeInscribir(){
  document.getElementById("contenedor_inscribir").style = "display:none;";
  document.getElementById("iframe_inscribir").src = "";
}