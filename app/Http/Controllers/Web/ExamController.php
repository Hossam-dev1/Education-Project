<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Exam;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function show($id)
    {   
        $data['exam'] = Exam::findOrFail($id);
        $exam = Exam::findOrFail($id);
        $user = Auth::user();
        $data['canSeeCodeBtn'] = true;
        $data['examFree'] = false;

        if ($user !== null) // lw logined
        {
            if($exam->active == 0)
            {
                return redirect(url("/"));
            }
            $pivetRow = $exam->users()->where('user_id', auth()->id())->first();
            
            if($pivetRow == null and $exam->paid == 1)
            {
                $data['canSeeCodeBtn'] = true;
            }
            elseif($pivetRow == null and $exam->paid == 0) {
                $data['canSeeCodeBtn'] = false;
                $data['examFree'] = true;
            }
            elseif($pivetRow !== null and $pivetRow->pivot->status == 'closed') {
                $data['canSeeCodeBtn'] = false;
            }
            elseif($pivetRow !== null and $pivetRow->pivot->status == 'opend')
            {
                $data['canSeeCodeBtn'] = false;
                $data['examFree'] = true;
                if($exam->paid == 1)
                {
                    $data['canSeeCodeBtn'] = true;
                    $data['examFree'] = false;
                }
            }
            
        }
        return view('web.exams.show')->with($data);
    }

    public function start($examId, Request $request) 
    {   
        $user = Auth::user();
        $exam = Exam::findOrFail($examId);

        $result = Coupon::where('exam_id', '=', $examId)->Where('code', '=', $request->code_path)->first(); // if code is right
        if (isset($result)) 
        {
            $user->exams()->attach($examId);
            Coupon::where('exam_id', '=', $examId)->Where('code', '=', $request->code_path)->delete();
            $request->session()->flash('success', 'تم تفعيل الكود بنجاح');
            return redirect( url("exams/questions/{$examId}"));
        }
        elseif($exam->paid == 0) // free Exam
        {
            $user->exams()->attach($examId);
            // $request->session()->flash('success', 'تم فتح  بنجاح');
            return redirect( url("exams/questions/{$examId}"));
        }
        else
        {
            $request->session()->flash('error', 'هذا الكود غير صالح');
            return back();
        }
        // dd($user->exams());
    }
    
    public function questions($examId)
    { 
        $exam = Exam::findOrFail($examId);
        $pivetRow = $exam->users()->where('user_id', auth()->id())->first();

        // dd($pivetRow->pivot->score);
        if ($pivetRow == null) 
        {
        return redirect( url("exams/show/$examId"));
        }
        elseif ($pivetRow->pivot->status == 'closed' && !is_null( $pivetRow->pivot->score))
        {
            return redirect(url("/exams/show/$examId"));
        }
        $data['exam'] = Exam::findOrFail($examId);
        $data['questions'] = $data['exam']->questions()->inRandomOrder()->get();
        return view('web.exams.questions')->with($data);
    } 

    public function submit($examId,Request $request)
    {
        // calculate score
        $exam = Exam::findOrFail($examId);
        $pivot = $exam->users()->where('user_id', auth()->id())->first();

        if($pivot->pivot->status == 'closed' && !is_null( $pivot->pivot->score)){
            return redirect(url("/exams/show/$examId"));
        }

        $points = 0;
        $totalQuesNum = $exam->questions->count();
        // dd($totalQuesNum);
        
        foreach ($exam->questions as $ques) 
        {
            if (isset($request->answers[$ques->id])) {
                $userAns = $request->answers[$ques->id]; 
                $rightAns = $ques->right_ans;
                if ($userAns == $rightAns) {
                    $points ++;
                }
            }
        } 
        $score = ($points);

        if ($request->answers !== null) 
        {
            $request->validate([
                'answers'=> 'required|array',
                'answers.*'=> 'required|in:1,2,3,4'
            ]);
        }else
        {   
            $score = 0;
            $request->session()->flash("success", "نتيجة الامتحان هي $score /$totalQuesNum");
            // return redirect(url("exams/show/{$examId}"));
        }

        $user = Auth::user();
        $pivetRow = $user->exams()->where('exam_id', $examId)->first();
        // dd($pivetRow);
        $startTime = $pivetRow->pivot->updated_at;
        $submitTime = Carbon::now();

        $diff = $submitTime->diffInMinutes($startTime);
        // dd($diff);
        $user->exams()->updateExistingPivot($examId,
        [
            'score' => "$score /$totalQuesNum",
            'time_hours'=> $diff,
            'status' => 'closed'
        ]);
        $request->session()->flash("success", "نتيجة الامتحان هي $score /$totalQuesNum");

        return redirect(url("exams/show/{$examId}")); 
    }

    public function downloadModel($id)
    {
        $exam = Exam::findOrFail($id);
        $filePath = $exam->answer_model;
        return response()->download(public_path("uploads/$filePath"));
    }
}
