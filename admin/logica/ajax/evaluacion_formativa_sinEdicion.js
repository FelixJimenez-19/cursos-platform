evaluacion_formativa_sinEdicion();
function evaluacion_formativa_sinEdicion(){
  let form = document.getElementById("formulario_evaluacion_formativa");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_evaluacion_formativa_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_evaluacion_formativa table tbody').html(resp);
    }
  });
}