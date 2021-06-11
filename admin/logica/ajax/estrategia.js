cargarFormularioEstrategia();


function cargarFormularioEstrategia(){
  let form = document.getElementById("formulario_estrategia");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_estrategia.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_estrategia table tbody').html(resp);
    }
  });
}



function guardaFormularioEstrategia(){
  let form = document.getElementById("formulario_estrategia");
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
      url: "../persistencia/scripts_ajax/guarda_estrategia.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioEstrategia();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

