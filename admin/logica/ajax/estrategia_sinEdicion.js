estrategia_sinEdicion();
function estrategia_sinEdicion(){
  let form = document.getElementById("formulario_estrategia");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_estrategia_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_estrategia table tbody').html(resp);
    }
  });
}