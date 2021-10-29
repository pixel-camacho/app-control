
function showOrHidden(catalogo, cerrar, idmodal,idform){

    let modal   = document.querySelector(idmodal);
    let close   = document.getElementById(cerrar);
    const btn   = document.getElementById(catalogo);
    //submits
    let submitE = document.getElementById('submit');
    let submitR = document.getElementById('submitR');
    let submitT = document.getElementById('submitT');

        btn.addEventListener('click', (e)=>{
            e.preventDefault();

            if(modal.style.opacity !== '1'){
                if(catalogo == 'multi' || catalogo == 'refaccion' || catalogo == 'tonner'){
                    document.forms[idform].action = "dashboard/addItem";

                    document.getElementById('subtitle').innerHTML  = "Agregar Multifuncional";
                    document.getElementById('subtitle1').innerHTML = "Agregar Refaccion";
                    document.getElementById('subtitle2').innerHTML = "Agregar Tonner";

                    submitE.value = "Agregar";
                    submitR.value = "Agregar";
                    submitT.value = "Agregar";
                }
                modal.style.opacity = '1';
                modal.style.visibility = 'visible';
            }
        })

        close.addEventListener('click',(e) =>{
            e.preventDefault();
            if(modal.style.opacity !== '0'){
                modal.style.opacity = '0';
                modal.style.visibility = 'hidden';
                document.getElementById(idform).reset();
            }
        })
    
}

showOrHidden('multi','cerrar','.modal','formEquipo')
showOrHidden('refaccion','cerrar1','.modal-multiple','formRefaciones')
showOrHidden('tonner','cerrar2','.modal-multiple1','formTonner')

