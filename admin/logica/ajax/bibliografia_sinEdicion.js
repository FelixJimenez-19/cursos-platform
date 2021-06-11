bibliografia_sinEdicion();
function bibliografia_sinEdicion(){
  let form = document.getElementById("formulario_bibliografia");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_bibliografia_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_bibliografia table tbody').html(resp);
    }
  });
}