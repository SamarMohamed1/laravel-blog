<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name'=>'samar',
            'email'=>'samar@gmail.com',
            'password'=>Hash::make('123456'),
            'role'=>'admin'
        ]);
    }
}
