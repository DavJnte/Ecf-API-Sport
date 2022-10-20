<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPermission;
use Illuminate\Http\Request;
use App\Evenement;
use App\Participant;
use Illuminate\Support\Facades\DB;
use App\Campagne;
use App\Permission;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    //
    function home()
    {
        return view('home');
    }
    function homeUser()
    {
        if (isset(session()->get('user')->parent)) {
            $permissions = UserPermission::join('permissions', 'user_permissions.permission', '=', 'permissions.id')->where('user', session()->get('user')->parent)->get();
            $users_parent = User::where('id', session()->get('user')->parent)->get();
        } else {
            $users_parent ='';
            $permissions = UserPermission::join('permissions', 'user_permissions.permission', '=', 'permissions.id')->where('user', session()->get('user')->id)->get();
        }
 
        return view('home-user', compact('permissions','users_parent'));
    }
    function permissions()
    {
        $permissions = Permission::all();
        return view('permissions', compact('permissions'));
    }
    function addPermission()
    {
        return view('addPermission');
    }
    function savePermissionAjax()
    {
        if (Permission::create(['nom' => request('nom'), 'code' => request('code')])) {
            echo 'true||Permission créée avec succès';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }

    function editPermission(Permission $permission)
    {
        return view('editPermission', compact('permission'));
    }
    function updatePermissionAjax()
    {
        $event = Permission::find(request('id'));
        $data = ['nom' => request('nom'), 'code' => request('code')];
        if ($event->update($data)) {
            echo 'true||Mise a jour effectuee';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }
    function deletePermission(Permission $permission)
    {
        $permission->delete();
        return back();
    }

    function structures()
    {
        $franchises = User::where('role', 2)
            ->get();
        $franchises_permissions = [];
        foreach ($franchises as $key => $value) {
            $permissions = UserPermission::join('permissions', 'user_permissions.permission', '=', 'permissions.id')->where('user', $value->id)->get();
            $franchises_permissions[$value->id] = $permissions;
        }
        $structures = User::leftJoin('users as u', 'u.parent', '=', 'users.id')->select('u.*', 'users.name as parentName', 'users.id as parentId')->where('u.role', 3)->get();
        return view('structures', compact('structures', 'franchises_permissions'));
    }
    function addStructure()
    {
        $franchises = User::where('role', 2)
            ->get();
        return view('addStructure', compact('franchises'));
    }
    function saveStructureAjax()
    {
        if (User::create(['name' => request('name'), 'email' => request('email'), 'token' => request('token'), 'role' => 3, 'password' => Hash::make(request('password')), 'parent' => request('parent')])) {
            echo 'true||Structure créé avec succès';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }

    function editFranchise(User $structure, Request $request)
    {
        $user_permissions = UserPermission::where('user', $request->franchise)
            ->get();
            $permissions = Permission::all(); 
        $franchise = User::where('id', $request->franchise)
            ->first();
            // dd($permissions);
        return view('editFranchise', compact('permissions','user_permissions','franchise'));
    }
    function updateFranchiseAjax()
    {
        
        $franchise = User::find(request('id'));
        $deleting_perm = DB::delete('DELETE from user_permissions where user = ?',[request('id')]);
        if($deleting_perm){
            $permissions = request('permissions');
            foreach ($permissions as $key => $value) {
                if (!UserPermission::create(['user' => request('id'), 'permission' => $value]))
                    echo 'false||Une erreur s\est produite';
            }
                
            if (request('password'))
            $data = ['email' => request('email'), 'token' => request('token'), 'role' => 2, 'password' => Hash::make(request('password')), 'parent' => request('parent')];
            else
                $data = ['email' => request('email'), 'token' => request('token'), 'role' => 2, 'parent' => request('parent')];
            if ($franchise->update($data)) {
                echo 'true||Mise à jour effectuee';
                die;
            }
        } else {
            $permissions = request('permissions');
            foreach ($permissions as $key => $value) {
                if (!UserPermission::create(['user' => request('id'), 'permission' => $value]))
                    echo 'false||Une erreur s\est produite';
            }
                
            if (request('password'))
            $data = ['email' => request('email'), 'token' => request('token'), 'role' => 2, 'password' => Hash::make(request('password')), 'parent' => request('parent')];
            else
                $data = ['email' => request('email'), 'token' => request('token'), 'role' => 2, 'parent' => request('parent')];
            if ($franchise->update($data)) {
                echo 'true||Mise à jour effectuee';
                die;
            }
        } 
    }

    function editStructure(User $structure)
    {
        $franchises = User::where('role', 2)
            ->get();
        return view('editStructure', compact('structure', 'franchises'));
    }
    function updateStructureAjax()
    {
        $structure = User::find(request('id'));
        if (request('password'))
            $data = ['email' => request('email'), 'token' => request('token'), 'role' => 3, 'password' => Hash::make(request('password')), 'parent' => request('parent')];
        else
            $data = ['email' => request('email'), 'token' => request('token'), 'role' => 3, 'parent' => request('parent')];
        if ($structure->update($data)) {
            echo 'true||Mise à jour effectuee';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }
    function deleteStructure(User $structure)
    {
        $structure->delete();
        return back();
    }
    function franchises()
    {
        $franchises = User::where('role', 2)
            ->get();
        $franchises_permissions = [];
        foreach ($franchises as $key => $value) {
            $permissions = UserPermission::join('permissions', 'user_permissions.permission', '=', 'permissions.id')->where('user', $value->id)->get();
            $franchises_permissions[$value->id] = $permissions;
        }
        // dd($franchises);
        return view('franchises', compact('franchises', 'franchises_permissions'));
    }
    function addFranchise()
    {
        $permissions = Permission::all();
        return view('addFranchise', compact('permissions'));
    }
    function saveFranchiseAjax()
    {
        if ($user = User::create(['name' => request('name'), 'email' => request('email'), 'token' => request('token'), 'role' => 2, 'password' => Hash::make(request('password'))])) {
            $permissions = request('permissions');
            foreach ($permissions as $key => $value) {
                if (!UserPermission::create(['user' => $user->id, 'permission' => $value]))
                    echo 'false||Une erreur s\est produite';
            }
            echo 'true||Operation effectuee avec succes';
            die;
        } else {
            echo "false||Une erreur s'est produite";
        }
    }

    function deleteFranchise(User $franchise)
    {
        $franchise->delete();
        return back();
    }

    function logout()
    {
        session()->forget('admin');
        session()->save();
        return redirect('/');
    }
}
