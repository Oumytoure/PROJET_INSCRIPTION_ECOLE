var prenom = document.getElementById('prenom')
var nom = document.getElementById('nom')
var email = document.getElementById('email')
var roles = document.getElementById('roles')
var mot_passe = document.getElementById('mot_passe')
var confirmation = document.getElementById('confirmation')
var submit = document.getElementById('submit')




 prenom.addEventListener('keyup',function(e){
   var erreur = document.getElementById("erreur");
   
  
   if (prenom.value.trim() =='')  {
      
       erreur.innerHTML = 'enter votre prenom';
       erreur.style.color = 'red';
      return;
     }
     erreur.innerHTML = 'cooooooooool!';
     erreur.style.color = 'green'; 
 })
 nom.addEventListener('keyup',function(e){
    var erreur1 = document.getElementById("erreur1");
    
   
    if (nom.value.trim() =='')  {
       
        erreur1.innerHTML = 'entrer votre nom';
        erreur1.style.color = 'red';
       return;
      }
      erreur1.innerHTML = 'cooooooooool!';
      erreur1.style.color = 'green'; 
  })
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
  roles.addEventListener('keyup',function(e){
    var erreur3= document.getElementById("erreur3");
    
   
    if (roles.value.trim() =='')  {
       
        erreur3.innerHTML = 'selectionner un role';
        erreur3.style.color = 'red';
       return;
      }
      erreur3.innerHTML = 'cooooooooool!';
      erreur3.style.color = 'green'; 
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
  

 confirmation.addEventListener('keyup',function(e){
    var erreur5= document.getElementById("erreur5");
    
   
    if (confirmation.value.trim() =='')  {
       
        erreur5.innerHTML = 'confirmer votre mot_passe';
        erreur5.style.color = 'red';
       return;
      }
      if(confirmation.value.trim() !== mot_passe.value.trim()){
        erreur5.innerHTML = 'les deux mots de passes ne sont pas conforment';
        erreur5.style.color = 'red';
        return;
    } 
    erreur5.innerHTML = 'cooooooooool!';
        erreur5.style.color = 'green'; 
  })

  submit.addEventListener('submit',function(e){

        var erreur = document.getElementById("erreur");
        
       
        if (prenom.value.trim() =='')  {
           
            erreur.innerHTML = 'enter votre prenom';
            erreur.style.color = 'red';
           e.preventDefault();
          }
          else{ 
          erreur.innerHTML = 'cooooooooool!';
          erreur.style.color = 'green'; 
        }
    
         var erreur1 = document.getElementById("erreur1");
         
        
         if (nom.value.trim() =='')  {
            
             erreur1.innerHTML = 'entrer votre nom';
             erreur1.style.color = 'red';
             e.preventDefault();
           }
           else{
           erreur1.innerHTML = 'cooooooooool!';
           erreur1.style.color = 'green'; 
        }
       
         var erreur2 = document.getElementById("erreur2");
         
        
         if (email.value.trim() =='')  {
            
             erreur2.innerHTML = 'entrer votre email';
             erreur2.style.color = 'red';
             e.preventDefault();
           }
           else{
           erreur2.innerHTML = 'cooooooooool!';
           erreur2.style.color = 'green'; 
            }    
       
         var erreur3= document.getElementById("erreur3");
         
        
         if (roles.value.trim() =='')  {
            
             erreur3.innerHTML = 'selectionner un role';
             erreur3.style.color = 'red';
             e.preventDefault();
           }
           else{
           erreur3.innerHTML = 'cooooooooool!';
           erreur3.style.color = 'green'; 
            }
       
         var erreur4= document.getElementById("erreur4");
         
        
         if (mot_passe.value.trim() =='')  {
            
             erreur4.innerHTML = 'saisir votre mot_passe';
             erreur4.style.color = 'red';
             e.preventDefault();
           }
           else{
           erreur4.innerHTML = 'cooooooooool!';
           erreur4.style.color = 'green'; 
       }
       
     
      
         var erreur5= document.getElementById("erreur5");
         
        
         if (confirmation.value.trim() =='')  {
            
             erreur5.innerHTML = 'confirmer votre mot_passe';
             erreur5.style.color = 'red';
             e.preventDefault();
           }
          else if(confirmation.value.trim() !== mot_passe.value.trim()){
             erreur5.innerHTML = 'les deux mots de passes ne sont pas conforment';
             erreur5.style.color = 'red';
             e.preventDefault();
         } 
         else{
         erreur5.innerHTML = 'cooooooooool!';
             erreur5.style.color = 'green'; 
       } 
 
} )
/* setTimeout(function() {
  document.getElementById('submit').innerHTML = "";
},8000);  */
 