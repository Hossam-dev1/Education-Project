<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Appointements;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $data['first'] = Appointements::Where('level', '=', 'first')->get();
        $data['second'] = Appointements::Where('level', '=', 'second')->get();
        $data['third'] = Appointements::Where('level', '=', 'third')->get();

        $ads = Ads::all();

        return view("web.teacher.index")->with([
            'first' => $data['first'],
            'second' => $data['second'],
            'third' => $data['third'],

            'ads' => $ads,
        ]);
    }


    
}
