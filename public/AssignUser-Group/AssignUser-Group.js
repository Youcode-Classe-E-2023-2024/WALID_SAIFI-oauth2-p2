document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('addForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var userId = document.getElementById('user').value;
        var groupId = document.getElementById('group').value;

        fetch('http://127.0.0.1:8000/api/groupes/' + groupId + '/utilisateurs/' + userId + '/assigner',{
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'), 
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
                // Assuming you want to display a success message
                document.getElementById('message').innerHTML = '<div class="alert alert-success" role="alert">' + data.message + '</div>';
                // Optionally, you can redirect to another page after successful assignment
                // window.location.href = 'dashboard';
            })
            .catch(error => {
                console.error('Error:', error);
                // Display error message if something went wrong
                document.getElementById('message').innerHTML = '<div class="alert alert-danger" role="alert">Une erreur s\'est produite lors de l\'assignation de l\'utilisateur au groupe.</div>';
            });
    });
});
