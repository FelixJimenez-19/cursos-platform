cargarFormularioContenidoPrimario();


function cargarFormularioContenidoPrimario(){
  let form = document.getElementById("formulario_contenido_primario");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_contenido_primario.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_contenido_primario table tbody').html(resp);
    }
  });
}



function guardaFormularioContenidoPrimario(){
  let form = document.getElementById("formulario_contenido_primario");
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
      url: "../persistencia/scripts_ajax/guarda_contenido_primario.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioContenidoPrimario();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

