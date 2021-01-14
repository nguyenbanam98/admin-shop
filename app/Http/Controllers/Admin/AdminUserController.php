<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    
    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->latest()->paginate(10);
        
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'bail|required|min:6',
            'password_confirmation' => 'bail|required|same:password',                      

        ]);
        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' =>  $request->role,  
        ]);

        $roleId = $request->role_id;
        $user->roles()->attach($roleId);

        return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->findOrFail($id);
        $rolesOfUser = $user->roles;

        return view('admin.user.edit', compact('roles', 'user', 'rolesOfUser'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'bail|required|min:6',
            'password_confirmation' => 'bail|required|same:password',          
        ]);

        $this->user->find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = $this->user->find($id);

        $user->roles()->sync($request->role_id);

        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
