<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function show($id)
    {
        $data['level'] = Level::findOrFail($id);
        $data['allLevels'] = Level::select('id', 'name')->active()->get();
        $data['skills'] = $data['level']->skills()->active()->get();
        // dd($data['level']);

        return view('web/levels/show')->with($data);
    }
}
