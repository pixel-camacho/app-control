function showOrHidden(catalogo, cerrar, idmodal){

    let modal = document.querySelector(idmodal);
    let close = document.getElementById(cerrar);
    const btn = document.getElementById(catalogo);

    btn.addEventListener('click', (e)=>{
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

showOrHidden('multi','cerrar','.modal')
showOrHidden('refaccion','cerrar1','.modal-multiple')

