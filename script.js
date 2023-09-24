// setCustomValidity

const pass = document.querySelector("#password");

const conPass = document.querySelector("#conPassword");


function passwordCheck() {
  if (pass.value != conPass.value) {
    conPass.setCustomValidity("enter correct password");
  } else {
    conPass.setCustomValidity("");
  }

  console.log(pass.value,conPass.value)
}



pass.onchange= passwordCheck;
conPass.onkeyup  = passwordCheck;

