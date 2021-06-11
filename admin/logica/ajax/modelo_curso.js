cargarFormularioModeloCurso();


function cargarFormularioModeloCurso(){
  let form = document.getElementById("formularioModeloCurso");
  let id = form.modelo_curso_id;
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "../persistencia/scripts_ajax/consulta_modelo_curso_by_id.php",
    data: "id="+id.value,
    success: function(resp){
      $('#formularioModeloCurso .contenido').html(resp);
    }
  });
}



function editaFormularioModeloCurso(){
  let form = document.getElementById("formularioModeloCurso");
  let modelo_curso_id = form.modelo_curso_id;
  let modelo_curso_nombre = form.modelo_curso_nombre;
  let profesor_id = form.profesor_id;
  let modelo_curso_hora_teorica = form.modelo_curso_hora_teorica;
  let modelo_curso_hora_practica = form.modelo_curso_hora_practica;
  let area_id = form.area_id;
  let alineacion_id = form.alineacion_id;
  let tipo_participante_id = form.tipo_participante_id;
  let modalidad_id = form.modalidad_id;
  let duracion_id = form.duracion_id;
  
  if(isFull(modelo_curso_nombre)){
    setDesError(modelo_curso_nombre);
  }else{
    setError(modelo_curso_nombre);
  }
  if(isFull(profesor_id)){
    setDesError(profesor_id);
  }else{
    setError(profesor_id);
  }
  if(isFull(modelo_curso_hora_teorica)){
    setDesError(modelo_curso_hora_teorica);
  }else{
    setError(modelo_curso_hora_teorica);
  }
  if(isFull(modelo_curso_hora_practica)){
    setDesError(modelo_curso_hora_practica);
  }else{
    setError(modelo_curso_hora_practica);
  }
  if(isFull(area_id)){
    setDesError(area_id);
  }else{
    setError(area_id);
  }
  if(isFull(alineacion_id)){
    setDesError(alineacion_id);
  }else{
    setError(alineacion_id);
  }
  if(isFull(tipo_participante_id)){
    setDesError(tipo_participante_id);
  }else{
    setError(tipo_participante_id);
  }
  if(isFull(modalidad_id)){
    setDesError(modalidad_id);
  }else{
    setError(modalidad_id);
  }
  if(isFull(duracion_id)){
    setDesError(duracion_id);
  }else{
    setError(duracion_id);
  }
  
  if(isFull(modelo_curso_nombre) && isFull(profesor_id) && isFull(modelo_curso_hora_teorica) && isFull(modelo_curso_hora_practica) && isFull(area_id) && isFull(alineacion_id) && isFull(tipo_participante_id) && isFull(modalidad_id) && isFull(duracion_id)){
    //AJAX / INICIO
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "../persistencia/scripts_ajax/edita_modelo_curso.php",
      data: "modelo_curso_nombre="+modelo_curso_nombre.value+"&profesor_id="+profesor_id.value+"&modelo_curso_hora_teorica="+modelo_curso_hora_teorica.value+"&modelo_curso_hora_practica="+modelo_curso_hora_practica.value+"&area_id="+area_id.value+"&alineacion_id="+alineacion_id.value+"&tipo_participante_id="+tipo_participante_id.value+"&modalidad_id="+modalidad_id.value+"&duracion_id="+duracion_id.value+"&modelo_curso_id="+modelo_curso_id.value,
      success: function(resp){
        cargarFormularioModeloCurso();
        abrirModalAceptar("admin.php?pagina=4.1&id="+modelo_curso_id.value);
      },
    }).fail(function(){
      alert("ERROR AL GUARDAR LOS CAMBIOS");
    });
    //AJAX / FIN
  }
}

