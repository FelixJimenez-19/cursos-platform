function isCedula(num){
  if(num.value.length == 10){
    let sum = 0;
    let cedula = num.value.split("");
    for(let i=0; i<cedula.length; i++){
      let temp = parseInt(cedula[i]);
      if(i%2 == 0){
        if(temp*2 > 9){
          sum += (temp*2)-9;
        }else{
          sum += temp*2;
        }
      }else{
        sum += temp;
      }
    }
    if(sum%10 == 0){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}
function isExcededLength(campo, limit){
  if(campo.value.length > limit){
    return true;
  }else{
    return false;
  }
}

function isFull(campo){
  if(campo.value != ""){
    return true;
  }else{
    return false;
  }
}
//function setError(campo){
//  campo.style.border = "solid 1px red";
//}
//function setDesError(campo){
//  campo.style.border = "solid 1px #ddd";
//}
function setErrorInscribir(campo){
  campo.style.borderBottom = "solid 2px #D32F2F";
}
function setDesErrorInscribir(campo){
  campo.style.borderBottom = "solid 2px #83879f";
}

function validarChecks(form){
  let radios = document.querySelectorAll(form.id + 'input[type="radio"]');
  for(let i = 0; i<radios.length; i++){
    console.log(radios[i].value);
    if(radios[i].value == ""){
      radios[i].parentElement.style.borderBottom = "solid 2px #D32F2F";
    }else{
      //radios[i].nextSibling.style.borderBottom = "solid 2px #83879f";
      radios[i].parentElement.style.borderBottom = "none";
    }
  }
}

// function mostrarOcultarContraseña(){
//   let pass = document.getElementById("campoPassword");
//   let img = document.getElementById("imgShowHide");
//   if(pass.type == "text"){
//     pass.type = "password";
//     img.src= "img/showPass.png"
//   }else{
//     pass.type = "text";
//     img.src= "img/hidePass.png"
//   }
// }