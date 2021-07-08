const view = document.getElementById('view');

view.addEventListener('click',(e)=>{
   const input = document.getElementById('password');
   const icono = document.getElementById('view');
    
     if(input.type === 'password'){
        icono.className = 'fa fa-eye show';
        input.type = 'text';
     }else{
        icono.className = 'fa fa-eye-slash show';
         input.type = 'password';
     }
})

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
