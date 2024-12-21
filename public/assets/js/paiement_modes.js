/* document.addEventListener('DOMContentLoaded', function() {


    document.getElementById('paiementmode').addEventListener('change', function() {
        let paymentMode = this.value;
        //console.log(paymentMode)
        
        // Hide 
        document.querySelectorAll('[id$="_fields"]').forEach(function(field) {
            field.style.display = 'none';
        });
        
        // Show 
        document.getElementById(paymentMode + '_fields').style.display = 'block';
    });
});  */