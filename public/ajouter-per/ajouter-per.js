document.getElementById('addPerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    console.log(localStorage.getItem('token'));
    var formData = new FormData(this);
    fetch('http://127.0.0.1:8000/api/permissions', { // Adjust the URL accordingly
        method: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token'), // Assuming you're using Bearer token authentication
        },
        body: formData,
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('La réponse du réseau n\'est pas valide');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            document.getElementById('message').innerHTML = '<div class="alert alert-success" role="alert">Permission ajoutée avec succès!</div>';

        })
        .catch(error => {
            console.error('Error:', error);
            // Display error message if something went wrong
            document.getElementById('message').innerHTML = '<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de l\'ajout de la permission.</div>';
        });
});
