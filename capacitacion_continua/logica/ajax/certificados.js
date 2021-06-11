function consultar_cargar_certificados(cedula){
    $.ajax({
        dataType: "html",
        type:'POST',
        url: '../persistencia/scripts_ajax/consulta_certificados.php',
        data: {"cedula":cedula},
        success: function(data){
            $("#content_resultados").html (data);
        }
    });
}