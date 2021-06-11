requisito_sinEdicion();
function requisito_sinEdicion(){
  let form = document.getElementById("formulario_requisito");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_requisito_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_requisito table tbody').html(resp);
    }
  });
}