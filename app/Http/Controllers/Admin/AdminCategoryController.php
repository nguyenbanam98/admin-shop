<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Str;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    use DeleteModelTrait;

    private $htmlOption;
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {

        $htmlOption = $this->getCategory($parentId = '');

        return view('admin.category.add', compact('htmlOption'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:categories|max:255',      
        ]);

        $this->saveCategory($request);

        return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $recusive = new Recusive($data);

        $htmlOption = $recusive->handleRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);
        
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|unique:categories|max:255',      
        ]);
        $category = Category::findOrFail($id);

        $category->saveCategory($request, $id);

        return redirect()->route('admin.categories.index');
    }

    public function saveCategory($request, int $id = null)
    {

        return Category::updateOrCreate(
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
        return $this->deleteModelTrait($id, $this->category);;
    }
}