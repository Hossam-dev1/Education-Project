<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class SkillController extends Controller
{
    public function show($id)
    {   
        $data['skill'] = Skill::findOrFail($id);
        $data['exams'] = $data['skill']->exams->where('active', 1);
        $data['videos'] = $data['skill']->videos->where('active', 1);
    
    
        return view('web.skills.show')->with($data);
    }
}
