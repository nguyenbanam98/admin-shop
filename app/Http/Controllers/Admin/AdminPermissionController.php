<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Controllers\Controller;

class AdminPermissionController extends Controller
{
    use DeleteModelTrait;

    private $permission;

    public function __construct( Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = Permission::latest()->paginate(5);

        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        $optionSelect = $this->getPermission($parentId = '');

        return view('admin.permission.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:permissions|max:255',      
        ]);

        $this->savePermission($request);

        return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');

    }

    public function edit($id)
    {
        $permission = $this->permission->findOrFail($id);

        $optionSelect =  $this->getPermission($permission->parent_id);

        return view('admin.permission.edit', compact('permission', 'optionSelect'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'bail|required|unique:permissions|max:255',      
        ]);

        $permission = $this->permission->findOrFail($id);

        $this->savePermission($request, $id);

        return redirect()->route('admin.permissions.index');

    }

    public function getPermission($parentId)
    {
        $data = Permission::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->handleRecusive($parentId);

        return $htmlOption;
    }

    public function savePermission($request, int $id = null)
    {

        return permission::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name'         => $request->name,
                'parent_id'    => $request->parent_id,
                'display_name' => $request->display_name,
                'key_code'     => $request->key_code,

            ]

        );
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->permission);;
    }
}
