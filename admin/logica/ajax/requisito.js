cargarFormularioRequisito();


function cargarFormularioRequisito(){
  let form = document.getElementById("formulario_requisito");
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_requisito.php",
    data: "id="+id_modelo_curso,
    success: function(resp){
      $('#formulario_requisito table tbody').html(resp);
    }
  });
}



function guardaFormularioRequisito(){
  let form = document.getElementById("formulario_requisito");
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
      url: "../persistencia/scripts_ajax/guarda_requisito.php",
      data: "descripcion="+descripcion.value+"&id="+id_modelo_curso,
      success: function(resp){
        cargarFormularioRequisito();
        descripcion.value = "";
      }
    });
    //AJAX / FIN
  }
}

