function Validation(){


  let nom = document.getElementById('nom').value;
  let prenom = document.getElementById('prenom').value;
  let mail = document.getElementById('mail').value;
  let password = document.getElementById('password').value;
  let password2 = document.getElementById('password2').value;
  let message = document.getElementById('message');

  if (nom.length === 0 || prenom.length === 0 || mail.length === 0 || password.length === 0 || password2.length === 0 ) {
    message.textContent = "Tous les champs doivent être remplis.";
    message.classList.remove('succes');
    message.classList.add('echec');
    return false;
  } else {
    return true;
  }
}
function ValidationConnexion(){
  let mail = document.getElementById('mail').value;
  let password = document.getElementById('password').value;
  let message = document.getElementById('message');

  if (mail.length === 0 || password.length === 0) {
    message.textContent = "Tous les champs doivent être remplis.";
    message.classList.remove('succes');
    message.classList.add('echec');
    return false;
  } else {
    return true;
  }
}
