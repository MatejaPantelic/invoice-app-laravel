<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $roles = DB::table('roles')
                ->where('name', '=', 'guest')
                ->orWhere('name', '=', 'editor')
                ->get();
        } elseif (Auth::user()->hasRole('super_admin')) {
            $roles = Role::all();

        }
        return view('roles.index')->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        $allPermissions = Permission::all();
        $rolePermissionsId = DB::table('role_has_permissions')->where('role_id', '=', $role->id)->select('permission_id')->get();
        return view('roles.edit')
            ->with([
                'role' => $role,
                'allPermissions' => $allPermissions,
                'rolePermissionsId' => $rolePermissionsId,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $newPermissinos = $request->permissions;
        $permissions = DB::table('role_has_permissions')->where('role_id', '=', $role->id)->select('permission_id')->get();
        foreach ($permissions as $permission) {
            $tmp = false;
            foreach ($newPermissinos as $newPermission) {
                if ($permission == $newPermission)
                    $tmp = true;
            }
            if ($tmp == false) {
                $role->revokePermissionTo($permission);
            }
        }
        foreach ($newPermissinos as $newPermission) {
            $role->givePermissionTo($newPermission);
        }
        return redirect()
            ->back()
            ->withSuccess('The role ' . $role->name . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
    }
}
