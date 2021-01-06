<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Controllers\Controller;

class AdminTagController extends Controller
{
    use DeleteModelTrait;

    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        $tags = $this->tag->latest()->paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:tags|max:20|min:3',
        ]);
        $this->saveTag($request);

        return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');
    }

    public function saveTag($request, int $id = null)
    {

        return Tag::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),

            ]

        );
    }

    public function edit($id)
    {
        $tag = $this->tag->findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|unique:tags|max:20|min:3',
        ]);

        $this->saveTag($request, $id);

        return redirect()->route('admin.tags.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->tag);
    }
}
