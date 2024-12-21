document.addEventListener('DOMContentLoaded', function() {

    let selectMarque = document.querySelector('[data-js-marque]'),
        selectElement = selectMarque.querySelector('#marque'),
        selectModele = document.getElementById('modele_id');

    selectElement.addEventListener('change', function(){
        
        let selectOption = selectElement.options[selectElement.selectedIndex];
        
        let optionSelectedId = selectOption.value;

        // Supprimer les options existantes
        selectModele.innerHTML = '';

        // Ajouter une option par défaut pour le modèle
        let defaultOption = document.createElement('option');
        defaultOption.text = '--- Sélectionnez un modèle ---';
        defaultOption.disabled = true;
        defaultOption.selected = true;
        selectModele.appendChild(defaultOption);

        /* requête AJAX pour récupérer les modèles correspondant à la marque sélectionnée */
        fetch(`/modeles/${optionSelectedId}`)
          .then(response => response.json())
          .then(data => {
            /* console.log(data) */
            selectModele.innerHTML = '';
            data.forEach(modele => {
                let modeleOption = document.createElement('option');
                modeleOption.value = modele.id;
                modeleOption.textContent = modele.nom; // Utilisez textContent pour définir le texte de l'option
                selectModele.appendChild(modeleOption);
            });
        });
    });
});