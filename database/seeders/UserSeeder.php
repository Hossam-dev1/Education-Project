<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hossam ashraf',
            'email'=> 'hossam@admin.com',
            'password'=> Hash::make('123456'),
            'phone' => '01157778941',
            'role' => 'super'


        ]);
    }
}
