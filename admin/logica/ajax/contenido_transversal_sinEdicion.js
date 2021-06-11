contenido_transversal_sinEdicion();
function contenido_transversal_sinEdicion(){
  let form = document.getElementById("formulario_contenido_transversal");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_contenido_transversal_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_contenido_transversal table tbody').html(resp);
    }
  });
}