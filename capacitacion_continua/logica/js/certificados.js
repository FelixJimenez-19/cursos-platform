function buscar_certificado(cedula) {
    if (isCedula(cedula)) {
        consultar_cargar_certificados(cedula.value);
    } else {
        $("#content_resultados").html("");
    }
}

function openPdf(path) {
    document.getElementById("contenedor_reporte").style = "display:flex;";
    document.getElementById("iframe_pdf").src = path;
}

function closePdf() {
    document.getElementById("contenedor_reporte").style = "display:none;";
    document.getElementById("iframe_pdf").src = "";
}
