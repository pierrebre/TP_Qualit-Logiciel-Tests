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

