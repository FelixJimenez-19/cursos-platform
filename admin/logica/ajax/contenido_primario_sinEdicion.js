window.onload = function(){
  let form = document.getElementById("formulario_contenido_primario");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_contenido_primario_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_contenido_primario table tbody').html(resp);
    }
  });
}