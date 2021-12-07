const prenom = document.querySelector('.prenom');
const checkbox = document.querySelector('.type_client');

if(checkbox){
    checkbox.addEventListener( 'change', function() {
        if(this.checked) {
            prenom.innerHTML = "Numéro de siret*";
        } else {
            prenom.innerHTML = "Prénom*";
        }
    });
}

