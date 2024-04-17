document.getElementById('addGroupForm').addEventListener('submit', function(event) {
    event.preventDefault();
    console.log(localStorage.getItem('token'))
    var formData = new FormData(this);
    fetch('http://127.0.0.1:8000/api/groupes/ajouter', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('La réponse du réseau n\'est pas valide');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            document.getElementById('message').innerHTML = '<div class="alert alert-success" role="alert">Groupe ajoutée avec succès!</div>';

        })
        .catch(error => {
            console.error('Error:', error);
        });
});
