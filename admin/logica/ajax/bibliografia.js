cargarFormularioBibliografia();


function cargarFormularioBibliografia(){
  let form = document.getElementById("formulario_bibliografia");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_bibliografia.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_bibliografia table tbody').html(resp);
    }
  });
}



function guardaFormularioBibliografia(){
  let form = document.getElementById("formulario_bibliografia");
  let descripcion = form.descripcion;
  if(isFull(descripcion)){
    setDesError(descripcion);
  }else{
    setError(descripcion);
  }
  
  if(isFull(descripcion)){
    //AJAX / INICIO
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "../persistencia/scripts_ajax/guarda_bibliografia.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioBibliografia();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

