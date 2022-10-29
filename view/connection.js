var email = document.getElementById('email')
var mot_passe = document.getElementById('mot_passe')

email.addEventListener('keyup',function(e){
    var erreur2 = document.getElementById("erreur2");
    
   
    if (email.value.trim() =='')  {
       
        erreur2.innerHTML = 'entrer votre email';
        erreur2.style.color = 'red';
       return;
      }
      erreur2.innerHTML = 'cooooooooool!';
      erreur2.style.color = 'green'; 
  })
  mot_passe.addEventListener('keyup',function(e){
    var erreur4= document.getElementById("erreur4");
    
   
    if (mot_passe.value.trim() =='')  {
       
        erreur4.innerHTML = 'saisir votre mot_passe';
        erreur4.style.color = 'red';
       return;
      }
      erreur4.innerHTML = 'cooooooooool!';
      erreur4.style.color = 'green'; 
  })