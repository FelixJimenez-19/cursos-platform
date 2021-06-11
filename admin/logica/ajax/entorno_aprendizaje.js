cargarFormularioEntornoAprendizaje();


function cargarFormularioEntornoAprendizaje(){
  let form = document.getElementById("formulario_entorno_aprendizaje");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_entorno_aprendizaje.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_entorno_aprendizaje table tbody').html(resp);
    }
  });
}



function guardaFormularioEntornoAprendizaje(){
  let form = document.getElementById("formulario_entorno_aprendizaje");
  let instalaciones = form.instalaciones;
  let teorica = form.teorica;
  let practica = form.practica;
  if(isFull(instalaciones)){
    setDesError(instalaciones);
  }else{
    setError(instalaciones);
  }
  if(isFull(teorica)){
    setDesError(teorica);
  }else{
    setError(teorica);
  }
  if(isFull(practica)){
    setDesError(practica);
  }else{
    setError(practica);
  }
  
  if(isFull(instalaciones) && isFull(teorica) && isFull(teorica)){
    //AJAX / INICIO
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "../persistencia/scripts_ajax/guarda_entorno_aprendizaje.php",
      data: "instalaciones="+instalaciones.value+"&teorica="+teorica.value+"&practica="+practica.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioEntornoAprendizaje();
        instalaciones.value = "";
        teorica.value = "";
        practica.value = "";
      }
    });
    //AJAX / FIN
  }
}

