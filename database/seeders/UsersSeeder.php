<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'Admin@gmail.com';
        $user->password = Hash::make('00000000');
        $user->name_kana = 'アドミン';
        $user->profile_image = '/storage/profile_image/profile_image.jpg';
        $user->grades_id = 1;
        $user->save();

        $admin = new Admin;
        $admin->name = 'Admin';
        $admin->email = 'Admin@gmail.com';
        $admin->password = Hash::make('00000000');
        $admin->user_id = $user -> id;
        $admin->save();
    }
}
