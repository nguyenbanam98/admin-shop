<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingAddRequest;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;

    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));

    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);
        return redirect()->back()->with('success','Bạn đã thêm dữ liệu thành công');


    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(SettingAddRequest $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ]);
        return redirect()->route('admin.settings.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }

}
