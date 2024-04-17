@extends('layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Assigner l'utilisateur à un groupe</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="addForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="user">Liste des utilisateurs :</label>
                                <select name="user" class="form-control" id="user" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="group">Liste des groupes :</label>
                                <select name="group" class="form-control" id="group" required>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Assigner</button>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/AssignUser-Group/AssignUser-Group.js')}}"></script>
@endsection
