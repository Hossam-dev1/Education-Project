<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    public function index()
    {
        $data['levels'] = Level::get();
        return view('admin.levels.index')->with($data);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name_ar' => 'required|string|max:50'
        ]);
        Level::create([
            'name' => json_encode(['ar' => $request->name_ar])
            ]);

        $request->session()->flash("msg", "تم الاضافه بنجاح");
        return back();
    }

    public function update(Request $request)
    {   
        $request->validate([
            'id' => 'required|exists:levels,id',
            'name_ar' => 'required|string|max:50'
        ]);
        Level::findOrFail($request->id)->update([
            'name' => json_encode(['ar' => $request->name_ar])
            ]);

        $request->session()->flash("msg", "تم التعديل بنجاح");
        return back();
    }

    public function toggle(Level $level)
    {
        $level->update([
            'active' => ! $level->active
        ]);
        return back();
    }
    public function delete(Request $request, $id)
    {
        try
        {
            Level::findOrFail($id)->delete();
            $msg = "تم الحذف بنجاح";
        }
        catch (Exception $e)
        {   
            $msg = "لا يمكن حذف هذا الصف";
        }
       $request->session()->flash("msg", $msg);
       return back();
    }
}
