<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointements;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {   
        $data['appointment'] = Appointements::all();

        return view("admin.appointment.index")->with($data);
    }

    public function create()
    {   
        $data['appointment'] = Appointements::all();

        return view("admin.appointment.create")->with($data);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'level' => "required",
            'center' => "required",
            'subject' => "required|string",
            'day' => "required|string",
            'time' => "required|string",
        ]);
        Appointements::create([
            'level' => $request->level,
            'center' => $request->center,
            'subject' => $request->subject,
            'day' => $request->day,
            'time' => $request->time
        ]);
        return redirect(url('dashboard/teacher'));
    }

    public function edit($id)
    {   
        $data['item'] = Appointements::findOrFail($id);

        return view("admin.appointment.edit")->with($data);
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'level' => "required",
            'center' => "required",
            'subject' => "required|string",
            'day' => "required|string",
            'time' => "required|string",
        ]);

        $item = Appointements::findOrFail($id);
        $item->update([
            'level' => $request->level,
            'center' => $request->center,
            'subject' => $request->subject,
            'day' => $request->day,
            'time' => $request->time
        ]);
        return redirect(url('dashboard/teacher'));
    }

    public function delete($id)
    {   
        Appointements::findOrFail($id)->delete();
        
        return redirect(url('dashboard/teacher'));
    }
}
