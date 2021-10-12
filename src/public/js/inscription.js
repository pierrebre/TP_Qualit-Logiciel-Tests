let btn = document.getElementById('btnsubmit');
let usernameBox = document.getElementById('usernameCheck');
let passwordVerifBox = document.getElementById('passwordVerifCheck');
let passwordBox = document.getElementById('passwordCheck');
let emailBox = document.getElementById('emailCheck');

btn.addEventListener('click', function (e) {
  console.log(checkUsername(document.getElementById("username").value))
  if (!checkUsername(document.getElementById("username").value)) {
    e.preventDefault();
    document.getElementById("username").focus();
  } else if (!checkEmail(document.getElementById("email").value)) {
    e.preventDefault();
    document.getElementById("email").focus();
  } else if (!checkPassword(document.getElementById("password").value)) {
    e.preventDefault();
    document.getElementById("password").focus();
  } else if (!matchPassword(document.getElementById("password_verif").value)) {
    e.preventDefault();
    document.getElementById("password_verif").focus();
  }
});

function checkUsername(value) {
  const regex = /^[a-zA-Z0-9]{6,}$/g;
  const match = value.match(regex);
  usernameBox.classList.add('alert');
  if (match) {
    usernameBox.classList.remove('alert-danger');
    usernameBox.classList.add('alert-success');
    usernameBox.innerHTML = 'Username valid';
    return true;
  } else {
    usernameBox.classList.remove('alert-success');
    usernameBox.classList.add('alert-danger');
    usernameBox.innerHTML = 'Username invalid';
    return false;
  }
}

function checkEmail(value) {
  const regex = /\S+@\S+\.\S+/g;
  const match = value.match(regex);
  emailBox.classList.add('alert');
  if (match) {
    emailBox.classList.remove('alert-danger');
    emailBox.classList.add('alert-success');
    emailBox.innerHTML = 'Email valid';
    return true;
  } else {
    emailBox.classList.remove('alert-success');
    emailBox.classList.add('alert-danger');
    emailBox.innerHTML = 'Email invalid';
    return false;
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
    return true;
  } else {
    passwordBox.classList.remove('alert-success');
    passwordBox.classList.add('alert-danger');
    passwordBox.innerHTML = 'Password invalid';
    return false;
  }
}

function matchPassword(value) {
  passwordVerifBox.classList.add('alert');
  let password = document.getElementById('password');
  if (value !== password.value) {
    passwordVerifBox.classList.remove('alert-success');
    passwordVerifBox.classList.add('alert-danger');
    passwordVerifBox.innerHTML = 'Password not match';
    return false;
  } else {
    const regex = /^(?=.*[$&+,:;=?@#|'<>.-^*()%!])(?=.*[A-Za-z]).{12,}$/g;
    const match = value.match(regex);
    if (match) {
      passwordVerifBox.classList.remove('alert-danger');
      passwordVerifBox.classList.add('alert-success');
      passwordVerifBox.innerHTML = 'Password match';
      return true;
    } else {
      passwordVerifBox.classList.remove('alert-success');
      passwordVerifBox.classList.add('alert-danger');
      passwordVerifBox.innerHTML = 'Password match but not valid';
      return false;
    }
  }
}


