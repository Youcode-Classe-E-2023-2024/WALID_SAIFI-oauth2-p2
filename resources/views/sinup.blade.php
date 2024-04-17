<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/image/Wiki.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-QV8+oaDlJKJwQ/Scnkxm5oWfsR5Zgqn1ZlW4FL4jK71ftjF8VcOGUE3NIn1QFZDv" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">Inscription</h2>
                </div>
                <div class="card-body">
                    <form id="registerForm" method="post" action="/register">
                        @csrf <!-- CSRF Token -->
                        <div class="form-group mb-3">
                            <label for="name">Nom :</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email :</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Entrez votre email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe :</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirmer le mot de passe :</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirmez votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                    </form>
                    <div id="errorContainer" class="mt-3"></div>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Vous avez déjà un compte ? <a href="/login" class="text-primary">Connectez-vous ici</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        fetch('api/register', {
            method: 'POST',
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
                window.location.href = '/';

            })
            .catch(error => {
                document.getElementById('errorContainer').innerHTML = '<span class="text-danger small">' + error.message + '</span>';
            });
    });
</script>

</body>
</html>
