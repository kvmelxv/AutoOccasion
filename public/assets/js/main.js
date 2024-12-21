/* document.addEventListener('DOMContentLoaded', function(){

    let roleAttr = document.querySelectorAll('#role-attr');

    //console.log(roleAttr)
    for(let i = 0 ; i< roleAttr.length ; i++){
        roleAttr[i].addEventListener('click', function(e){
           // e.preventDefault();
        })
    
    }




}) */


/***   */
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner l'image principale
    var mainImage = document.querySelector('.img-fluid.mb-3');

    // Sélectionner toutes les miniatures
    var thumbnails = document.querySelectorAll('.img-mini');

    // Ajouter un écouteur d'événements à chaque miniature
    thumbnails.forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            // Mettre à jour l'attribut src de l'image principale avec celui de la miniature cliquée
            mainImage.src = thumbnail.src;
        });
    });
});