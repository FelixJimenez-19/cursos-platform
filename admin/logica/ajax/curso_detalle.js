curso_detalle();
function curso_detalle(){
  let form = document.getElementById("formularioModeloCurso");
  let id = form.modelo_curso_id;
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_curso_by_id.php",
    data: "id="+id.value,
    success: function(resp){
      $('#formularioModeloCurso .contenido').html(resp);
    }
  });
}