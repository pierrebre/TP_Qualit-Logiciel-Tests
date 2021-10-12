var btn = document.getElementById('btnsubmit');
btn.addEventListener('click', function (e) {
  if (document.getElementById("username").value == "") {
    e.preventDefault();
    alert("Username can't be empty!");
    document.getElementById("username").focus();
  }
  else if (document.getElementById("email").value == "") {
    e.preventDefault();
    alert("Email can't be empty!");
    document.getElementById("email").focus();
  }
  else if (document.getElementById("password").value == "") {
    e.preventDefault();
    alert("Password can't be empty!");
    document.getElementById("password").focus();
  }
  else if (document.getElementById("password_verif").value == "") {
    e.preventDefault();
    alert("Password verification can't be empty!");
    document.getElementById("password_verif").focus();
  }

});

let username = document.getElementById('username');
let usernameBox = document.getElementById('usernameCheck');
let passwordVerifBox = document.getElementById('passwordVerifCheck');
let passwordBox = document.getElementById('passwordCheck');
let emailBox = document.getElementById('emailCheck');

function checkUsername(value) {
  const regex = /^[a-zA-Z0-9]{6,}$/g;
  const match = value.match(regex);
  usernameBox.classList.add('alert');
  if (match) {
    usernameBox.classList.remove('alert-danger');
    usernameBox.classList.add('alert-success');
    usernameBox.innerHTML = 'Username valid';
  } else {
    usernameBox.classList.remove('alert-success');
    usernameBox.classList.add('alert-danger');
    usernameBox.innerHTML = 'Username invalid';
  }
}

function checkPassword(value) {
  const regex = /^(?=.*[$&+,:;=?@#|'<>.-^*()%!])(?=.*[A-Za-z]).{12,}$/g;
  const match = value.match(regex);
  passwordBox.classList.add('alert');
  if (match) {
    passwordBox.classList.remove('alert-danger');
    passwordBox.classList.add('alert-success');
    passwordBox.innerHTML = 'Password valid';
  } else {
    passwordBox.classList.remove('alert-success');
    passwordBox.classList.add('alert-danger');
    passwordBox.innerHTML = 'Password invalid';
  }
}

function matchPassword(passwordVerification) {
  passwordVerifBox.classList.add('alert');
  let password = document.getElementById('password');
  if (passwordVerification === password.value) {
    passwordVerifBox.classList.remove('alert-danger');
    passwordVerifBox.classList.add('alert-success');
    passwordVerifBox.innerHTML = 'Password match';
  } else {
    passwordVerifBox.classList.remove('alert-success');
    passwordVerifBox.classList.add('alert-danger');
    passwordVerifBox.innerHTML = 'Password not match';
  }
}


