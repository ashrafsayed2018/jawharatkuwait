<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(20);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'label' => ['nullable', 'string', 'max:255'],
        ]);

        Role::create($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'تم إضافة الدور بنجاح');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id],
            'label' => ['nullable', 'string', 'max:255'],
        ]);

        $role->update($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'تم تحديث الدور بنجاح');
    }

    public function destroy(Role $role)
    {
        if ($role->users()->count() > 0) {
            return back()->with('error', 'لا يمكن حذف هذا الدور لأنه مرتبط بمستخدمين');
        }
        
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'تم حذف الدور بنجاح');
    }
}
