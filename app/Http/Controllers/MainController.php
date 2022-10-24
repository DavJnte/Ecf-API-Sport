<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Permission;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    //retour au Menu
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

    //Affiche les permissions
    function permissions()
    {
        $permissions = Permission::all();
        return view('permissions', compact('permissions'));
    }

    //Ajouter une permission 
    function addPermission()
    {
        return view('addPermission');
    }

    //Créer une permission
    function savePermissionAjax()
    {
        if (Permission::create(['nom' => request('nom')])) {
            echo 'true||Permission créée avec succès';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }

    //Modifier vue
    function editPermission(Permission $permission)
    {
        return view('editPermission', compact('permission'));
    }

    //Modifier une permission
    function updatePermissionAjax()
    {
        $event = Permission::find(request('id'));
        $data = ['nom' => request('nom')];
        if ($event->update($data)) {
            echo 'true||Mise à jour effectuée';
        }
        echo "false||Une erreur s'est produite";
        die;
    }

    //Supression des permissions
    function deletePermission(Permission $permission)
    {
        $permission->delete();
        if($permission){
            echo 'true||Operation effectuée avec succès';
        }
        return back();
    }

    //heritage des permissions
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

    //Ajouter une structure
    function addStructure()
    {
        $franchises = User::where('role', 2)
            ->get();
        return view('addStructure', compact('franchises'));
    }

    //Création d'une structure
    function saveStructureAjax()
    {
        if (User::create(['name' => request('name'), 'email' => request('email'), 'token' => request('token'), 'role' => 3, 'password' => Hash::make(request('password')), 'parent' => request('parent')])) {
            echo 'true||Structure créé avec succès';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }

    //Modifier une Franchise vue
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

    //Modifier une Fanchise
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
                echo 'true||Mise à jour effectuée';
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
                echo 'true||Mise à jour effectuée';
                die;
            }
        } 
    }

     //Activer / Desactiver Structure
     function status_updatef($id)
     {
         $product = DB::table('users')
                     ->select('deleted')
                     ->where('id','=',$id)
                     ->first();
     
         //Check user status
         if($product->deleted == '1'){
             $deleted = '0';
         }else{
             $deleted = '1';
         }
         //update product status
         $values = array('deleted' => $deleted );
         DB::table('users')->where('id',$id)->update($values);
         echo 'true||Mise à jour effectuée';
         return back();
     }

    //Modifier vue
    function editStructure(User $structure)
    {
        $franchises = User::where('role', 2)
            ->get();
        return view('editStructure', compact('structure', 'franchises'));
    }

    //Modifier une Structure 
    function updateStructureAjax()
    {
        $structure = User::find(request('id'));
        if (request('password'))
            $data = ['email' => request('email'), 'token' => request('token'), 'role' => 3, 'password' => Hash::make(request('password')), 'parent' => request('parent')];
        else
            $data = ['email' => request('email'), 'token' => request('token'), 'role' => 3, 'parent' => request('parent')];
        if ($structure->update($data)) {
            echo 'true||Mise à jour effectuée';
            die;
        }
        echo "false||Une erreur s'est produite";
        die;
    }

        //Activer / Desactiver Structure
        function status_update($id)
        {
            $product = DB::table('users')
                        ->select('deleted')
                        ->where('id','=',$id)
                        ->first();
        
            //Check user status
            if($product->deleted == '1'){
                $deleted = '0';
            }else{
                $deleted = '1';
            }
            //update product status
            $values = array('deleted' => $deleted );
            DB::table('users')->where('id',$id)->update($values);
            echo 'true||Mise à jour effectuée';
            return back();
        }

    //Supprimer une Structure
    function deleteStructure(User $structure)
    {
        $structure->delete();
        if($structure){
            echo 'true||Operation effectuée avec succès';
        }
        return back();
    }

    //Franchise vue
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

    //Ajouter vue
    function addFranchise()
    {
        $permissions = Permission::all();
        return view('addFranchise', compact('permissions'));
    }

    //Ajout d'une Franchise
    function saveFranchiseAjax()
    {
        if ($user = User::create(['name' => request('name'), 'email' => request('email'), 'token' => request('token'), 'role' => 2, 'password' => Hash::make(request('password'))])) {
            $permissions = request('permissions');
            foreach ($permissions as $key => $value) {
                if (!UserPermission::create(['user' => $user->id, 'permission' => $value]))
                    echo 'false||Une erreur s\est produite';
            }
            echo 'true||Operation effectuée avec succès';
            die;
        } else {
            echo "false||Une erreur s'est produite";
        }
    }

    //Supprimer une Franchise
    function deleteFranchise(User $franchise)
    {
        $franchise->delete();
        if($franchise){
            echo 'true||Operation effectuée avec succès';
        }
        return back();
    }

    //Déconnexion
    function logout()
    {
        session()->forget('admin');
        session()->save();
        return redirect('/');
    }
}
