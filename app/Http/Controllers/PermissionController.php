<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|string|max:255',
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($permission, 201);
    }

    public function show()
    {
        $permission = Permission::all();
        return response()->json($permission);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission->name = $request->input('name');
        $permission->save();

        return response()->json(['message' => 'Permission mise à jour avec succès', 'permission' => $permission], 200);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['message' => 'Permission supprimée avec succès'], 200);
    }




    public function assignPermissionToGroup(Request $request, $groupId, $permId)
    {
        $group = Group::findOrFail($groupId);
        $permission = Permission::findOrFail($permId);

        if ($group->permissions->contains($permission->id)) {
            return response()->json(['message' => 'La permission est déjà assignée au groupe.'], 422);
        }

        $group->permissions()->attach($permission);

        return response()->json(['message' => 'Permission assignée au groupe avec succès'], 200);
    }

    public function indexassignPerToGroup(){
        $permissions = Permission::all();
        $groups = User::all();
        return view('assignPerToGroup', compact('permissions', 'groups'));
    }



}
