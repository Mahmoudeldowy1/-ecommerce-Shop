<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::paginate(5);
        return view('admin.admins.index',compact('admins'));
    }


    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(AdminRequest  $request)
    {
        Admin::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        session()->flash('admin-created-message','admin with Name '.request('first_name') . request('last_name') . ' was created');
        return redirect()->route('admins.index');
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit' , compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update(request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]));
//        $admin->update([
//            'first_name' => $request['first_name'],
//            'last_name' => $request['last_name'],
//            'username' => $request['username'],
//            'email' => $request['email'],
//            'password' => Hash::make($request['password']),
//            ]);
        session()->flash('admin-updated-message','Admin with Name '.request('first_name') . request('last_name') . ' was Updated');
        return redirect()->route('admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('admin-deleted-message','admin was Deleted');
        return redirect()->route('admins.index');
    }
}
