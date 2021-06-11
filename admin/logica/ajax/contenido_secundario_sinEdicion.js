contenido_secundario_sinEdicion();
function contenido_secundario_sinEdicion(){
  let form = document.getElementById("formulario_contenido_secundario");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_contenido_secundario_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_contenido_secundario table tbody').html(resp);
    }
  });
}