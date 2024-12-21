document.addEventListener('DOMContentLoaded', function() {

    let FormFiltreCrm = document.querySelector('[ data-js-filtre-crm]'),
        btnSoummettreFiltre = FormFiltreCrm.querySelector('[data-js-btn-filtre]'),
        tokenCsrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    btnSoummettreFiltre.addEventListener('click', function(e){
        e.preventDefault();

        let formData = {
            marque_id: document.getElementById('selectMarque').value,
            modele_id: document.getElementById('selectModele').value,
            annee: document.getElementById('inputAnnee').value,
            kilometrage: document.getElementById('selectKilometrage').value,
            transmission_id: document.getElementById('selectTransmission').value,
            motopropulseur_id: document.getElementById('selectMotopropulseur').value,
            carburant_id: document.getElementById('selectCarburant').value,
            couleur_id: document.getElementById('selectCouleur').value
        };

        console.log(formData);

        fetch('/filtre/voitures', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': tokenCsrf,
            },
            body: JSON.stringify(formData)
          })
          .then(response => response.json())
          .then(data=>{
            
            let table = document.querySelector('[data-js-table-liste-voiture]'),
                tbody = table.querySelector('tbody');

            tbody.innerHTML = '' ;

            if (data.length > 0) {

                data.forEach(voiture => {

                    let rangee = `<tr>
                            <th class="center-vertical">${voiture.id}</th>
                            <th class="center-vertical">${voiture.marque}</th>
                            <td class="center-vertical">${voiture.modele}</td>
                            <th class="center-vertical">${voiture.annee}</th>
                            <td class="center-vertical">${voiture.prix} $</td>
                            <td class="d-flex gap-2 justify-content-center">
                              <a class="btn btn-sm btn-outline-success" href="/voiture/${voiture.id}">Afficher</a>
                              <a class="btn btn-sm btn-outline-warning" href="/edit/voiture/${voiture.id}">Modifier</a>
                              <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal${voiture.id}">Supprimer</button>
                           </td>
                        </tr>`;

                    tbody.innerHTML += rangee;   
                }); 

            }else {
                let rangee = `
                            <tr>
                                <td colspan="6" class="text-center p-4">Aucun Véhicule Trouvé !</td>
                            </tr>`;
                tbody.innerHTML += rangee; 
            }  
        });
    });
});