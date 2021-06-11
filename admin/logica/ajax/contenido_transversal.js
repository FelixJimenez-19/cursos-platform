cargarFormularioContenidoTransversal();


function cargarFormularioContenidoTransversal(){
  let form = document.getElementById("formulario_contenido_transversal");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_contenido_transversal.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_contenido_transversal table tbody').html(resp);
    }
  });
}



function guardaFormularioContenidoTransversal(){
  let form = document.getElementById("formulario_contenido_transversal");
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
      url: "../persistencia/scripts_ajax/guarda_contenido_transversal.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioContenidoTransversal();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

