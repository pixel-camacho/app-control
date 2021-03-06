   async function fetchData(adress,id){
     try {
        let res  = await fetch(adress+id);
        let data = await res.text();
           return data;
     } catch (error) {
        console.error(error)         
     } 
}

function getIndex(select,id){

    let index = 0;

    if(select.length == 0)
    {
       index = 1;
    }

    for(let i = 0; i < select.length; i++)
    {
        if(select[i].value == id)
        {
            index = i;
        }
    }

   return index;
}

function loadData(data,catalogo,id){

    if(catalogo === 'multifuncional'){
        document.getElementById('marca').value = data.marca;
        document.getElementById('modelo').value = data.modelo;
        document.getElementById('cantidad').value = data.cantidad;
        document.getElementById('serie').value = data.serie;
        document.getElementById('identificador').value = id;
    }else if(catalogo === 'refaccion'){
        document.getElementById('identificador_refaccion').value = id;
        document.getElementById('pieza').value = data.pieza;
        document.getElementById('cantidad_refaccion').value = data.cantidad;
        let select = document.getElementById('multifuncional_refaccion_edit').options;
        select.item(getIndex(select,data.multifuncional_id)).selected = true;
    }else if(catalogo === 'tonner'){
        document.getElementById('identificador_tonner').value = id;
        document.getElementById('descripcion').value = data.descripcion;
        document.getElementById('cantidad_tonner').value = data.cantidad;
        let select = document.getElementById('multifuncional_tonner_edit').options;
        select.item(getIndex(select,data.multifuncional_id)).selected =  true;
    }
}

function showOrHiddenModal(modal){
    document.querySelector(modal).style.opacity = "1";
    document.querySelector(modal).style.visibility = "visible";
}

async  function editarCard(clase,catalogo,modal){

    let cards = document.querySelectorAll(clase);
    
    for(const value of cards){
     document.getElementById(value.id).addEventListener('click', async (e)=>{
      let res  = await  fetchData(`http://localhost:8080/${catalogo}/getElementById/`,e.target.id);
      let json = res.substring(0,res.indexOf('<'));
      let data = JSON.parse(json)

      loadData(data,catalogo,e.target.id)
      showOrHiddenModal(modal) 
     })
    }
}

editarCard('.editar','multifuncional','.modal_edit');
editarCard('.editar_refaccion','refaccion','.modal_edit_refaccion');
editarCard('.editar_tonner','tonner','.modal_edit_tonner');





