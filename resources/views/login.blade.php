<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/image/Wiki.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-QV8+oaDlJKJwQ/Scnkxm5oWfsR5Zgqn1ZlW4FL4jK71ftjF8VcOGUE3NIn1QFZDv" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">Connexion</h2>
                </div>
                <div class="card-body">
                    <form id="loginForm" method="post" action="/login">
                        @csrf <!-- CSRF Token -->
                        <div class="form-group mb-3">
                            <label for="email">Email :</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Entrez votre email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe :</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                    </form>
                    <div id="errorContainer" class="mt-3"></div>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Vous n'avez pas de compte ? <a href="#" class="text-primary">Inscription</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    console.log('testing')
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        fetch('api/login', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                // Gérer la connexion réussie
                console.log(data.data.token);
                localStorage.setItem('token', data.data.token)
                window.location.href = '/dashbord';

            })
            .catch(error => {
                document.getElementById('errorContainer').innerHTML = '<span class="text-danger small">' + error.message + '</span>';
            });
    });
</script>

</body>
</html>
