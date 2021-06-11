entorno_aprendizaje_sinEdicion();
function entorno_aprendizaje_sinEdicion(){
  let form = document.getElementById("formulario_entorno_aprendizaje");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_entorno_aprendizaje_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_entorno_aprendizaje table tbody').html(resp);
    }
  });
}