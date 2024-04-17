@extends('layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Ajout Groupes</h2>
                    </div>
                    <div class="card-body">
                        <form  action="/groupes/ajouter" method="POST" id="addGroupForm">
                            @csrf <!-- Ajouter ceci pour la protection contre les failles CSRF -->
                            <div class="form-group mb-3">
                                <label for="title">Nom de Groupes:</label>
                                <input type="text" name="name" class="form-control" id="title" placeholder="Nom de Groupe" value="" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                        </form>
                        <div id="message"></div> <!-- Pour afficher les messages de succès/erreur -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.getElementById('addGroupForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            fetch('api/groupes/ajouter', {
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
                    window.location.href = 'dashbord';

                })
        });
    </script>

@endsection
