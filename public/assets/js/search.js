
document.getElementById('mysearch').addEventListener('keyup',(e)=> {

       let  cards = document.querySelectorAll('.card');
        
       if (e.target.value == '')
        {
           cards.forEach(item => item.style.display = 'block');
           return;
        }

        cards.forEach(item =>{

           let text  = item.textContent.trim().replace('\n','_')
           let textSearch = text.substring(0,text.indexOf('_'))

           filter(item,textSearch,e.target.value.toUpperCase())

        })
})

function filter(card,textSearch,value)
{
       if(textSearch.search(value) !== -1 )
       {
         card.style.display = 'block';
       }
       else
       {
         card.style.display = 'none'; 
       }
}