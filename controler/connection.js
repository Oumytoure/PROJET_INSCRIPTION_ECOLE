var email = document.getElementById('email')
var mot_passe = document.getElementById('mot_passe')
var submit = document.getElementById('submit')


form.addEventListener('submit',function(e){
    // conrtole mot de passe
    var erreur4= document.getElementById("erreur4");
    var erreur2= document.getElementById("erreur2");

 
  if (form.email.value ==''  )  {
     
      erreur2.innerHTML = 'entrer votre email';
     
      erreur2.style.color = 'red';
      erreur4.innerHTML = 'saisir votre mot_passe';
      erreur4.style.color = 'red';
    
      e.preventDefault();
    }
     else if (form.mot_passe.value =='' ) {
        erreur4.innerHTML = 'saisir votre mot_passe';
        erreur4.style.color = 'red';
        e.preventDefault();
     }
     else{
         erreur2.innerHTML = '';
         erreur2.style.color = 'green';  
         erreur4.innerHTML = '';
         erreur4.style.color = 'green'; 
         submit();
        
     } 


})



  email.addEventListener('keyup',function(){
    validemail(this)})





    /* var erreur4= document.getElementById("erreur4"); */
    const validemail=function(inputemail){
        var erreur2= document.getElementById("erreur2");

 
    
   
  
       
     
        let emailRegExp = new RegExp (
            '^[a-zA-Z0-9]+[a-zA-Z0-9.-]+[@]{1}[a-zA-Z0-9.-]+[.]{1}[a-z]{2,10}$', 'g'
        );
        let testEmail = emailRegExp.test(inputemail.value);
        console.log(testEmail);
       
    
    
        if(testEmail){
            erreur2.innerHTML = '';
     
            erreur2.style.color = 'green';
            submit();
    }
    else {
        erreur2.innerHTML = 'mail incorrect';
        erreur2.style.color = 'red';  
       e.preventDefault();
    
    }
    }
   

   

   

  
   


