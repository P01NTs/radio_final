var showPsw = document.querySelector(".showpsw");
var pswInput = document.querySelector("#passwordInput");

showPsw.addEventListener("click", () => {
  if (pswInput.type == "password") {
    pswInput.type = "text";
    showPsw.src = "./assets/icon/eye-slash-regular.svg"
  }else{
    pswInput.type = "password";
    showPsw.src = "./assets/icon/eye-regular.svg"
  }
});
