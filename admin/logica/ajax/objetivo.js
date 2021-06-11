cargarFormularioObjetivo();


function cargarFormularioObjetivo(){
  let form = document.getElementById("formulario_objetivo");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_objetivo.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_objetivo table tbody').html(resp);
    }
  });
}



function guardaFormularioObjetivo(){
  let form = document.getElementById("formulario_objetivo");
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
      url: "../persistencia/scripts_ajax/guarda_objetivo.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioObjetivo();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

