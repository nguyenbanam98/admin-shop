<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use Illuminate\Support\Str;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Controllers\Controller;

class AdminMenuController extends Controller
{
    use DeleteModelTrait;

    private $menu;

    public function __construct( Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = Menu::latest()->paginate(5);

        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->getMenu($parentId = '');

        return view('admin.menu.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:menus|max:255',      
        ]);

        $this->saveMenu($request);

        return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');

    }

    public function edit($id)
    {
        $menu = $this->menu->findOrFail($id);

        $optionSelect =  $this->getMenu($menu->parent_id);

        return view('admin.menu.edit', compact('menu', 'optionSelect'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'bail|required|unique:menus|max:255',      
        ]);

        $menu = $this->menu->findOrFail($id);

        $this->saveMenu($request, $id);

        return redirect()->route('admin.menus.index');

    }

    public function getMenu($parentId)
    {
        $data = Menu::all();
        $recusive = new Recusive($data);

        $htmlOption = $recusive->handleRecusive($parentId);

        return $htmlOption;
    }

    public function saveMenu($request, int $id = null)
    {

        return Menu::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name'      => $request->name,
                'parent_id' => $request->parent_id,
                'slug'      => Str::slug($request->name),

            ]

        );
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->menu);;
    }
}
