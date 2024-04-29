<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(GradesTableSeeder::class);
        //$this->call(ArticlesTableSeeder::class);
        //$this->call(UsersSeeder::class);

        $curriculums = Curriculum::factory()->count(5)->create();
        $curriculumProgress = CurriculumProgress::factory()->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
