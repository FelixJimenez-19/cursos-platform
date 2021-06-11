evaluacion_final_sinEdicion();
function evaluacion_final_sinEdicion(){
  let form = document.getElementById("formulario_evaluacion_final");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_evaluacion_final_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_evaluacion_final table tbody').html(resp);
    }
  });
}