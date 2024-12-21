document.addEventListener('DOMContentLoaded', function() {
    let selectElement = document.querySelector('[data-js-marques]'),
        selectModele = document.querySelector('[data-js-modeles]');

    // Ajouter une option par défaut pour le modèle lors de l'initialisation
    let defaultOption = document.createElement('option');
    defaultOption.text = 'Sélectionnez un modèle';
    defaultOption.disabled = true;
    defaultOption.selected = true;
    selectModele.appendChild(defaultOption);

    selectElement.addEventListener('change', function(){
        let selectOption = selectElement.options[selectElement.selectedIndex];       
        let optionSelectedId = selectOption.value;

        // Supprimer les options existantes sauf l'option par défaut
        selectModele.innerHTML = '';
        selectModele.appendChild(defaultOption);

        /* requête AJAX pour récupérer les modèles correspondant à la marque sélectionnée */
        fetch(`/modeles/${optionSelectedId}`)
          .then(response => response.json())
          .then(data => {
            data.forEach(modele => {
                let modeleOption = document.createElement('option');
                modeleOption.value = modele.id;
                modeleOption.textContent = modele.nom;
                selectModele.appendChild(modeleOption);
            });
        });
    });
});