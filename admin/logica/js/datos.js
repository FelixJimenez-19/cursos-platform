function abrir_form_institucion(){
  document.getElementById("contenedor_institucion").style.display = "flex";
}
function cerrar_form_institucion(){
  document.getElementById("contenedor_institucion").style.display = "none";
}

function abrir_form_sellos(){
  document.getElementById("contenedor_sellos").style.display = "flex";
}
function cerrar_form_sellos(){
  document.getElementById("contenedor_sellos").style.display = "none";
}

function abrir_form_rector(){
  document.getElementById("contenedor_rector").style.display = "flex";
}
function cerrar_form_rector(){
  document.getElementById("contenedor_rector").style.display = "none";
}

function abrir_form_pagina(){
  document.getElementById("contenedor_pagina").style.display = "flex";
}
function cerrar_form_pagina(){
  document.getElementById("contenedor_pagina").style.display = "none";
}

function validar_form_institucion(form){
  let institucionNombre = form.institucionNombre;
  let institucionSiglas = form.institucionSiglas;
  let institucionCiudad = form.institucionCiudad;
  if(isFull(institucionNombre)){
    setDesError(institucionNombre);
  }else{
    setError(institucionNombre);
  }
  if(isFull(institucionSiglas)){
    setDesError(institucionSiglas);
  }else{
    setError(institucionSiglas);
  }
  if(isFull(institucionCiudad)){
    setDesError(institucionCiudad);
  }else{
    setError(institucionCiudad);
  }
  if(isFull(institucionNombre) && isFull(institucionSiglas) && isFull(institucionCiudad)){
    return true;
  }else{
    return false;
  }
}


function validar_form_rector(form){
  let institucionRectorNombre = form.institucionRectorNombre;
  let institucionRectorNivelNombre = form.institucionRectorNivelNombre;
  let institucionRectorNivelSiglas = form.institucionRectorNivelSiglas;
  if(isFull(institucionRectorNombre)){
    setDesError(institucionRectorNombre);
  }else{
    setError(institucionRectorNombre);
  }
  if(isFull(institucionRectorNivelNombre)){
    setDesError(institucionRectorNivelNombre);
  }else{
    setError(institucionRectorNivelNombre);
  }
  if(isFull(institucionRectorNivelSiglas)){
    setDesError(institucionRectorNivelSiglas);
  }else{
    setError(institucionRectorNivelSiglas);
  }
  if(isFull(institucionRectorNombre) && isFull(institucionRectorNivelNombre) && isFull(institucionRectorNivelSiglas)){
    return true;
  }else{
    return false;
  }
}

function validar_form_pagina(form){
  let paginaNombre = form.paginaNombre;
  let copyright = form.copyright;
  let ubicacion = form.ubicacion;
  if(isFull(paginaNombre)){
    setDesError(paginaNombre);
  }else{
    setError(paginaNombre);
  }
  if(isFull(copyright)){
    setDesError(copyright);
  }else{
    setError(copyright);
  }
  if(isFull(ubicacion)){
    setDesError(ubicacion);
  }else{
    setError(ubicacion);
  }
  if(isFull(paginaNombre) && isFull(copyright) && isFull(ubicacion)){
    return true;
  }else{
    return false;
  }
}














// establecer_menu();
// window.onresize = function(){
//   establecer_menu();
// }
// function establecer_menu(){
//   if(window.innerWidth<=600){
//     document.getElementById("check_menu").checked = true;
//   }else{
//     document.getElementById("check_menu").checked = false;
//   }
// }
