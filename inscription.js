var btn = document.getElementById('btnsubmit');
btn.addEventListener('click', function(e) { 
  if (document.getElementById("user").value == "") {
      e.preventDefault();
      alert("Tapez votre nom.");
      document.getElementById("user").focus();
  }
  else if(document.getElementById("email").value == "") {
    e.preventDefault();
    alert("Tapez un email.");
    document.getElementById("email").focus();
}
  else if(document.getElementById("password").value == "") {
    e.preventDefault();
    alert("Tapez votre mot de passe.");
    document.getElementById("user").focus();
}
  else if(document.getElementById("password_verif").value == "") {
    e.preventDefault();
    alert("Tapez votre mot de passe.");
    document.getElementById("password_verif").focus();
}
  
});

