<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $data['skills'] = Skill::get();
        $data['levels'] = Level::select('id', 'name')->get();
        return view('admin.skills.index')->with($data);
    }

    public function store(Request $request)
    {    
        $request->validate([
            'name_ar' => 'required|string|max:50',
            'img' => 'nullable|image|max:5120',
            'level_id' => 'required|exists:levels,id'
        ]);

        // $currentImg = $request->file('img');
        $imgPath = Storage::putFile('skills', $request->file('img'));
        Skill::create([
            'name' => json_encode(['ar' => $request->name_ar]),
            'img' => $imgPath,
            'level_id' => $request->level_id,
            ]);
            
        $request->session()->flash("msg", "تم الاضافه بنجاح");
        return back();
        // return view('admin.skills.index')->with($currentImg);
    }

    public function update(Request $request)
    {   
        $request->validate([
            'id' => 'required|exists:skills,id',
            'name_ar' => 'required|string|max:50',
            'img' => 'nullable|image|max:5120',
            'level_id' => 'required|exists:levels,id'
        ]);

        $skill = Skill::findOrFail($request->id);
        $imgPath = $skill->img; // old path

        if ($request->hasFile('img')) 
        {
            Storage::delete($imgPath);
            $imgPath = Storage::putFile('skills', $request->file('img')); // new path
        }
        $skill->update([
            'name' => json_encode(['ar' => $request->name_ar]),
            'img' => $imgPath,
            'level_id' => $request->level_id
            ]);

        $request->session()->flash("msg", "تم التعديل بنجاح");
        return back();
    }

    public function toggle(Skill $skill)
    {
        $skill->update([
            'active' => ! $skill->active
        ]);
        return back();
    }

    public function delete(Request $request, $id)
    {
        try
        {   
            $skill = Skill::findOrFail($id);
            $imgPath = $skill->img; 
            $skill->delete();
            Storage::delete($imgPath); // delete from uploads folder

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
