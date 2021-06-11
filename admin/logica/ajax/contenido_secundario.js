cargarFormularioContenidoSecundario();


function cargarFormularioContenidoSecundario(){
  let form = document.getElementById("formulario_contenido_secundario");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_contenido_secundario.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_contenido_secundario table tbody').html(resp);
    }
  });
}



function guardaFormularioContenidoSecundario(){
  let form = document.getElementById("formulario_contenido_secundario");
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
      url: "../persistencia/scripts_ajax/guarda_contenido_secundario.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioContenidoSecundario();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

