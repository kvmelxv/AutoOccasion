document.addEventListener('DOMContentLoaded', function () {

      let formFiltreIndex = document.querySelector('[data-js-filtre-index]'),
          btnSoummettreFiltre = formFiltreIndex.querySelector('[data-js-btn-filtre]'),
          tokenCsrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


  btnSoummettreFiltre.addEventListener('click', function (e) {
    e.preventDefault();

    let formData = {
      marque_id: document.getElementById('selectMarque').value,
      modele_id: document.getElementById('selectModele').value,
      annee: document.getElementById('inputAnnee').value,
      prix: document.getElementById('selectPrix').value,
      kilometrage: document.getElementById('selectKilometrage').value,
      transmission_id: document.getElementById('selectTransmission').value,
      motopropulseur_id: document.getElementById('selectMotopropulseur').value,
      carburant_id: document.getElementById('selectCarburant').value,
      couleur_id: document.getElementById('selectCouleur').value
    };

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

            let containerVoitures = document.querySelector('[data-js-container-voitures]');

            containerVoitures.innerHTML = '';
            
            if (data.length > 0 ) {

              data.forEach(voiture => {
              
                let voitureHTML = `
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="box">
                      <a class="box-img" href="/voiture/${voiture.id}">
                        <img src="${voiture.photo_path}" alt="Première photo de la voiture">
                        <p>${voiture.annee}</p>
                        <h3>${voiture.marque} ${voiture.modele}</h3>
                        <h2><span>${voiture.prix} $</span></h2>
                      </a>
                      <div class="btn btn-lg btn-primary d-flex justify-content-center btn-no-radius" role="button">
                        <a href="/ajout-panier/${voiture.id}" class="align-self-center"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                      </div>
                    </div>
                  </div>
                `;
  
                containerVoitures.innerHTML += voitureHTML;
  
              }); 
              
            }else {

              let voitureHTML = `
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-4 w-100">
                    <p class="text-center">Aucun Véhicule Trouvé !</p>
                  </div>
                `;
  
                containerVoitures.innerHTML += voitureHTML;
            }
            
        });
    });
});