window.onscroll = function(){
  let scroll = window.scrollY;
  let menu = "header .menu";
  if(scroll > 0){
    estiloElemento(menu, "top:0;background:(255,255,255,0.5);");
  }
  if(scroll > 560){
    estiloElemento(menu, "top:0px;background:#333333;");
  }
  if(scroll == 0){
    estiloElemento(menu, "top:21px;");
  }
}
function estiloElemento(selector, estilo){
  let elemento = document.querySelectorAll(selector);
  if(elemento.length != undefined){
    for(let i=0; i<elemento.length; i++){
      elemento[i].style = ""+estilo;
    }
  }else{
    elemento.style = ""+estilo;
  }
}