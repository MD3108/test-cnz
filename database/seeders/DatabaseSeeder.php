<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            NoteSeeder::class,
            FighterSeeder::class,
            FighterNoteSeeder::class,
            CategorySeeder::class,
            CategoryNoteSeeder::class,
            LikeSeeder::class,
            LikeNoteSeeder::class,
        ]);
    }
}
