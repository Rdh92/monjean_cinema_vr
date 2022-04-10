// JavaScript Toggle
       
    let bouton = document.getElementById('cacheForm');
            
    let form = document.querySelector('.cache');
    //console.log(form);

    function cliqueBouton() {
    form.classList.toggle('cache');
    }

    bouton.addEventListener('click', cliqueBouton);

        
// Fin Javascript Toggle