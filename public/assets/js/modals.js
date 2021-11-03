
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

showOrHidden('cerrar_edit','.modal_edit')
showOrHidden_add('multi','cerrar_add','.modal_add')

//showOrHidden('refaccion','cerrar1','.modal-multiple','formRefaciones')
//showOrHidden('tonner','cerrar2','.modal-multiple1','formTonner')

