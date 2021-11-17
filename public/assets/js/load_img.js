document.getElementById('photo').addEventListener('change',(e) =>
{
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);

    reader.onload = function(){
        let imagen = document.getElementById('img');
        imagen.src = reader.result;
    }
})