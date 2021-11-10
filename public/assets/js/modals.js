
function showOrHidden(cerrar, idmodal){

    let modal   = document.querySelector(idmodal);
    let close   = document.getElementById(cerrar);
  
        close.addEventListener('click',(e) =>{
            e.preventDefault();

            if(modal.style.opacity !== '0'){
                modal.style.opacity = '0';
                modal.style.visibility = 'hidden';
            }
        }) 
}

function showOrHidden_add(btn, btnclose, idmodal){
   
    let modal   = document.querySelector(idmodal);
    let close   = document.getElementById(btnclose);
    let boton   = document.getElementById(btn);    

    boton.addEventListener('click', (e)=>{
        e.preventDefault();

        if(modal.style.opacity !== '1'){
            modal.style.opacity = '1';
            modal.style.visibility = 'visible';
        }
    })

    
    close.addEventListener('click',(e) =>{
        e.preventDefault();

        if(modal.style.opacity !== '0'){
            modal.style.opacity = '0';
            modal.style.visibility = 'hidden';
        }
    }) 

}

//MULTIFUNCIONAL
showOrHidden('cerrar_edit','.modal_edit')
showOrHidden_add('multi','cerrar_add','.modal_add')

//REFACCION
showOrHidden('cerrar_edit_refaccion','.modal_edit_refaccion')
showOrHidden_add('refaccion','cerrar_add_refaccion','.modal_add_refaccion')

//TONNER
showOrHidden('cerrar_edit_tonner','.modal_edit_tonner')
showOrHidden_add('tonner','cerrar_add_tonner','.modal_add_tonner')

