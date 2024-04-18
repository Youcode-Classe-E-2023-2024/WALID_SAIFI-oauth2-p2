document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('addPerForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var permissionId = document.getElementById('permission').value;
        var groupId = document.getElementById('group').value;

        fetch('http://127.0.0.1:8000/api/groups/' + groupId + '/permissions/' + permissionId, {
            method: 'POST', // Changement de la méthode en POST
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token') // Include your authentication token if needed
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('La réponse du réseau n\'est pas valide');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                document.getElementById('message').innerHTML = '<div class="alert alert-success" role="alert">' + data.message + '</div>';

            })
            .catch(error => {
                console.error('Error:', error);

                document.getElementById('message').innerHTML = '<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de l\'assignation de la permission au groupe.</div>';
            });
    });
});
