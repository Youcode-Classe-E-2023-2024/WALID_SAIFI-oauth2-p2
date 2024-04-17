@extends('layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card text-dark bg-warning">
                        <div class="card-body">
                            <i class="fas fa-tags fa-2x"></i>
                            <h5 class="card-title">Nombre de Tags</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-dark bg-warning">
                        <div class="card-body">
                            <i class="fas fa-folder fa-2x"></i>
                            <h5 class="card-title">Nombre de Catégories</h5>
                            <p class="card-text"></p>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-dark bg-warning">
                        <div class="card-body">
                            <i class="fas fa-book fa-2x"></i>
                            <h5 class="card-title">Nombre de Wikis</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card text-dark bg-warning">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x"></i>
                            <h5 class="card-title">Nombre d'Utilisateurs</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

