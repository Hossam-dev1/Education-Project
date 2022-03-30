<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Skill;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function index()
    {
        $data['exams'] = Exam::select('id','name', 'skill_id', 'img', 'questions_num', 'paid', 'active')->orderBy('id', 'desc')->get();
        // $data['levels'] = Level::select('id', 'name')->get();
        return view('admin.exam.index')->with($data);
    }

    public function show(Exam $exam)
    {
        $data['exam'] = $exam;
        // dd($data['exam'] = $exam->users()->count());
        
        return view('admin.exam.show')->with($data);
    }

    
    public function showQuestions(Exam $exam)
    {
        $data['exam'] = $exam;
        // dd($exam->questions);
        return view('admin.exam.show-questions')->with($data);
    }
    
    public function showStudents(Exam $exam)
    {
        
        $data['ques'] = $exam->questions_num;
        $data['exams'] = $exam->users()->get();
        // dd($exam->users()->get());
        return view('admin.exam.show-students')->with($data);
    }
    

    public function create() // to display create exam modal form
    {
        $data['skills'] = Skill::select('id', 'name')->get();
        return view('admin.exam.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:50',
            'desc_ar' => 'required|string',
            'img' => 'required|image|max:5120',
            'paid' => 'required|in:0,1',
            'skill_id' => 'required|exists:skills,id',
            'questions_num' => 'required|integer',
            'duration_h' => 'required|integer',
            'codes_num' => 'required|integer'
        ]);

        // $currentImg = $request->file('img');
        $imgPath = Storage::putFile('exams', $request->file('img'));
        $exam = Exam::create([
            'name' => json_encode(['ar' => $request->name_ar]),
            'desc' => json_encode(['ar' => $request->desc_ar]),
            'img' => $imgPath,
            'paid' => $request->paid,
            'questions_num' => $request->questions_num,
            'duration_h' => $request->duration_h,
            'codes_num' => $request->codes_num,
            'active' => 0,
            'skill_id' => $request->skill_id,
            ]);
            
            
        $request->session()->put("prev", "exam/$exam->id");
        return redirect(url("dashboard/exams/create-questions/{$exam->id}"));
    }

    public function createQuestions(Exam $exam)
    {   
        if (session('prev') !== "exam/$exam->id")  // for link path security
        {
            return redirect(url("dashboard/exams"));
        }
        $data['exam_id'] = $exam->id;
        $data['questions_num'] = $exam->questions_num;
        return view("admin.exam.create-questions")->with($data);
    }

    public function storeQuestions(Exam $exam, Request $request)
    {
        $request->validate([
            'titles' => 'required|array',
            'titles.*' => 'required|string|max:500',
            'right_ans' => 'required|array',
            'right_ans.*' => 'required|in:1,2,3,4',
            'imgs' => 'nullable|array',
            'imgs.*' => 'nullable|image|max:5120',
            'option_1s' => 'required|array',
            'option_1s.*' => 'required|string|max:255',
            'option_2s' => 'required|array',
            'option_2s.*' => 'required|string|max:255',
            'option_3s' => 'required|array',
            'option_3s.*' => 'required|string|max:255',
            'option_4s' => 'required|array',
            'option_4s.*' => 'required|string|max:255',
        ]);
        $imgs = $request->imgs;
        for ($i=0; $i < $exam->questions_num ; $i++) 
            {
                    $imgPath = null;
                    if (isset($imgs[$i])) 
                    {
                        $imgPath = Storage::putFile('questions', $imgs[$i]);
                    }
                    else
                    {
                        $imgPath = null;
                    }
            Question::create([
                'exam_id' => $exam->id,
                'title' => json_encode(['ar' => $request->titles[$i]]),
                'right_ans' => $request->right_ans[$i],
                'img' => $imgPath,
                'option_1' => json_encode(['ar' => $request->option_1s[$i]]),
                'option_2' => json_encode(['ar' => $request->option_2s[$i]]),
                'option_3' => json_encode(['ar' => $request->option_3s[$i]]),
                'option_4' => json_encode(['ar' => $request->option_4s[$i]]),
            ]);
            }
        
        $exam->update([
            'active' => 1,
        ]);
        if ($exam->paid == 1 and $exam->codes_num > 1) {
            return redirect(url("dashboard/exams/create-code/{$exam->id}"));
        }
        return redirect(url("dashboard/exams"));
    }



    public function edit(Exam $exam, Request $request)
    {   
        $data['skills'] = Skill::select('id', 'name')->get();
        $data['exam'] = $exam;
        return view("admin.exam.edit")->with($data);
    }

    public function update(Exam $exam, Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:50',
            'desc_ar' => 'required|string',
            'img' => 'nullable|image|max:5120',
            'skill_id' => 'required|exists:skills,id',
            'duration_h' => 'required|integer',
        ]);

        // $currentImg = $request->file('img');
        $imgPath = $exam->img;

        if ($request->hasFile('img')) 
        {
            Storage::delete($imgPath);
            $imgPath = Storage::putFile('exams', $request->file('img'));
        };

        $exam->update([
            'name' => json_encode(['ar' => $request->name_ar]),
            'desc' => json_encode(['ar' => $request->desc_ar]),
            'img' => $imgPath,
            'duration_h' => $request->duration_h,
            'skill_id' => $request->skill_id,
            ]);
            
        if ($exam->paid == 1 and $request->codes_num > 0) {
            $exam->update([
                'codes_num' => $request->codes_num,
                ]);
            return redirect(url("dashboard/exams/create-code/{$exam->id}"));
        }
        $request->session()->flash('msg', 'تم تعديل هذا الامتحان');

        return redirect(url("dashboard/exams/show/$exam->id"));
    }

    public function create_code(Exam $exam)
    {
        $codes_num = $exam->codes_num;
        for ($i=0; $i < $codes_num; $i++) 
        {   
            $codes[] = Str::random(10);
            // dd($codes[$i]);
            Coupon::create([
                'exam_id' => $exam->id,
                'code' => $codes[$i],
                'status' => 'opend',
            ]);
        }     
        return view("admin.exam.code")->with('codes', $codes);
    }

    public function toggle(Exam $exam)
    {
        if ($exam->questions_num == $exam->questions()->count()) // if not compelete exam steps
        {
            $exam->update([
                'active' => ! $exam->active
            ]);
        }
        return back();
    }

    public function togglePaid(Exam $exam)
    {
        if ($exam->paid == '1') 
        {
            $exam->update([
                'paid' => ! $exam->paid
            ]);
        }
        return back();
    }
    public function editQuestion(Exam $exam, Question $question)
    {
        $data['ques'] = $question;
        $data['exam'] = $exam;
        return view("admin.exam.edit-questions")->with($data);
    }

    public function updateQuestion(Exam $exam, Question $question, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:500',
            'right_ans' => 'required|in:1,2,3,4',
            'img' => 'nullable|image|max:5120',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'option_4' => 'required|string|max:255',
        ]);
        
        $imgPath = $question->img; // old path
        if ($request->hasFile('img')) 
        {   if($imgPath !== null)
            {
                Storage::delete($imgPath);
            }
            $imgPath = Storage::putFile('questions', $request->file('img')); // new path
        }

        // $question->update($data);   
        $question->update([
            'title' => json_encode(['ar' => $request->title]),
            'right_ans' => $request->right_ans,
            'img' => $imgPath,
            'option_1' => json_encode(['ar' => $request->option_1]),
            'option_2' => json_encode(['ar' => $request->option_2]),
            'option_3' => json_encode(['ar' => $request->option_3]),
            'option_4' => json_encode(['ar' => $request->option_4]),
            ]);
        return redirect(url("dashboard/exams/show/$exam->id/questions"));
    }

    public function delete(Exam $exam, Request $request)
    {
        try
        {
            $path = $exam->img;
            $exam->coupons()->delete();
            $exam->questions()->delete();
            // Auth::user()->exams()->detach($exam->id); //delete from pivot table
            $exam->delete();
            Storage::delete($path);
            $msg = 'تم حذف الامتحان بنجاح';
        }catch(Exception $e)
        {
            $msg = 'لا يمكن حذف هذا الامتحان تجنبا لحذف بيانات الطلاب'; 
        }
        $request->session()->flash('msg', $msg);
        return back();
    }

    public function showCode(Exam $exam)
    {
        $data['codes'] = Coupon::select('code')->Where('exam_id', '=', $exam->id)->get();
            // dd($data['codes']);
        return view('admin.exam.show-code')->with($data);
    }

    public function answerModel(Request $request, Exam $exam)
    {
        $request->validate([
            'answer_model' => 'required|file',
        ]);
        $filePath = Storage::putFile('others', $request->file('answer_model'));
        if($filePath !== null)
        {
            $exam->update([
                'answer_model' => $filePath,
            ]);
        }
        return back();
    }
    
    public function deleteModel(Exam $exam, Request $request)
    {
        try
        {
            $path = $exam->answer_model;
            Storage::delete($path);
            $exam->update([
                'answer_model' => null,
            ]);
            $msg = 'تم حذف النموذج بنجاح';
        }catch(Exception $e)
        {
            $msg = 'لا يمكن حذف هذا النوذج تجنبا لحذف بيانات الطلاب'; 
        }
        $request->session()->flash('msg', $msg);
        return back();
    }
}

