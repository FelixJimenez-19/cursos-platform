establecer_menu();
window.onresize = function(){
  establecer_menu();
}
function establecer_menu(){
  if(window.innerWidth<=600){
    document.getElementById("check_menu").checked = true;
  }else{
    document.getElementById("check_menu").checked = false;
  }
}