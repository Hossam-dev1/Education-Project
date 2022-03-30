<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // return ini_get('post_max_size');
        $ads1 = Ads::findOrFail(1);
        $ads2 = Ads::findOrFail(2);
        $ads3 = Ads::findOrFail(3);

        // // dd($ads);
        // $data['ads'] = Ads::all();

        return view("web.home.index")->with([
            'ads1' => $ads1,
            'ads2' => $ads2,
            'ads3' => $ads3,

        ]);
        

    }
}
