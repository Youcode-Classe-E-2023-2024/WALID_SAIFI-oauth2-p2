@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Gestion des Groupes</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped" id="groupes-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom de Groupe</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    const groupesTableBody = document.querySelector('#groupes-table tbody');
                    if (data.length > 0) {
                        data.forEach(groupe => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${groupe.id}</td>
                                <td>${groupe.name}</td>
                            `;
                            groupesTableBody.appendChild(row);
                        });
                    } else {
                        // Aucune donnée disponible
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td colspan="2" class="text-center">Aucun groupe disponible</td>
                        `;
                        groupesTableBody.appendChild(row);
                    }
                } else {
                    // Erreur de récupération des données
                    console.error('Erreur lors de la récupération des données des groupes:', xhr.status);
                    const groupesTableBody = document.querySelector('#groupes-table tbody');
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td colspan="2" class="text-center">Erreur lors de la récupération des données</td>
                    `;
                    groupesTableBody.appendChild(row);
                }
            }
        };
        xhr.open('GET', 'http://127.0.0.1:8000/api/groupes/index');
        xhr.send();
    </script>
@endsection
