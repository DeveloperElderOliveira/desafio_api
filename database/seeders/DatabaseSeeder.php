<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'bycoders',
            'email' => 'bycoders@adm.com',
            'password' => '$2y$10$yRZm7z/49TildFgDfqq.JeY8fNzQc8ipw1QyqDoOQMGMkitjUM4EG'
        ]);
    }
}
