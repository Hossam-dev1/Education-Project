<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function index()
    {   
        $data['ads'] = Ads::all();

        return view("admin.ads.index")->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'desc' => 'required|string|max:255',
            'img' => 'nullable|image',
        ]);
        $imgPath = Storage::putFile('others', $request->file('img'));

        Ads::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $imgPath,
        ]);
        $request->session()->flash("msg", "تم الاضافه بنجاح");
        return back();
    }

    public function update(Request $request)
    {   
        $request->validate([
            'id' => 'required',
            'title' => 'required|string|max:50',
            'desc' => 'required|string|max:255',
            'img' => 'nullable|image|max:5120',
        ]);

        $ads = Ads::findOrFail($request->id);
        $imgPath = $ads->img; // old path

        if ($request->hasFile('img')) 
        {
            Storage::delete($imgPath);
            $imgPath = Storage::putFile('others', $request->file('img')); // new path
        }
        $ads->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $imgPath,
            ]);

        $request->session()->flash("msg", "تم التعديل بنجاح");
        return back();
    }

    // public function toggle(Ads $ads)
    // {
    //     $ads->update([
    //         'active' => ! $ads->active
    //     ]);
    //     return back();
    // }

    public function delete(Request $request, $id)
    {
        try
        {   
            $ads = Ads::findOrFail($id);
            $imgPath = $ads->img; 
            $ads->delete();
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
