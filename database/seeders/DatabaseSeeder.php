<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Methodist;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(15)->create();
        User::factory(1)->create([
            'email' => 'q@q.q',
            'password' => '123',
        ]);
        Admin::factory()->create([
            'user_id' => User::where('email', '=', 'q@q.q')->first()->id
        ]);
        Classroom::factory(10)->create();
        Group::factory(10)->create();
        Lesson::factory(5)->create();
        Employee::factory(1)->create();
        Methodist::factory(1)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
