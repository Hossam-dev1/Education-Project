<?php

namespace Database\Seeders;

use App\Models\Ads;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ads::create([
            'title'=> 'new teacher',
            'desc' => 'is coming soon'
        ]);
    }
}
