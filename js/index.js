const usernameIcon = document.getElementById("userIcon");
const usernameInput = document.getElementById("uname");
const passwordIcon = document.getElementById("passwordIcon");
const passwordInput = document.getElementById("passwordInput");

usernameIcon.addEventListener("click", () => {
  usernameInput.focus();
});
passwordIcon.addEventListener("click", () => {
  passwordInput.focus();
});
