<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard </title>





    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href=""
               onclick="event.preventDefault(); logout()">
                Sign out
            </a>

            <form id="logout-form" action="" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light position-fixed sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <span data-feather="file"></span>
                            Gestion des Roles
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Gestion des Permissions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ajouterRoles')}}">
                            <span data-feather="bar-chart-2"></span>
                            Ajouter Role
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ajoutePer')}}">
                            <span data-feather="layers"></span>
                            Ajouter Permission
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Assignement</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Assign.User')}}">
                            <span data-feather="file-text"></span>
                            Assigner un utilisateur à un groupe
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('assignPerToGroup')}}">
                            <span data-feather="file-text"></span>
                            Assigner des permissions à des groupes
                        </a>
                    </li>

                </ul>
            </div>
        </nav>




        <div>


            @yield('content')


        </div>




        <script>

            function logout() {
                fetch('http://127.0.0.1:8000/api/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
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
                        // Assuming you want to display a success message
                        alert(data.message);
                        // Redirect to the login page
                        window.location.href = '/';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Display error message if something went wrong
                        alert('Une erreur s\'est produite lors de la déconnexion.');
                    });
            }




        </script>

</body>
</html>


