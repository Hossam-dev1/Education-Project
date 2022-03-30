<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class VideoController extends Controller
{
    public function show($id, Request $request)
    {   
        $data['video'] = Video::findOrFail($id);
        $video = Video::findOrFail($id);
        $user = Auth::user();
        $data['canSeeCodeBtn'] = true;
        $data['videoFree'] = false;

        if ($user !== null) // lw logined
        {
            $pivetRow = $user->videos()->where('video_id', $id)->first(); // lw he coded before
            
            if($pivetRow !== null) // expired video
            {
                $codedTime = $pivetRow->pivot->updated_at;
                $currentTime = Carbon::now();
                
                if($codedTime->diffInDays($currentTime) > "7")
                {
                    $user->videos()->detach($id);
                    $data['canSeeCodeBtn'] = true;
                    $request->session()->flash('error', 'الفترة الزمنية المحددة لهذه المحاضرة انتهت.');
                }
            }
            
            if($pivetRow == null and $video->paid == 0) {
                $data['canSeeCodeBtn'] = true;
                $data['videoFree'] = true;
            }
            elseif($pivetRow !== null and $pivetRow->pivot->coded == 1) // if he coded before
            {
                $data['canSeeCodeBtn'] = false; 
                
            }
        }
        else
        {   
            $data['canSeeCodeBtn'] = false;
            return redirect("/login");
        }
        return view('web.videos.show')->with($data);
    }

    public function start($videoId, Request $request) 
    {   
        $user = Auth::user();
        $video = Video::findOrFail($videoId);
        $result = Coupon::where('video_id', '=', $videoId)->Where('code', '=', $request->code_path)->first(); // lw he coded before

        if (isset($result) and $video->paid == 1) 
        {
            $user->videos()->attach($videoId);
            Coupon::where('video_id', '=', $videoId)->Where('code', '=', $request->code_path)->delete();
            $request->session()->flash('success', 'تم تفعيل الكود بنجاح');
            return redirect (url("videos/started/{$videoId}")); 
        }
        elseif($video->paid == 0) // free video
        {
            $user->videos()->attach($videoId);
            $request->session()->flash('success', 'تم فتح الفديو بنجاح');
            return redirect (url("videos/started/{$videoId}")); 
        }
        else
        {
            $request->session()->flash('error', 'هذا الكود غير صالح');
            return back();
        }
    //  $request->session()->flash('prev',"/videos/started/$videoId");  // for secuirty
    }

    public function user_coded($videoId)
    {   
        $video = Video::findOrFail($videoId);
        $data['video'] = Video::findOrFail($videoId);
        $pivetRow = $video->users()->where('user_id', auth()->id())->first();
        if ($pivetRow == null) 
        {
        return redirect( url("videos/show/{$videoId}"));
        }
        
        return view('web.videos.video')->with($data);
    }

}
