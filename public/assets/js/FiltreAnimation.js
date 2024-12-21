document.addEventListener('DOMContentLoaded', function() {

    let containerFiltre = document.querySelector('[data-js-container]'),
        button = containerFiltre.querySelector('svg');
        formFiltre = containerFiltre.querySelector('form'),
        formulaireOuvert = false;

    function ouvrir() {
        formFiltre.classList.replace('ferme', 'ouvert');
        button.classList.add('up');
        formulaireOuvert = true;
    }

    function fermer() {
        formFiltre.classList.replace('ouvert', 'ferme');
        button.classList.remove('up');
        formulaireOuvert = false;
    }

    button.addEventListener('click', function(){
        if (formulaireOuvert) {
            fermer();
        } else {
            ouvrir();
        }
    });
});