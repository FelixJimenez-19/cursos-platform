cargarFormularioEvaluacionFormativa();


function cargarFormularioEvaluacionFormativa(){
  let form = document.getElementById("formulario_evaluacion_formativa");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_evaluacion_formativa.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_evaluacion_formativa table tbody').html(resp);
    }
  });
}



function guardaFormularioEvaluacionFormativa(){
  let form = document.getElementById("formulario_evaluacion_formativa");
  let tecnica = form.tecnica;
  let instrumento = form.instrumento;
  let descripcion = form.descripcion;
  if(isFull(tecnica)){
    setDesError(tecnica);
  }else{
    setError(tecnica);
  }
  if(isFull(instrumento)){
    setDesError(instrumento);
  }else{
    setError(instrumento);
  }
  if(isFull(descripcion)){
    setDesError(descripcion);
  }else{
    setError(descripcion);
  }
  
  if(isFull(tecnica) && isFull(instrumento) && isFull(descripcion)){
    //AJAX / INICIO
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "../persistencia/scripts_ajax/guarda_evaluacion_formativa.php",
      data: "tecnica="+tecnica.value+"&instrumento="+instrumento.value+"&descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioEvaluacionFormativa();
        tecnica.value = "";
        instrumento.value = "";
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

