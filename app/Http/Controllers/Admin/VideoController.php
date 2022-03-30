<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Skill;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class VideoController extends Controller
{
    public function index()
    {
        $data['videos'] = Video::select('id','title', 'skill_id', 'video_cover','subject', 'status','paid', 'active')->orderBy('id', 'desc')->get();
        // $data['levels'] = Level::select('id', 'name')->get();
        return view('admin.video.index')->with($data);
    }
    
    public function show(Video $video)
    {
        $data['video'] = $video;
        return view('admin.video.show')->with($data);
    }

    public function create() // to display create exam modal form
    {
        $data['skills'] = Skill::select('id', 'name')->get();
        $data['video'] = Video::select('id', 'paid')->get();

        return view('admin.video.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'subject' => 'required|string',
            'video' => 'required',
            'video_cover' => 'required|image',
            'skill_id' => 'required|exists:skills,id',
            'paid' => 'required|in:0,1',
            'codes_num' => 'required|int'
        ]);
        // $validator =Validator::make($request->all(),[
        //     'title' => 'required|string',
        //     'subject' => 'required|string',
        //     'video' => 'required|file',
        //     'video_cover' => 'required|image',
        //     'skill_id' => 'required|exists:skills,id',
        //     'paid' => 'required|in:0,1',
        //     'codes_num' => 'required|int'
        // ]);

        // if ($validator->fails()) 
        // {
        //     return response()->json($validator->errors(), 500);
        // } 

        $videoPath = Storage::putFile('videos', $request->file('video'));
        $imgPath = Storage::putFile('videos', $request->file('video_cover'));
        // dd('validate');
        $video = Video::create([
            'title' => $request->title,
            'subject' => $request->subject,
            'video' => $videoPath,
            'video_cover' => $imgPath,
            // 'active' => 0,
            'skill_id' => $request->skill_id,
            'paid' => $request->paid,
            'codes_num' => $request->codes_num
            ]);
            
        $request->session()->flash("prev", "video/$video->id");
        // return redirect(url("dashboard/videos/create-code/{$video->id}"));
        if ($request->paid == 1 and $request->codes_num > 0) {
            return redirect(url("dashboard/videos/create-code/{$video->id}"));
        }
        return redirect(url("dashboard/videos"));
    }

    
    public function edit(Video $video, Request $request)
    {   
        $data['skills'] = Skill::select('id', 'name')->get();
        $data['video'] = $video;
        return view("admin.video.edit")->with($data);
    }

    public function update(Video $video, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:550',
            'subject' => 'required|string',
            'video_cover' => 'nullable|image|max:5020',
            'skill_id' => 'required',
        ]);

        $imgPath = $video->video_cover;

        if ($request->hasFile('video_cover')) 
        {
            Storage::delete($imgPath);
            $imgPath = Storage::putFile('videos', $request->file('video_cover'));
        };

        $video->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'video_cover' => $imgPath,
            'skill_id' => $request->skill_id,
            ]);

        if ($video->paid == 1 and $request->codes_num > 0) {
            $video->update([
                'codes_num' => $request->codes_num,
                ]);
            return redirect(url("dashboard/videos/create-code/{$video->id}"));
        }
        $request->session()->flash('msg', 'تم التعديل هذا الفديو');

        return redirect(url("dashboard/videos"));
    }

    public function create_code(Video $video)
    {
        $codes_num = $video->codes_num;
        for ($i=0; $i < $codes_num; $i++) 
        { 
            $codes[] = Str::random(10);
            Coupon::create([
                'video_id' => $video->id,
                'code' => $codes[$i],
                'status' => 'opend',
            ]);
        }
        
        return view("admin.video.code")->with('codes', $codes);
    }

    public function toggle(Video $video)
    {
        if ($video->video !== null) // if not compelete exam steps
        {
            $video->update([
                'active' => ! $video->active
            ]);
        }
        // $request->session()->flash('msg', 'تم وقف هذا الفيديو');  
        return back();
    }

    public function togglePaid(Video $video)
    {
        if ($video->paid == '1') 
        {
            $video->update([
                'paid' => ! $video->paid
            ]);
        }
        return back();
    }

    public function delete(Video $video, Request $request)
    {
        try
        {
            $imgPath = $video->video_cover;
            $videoPath = $video->video;
            // Auth::user()->videos()->detach($video->id); //delete from pivot table
            $video->coupons()->delete();
            $video->delete();
            Storage::delete($imgPath);
            Storage::delete($videoPath);
            $msg = 'تم حذف الفيديو بنجاح';
        }catch(Exception $e)
        {
            $msg = 'لا يمكن حذف هذا الفيديو تجنبا لحذف بيانات الطلاب'; 
        }
        $request->session()->flash('msg', $msg);
        return back();
    }

    
    public function showCode(Video $video)
    {
        $data['codes'] = Coupon::select('code')->Where('video_id', '=', $video->id)->get();
        $data['video_id'] = $video->id;
        return view('admin.video.show-code')->with($data);
    }
}
