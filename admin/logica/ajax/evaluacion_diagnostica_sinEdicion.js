evaluacion_diagnostica_sinEdicion();
function evaluacion_diagnostica_sinEdicion(){
  let form = document.getElementById("formulario_evaluacion_diagnostica");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_evaluacion_diagnostica_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_evaluacion_diagnostica table tbody').html(resp);
    }
  });
}