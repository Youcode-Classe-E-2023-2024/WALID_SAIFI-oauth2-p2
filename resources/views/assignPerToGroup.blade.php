@extends('layout')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Assigner Permission à un groupe</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="addPerForm">
                            @csrf
                            @method('PUT') <!-- Use the PUT method -->
                            <div class="form-group mb-3">
                                <label for="permission">Liste des Permissions :</label>
                                <select name="permission" class="form-control" id="permission" required>
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
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


    <script src="{{asset('/AssignPer-Group/AssignPer-Group.js')}}"></script>
@endsection


