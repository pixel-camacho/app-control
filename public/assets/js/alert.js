function alertHidden(id){
    setTimeout(()=>{
       let alert = document.querySelector(id);
         if(alert){
             alert.style.opacity = 0;
          }
     },2500);
    }
    
    alertHidden('.errors');
    alertHidden('.success');
    alertHidden('.validations');
