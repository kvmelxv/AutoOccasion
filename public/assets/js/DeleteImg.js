document.addEventListener('DOMContentLoaded', function() {

    let deleteButtons = document.querySelectorAll('.btn-delete'),
        tokenCsrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {

            let photoId = button.dataset.photoId;

            fetch('/delete/photo/' + photoId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': tokenCsrf,
                    'Content-Type': 'application/json'
                },
            })
            .then(response => {
                if (response.ok) {
                    // Suppression réussie
                    // Faites disparaître l'image de l'écran
                    button.closest('.container-img-edit').remove();
                } else {
                    // La suppression a échoué
                    console.error('Erreur lors de la suppression de la photo.');
                }
            })
            .catch(error => {
                console.error('Erreur lors de la suppression de la photo :', error);
            });
        });
    });
});