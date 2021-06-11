objetivo_sinEdicion();
function objetivo_sinEdicion(){
  let form = document.getElementById("formulario_objetivo");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_objetivo_sinEdicion.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_objetivo table tbody').html(resp);
    }
  });
}