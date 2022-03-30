<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = User::Where('role', '=', 'user')->get();
        

        return view('admin.student.index')->with($data);
    }

    public function showScore($studentId)
    {
        $student = User::findOrFail($studentId);
        $data['student'] = $student;
        $data['exams'] = $student->exams;
        return view("admin.student.show-scores")->with($data);
    }

    public function openExam($studentId,$examId)
    {
        $student = User::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId,
        [
            'status' => 'opend'
        ]);
        return back();
    }

    public function closeExam($studentId,$examId)
    {
        $student = User::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId,
        [
            'status' => 'closed'
        ]);
        return back();
    }

    public function update(Request $request)
    {   
        $user = User::findOrFail($request->id);
        $request->validate([
            'id' => 'required',
            'password' => 'required|string|confirmed',
        ]);

        if ($request->password ===$request->password_confirmation) 
        {
            $user->update([
                'password' => Hash::make($request->password),
                ]);
                $request->session()->flash("msg", "تم التعديل بنجاح");
        }
        else
        {
            $request->session()->flash("msg", "حدث خطا في التعديل");
            return back();
        }
        
        return redirect(url("dashboard/students"));
    }
}
