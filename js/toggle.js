// JavaScript Toggle
       
    let bouton = document.getElementById('cacheForm');
    let bouton2 = document.getElementById('cacheTable');
            
    let form = document.querySelector('.cache');
    //console.log(form);

    function cliqueBouton() {
    form.classList.toggle('cache');
    }

    function cliqueBouton2() {
        form.classList.toggle('cache2');
        }

    bouton.addEventListener('click', cliqueBouton);
    bouton.addEventListener('click', cliqueBouton2);

        
// Fin Javascript Toggle