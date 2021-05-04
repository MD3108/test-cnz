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
            
            FighterSeeder::class,
            //FighterNoteSeeder::class,

            NoteSeeder::class,

            CategorySeeder::class,
            CategoryNoteSeeder::class,

            LikeSeeder::class,
            LikeNoteSeeder::class,
            LikeUserSeeder::class,

            FavoriteSeeder::class,
            FavoriteUserSeeder::class,
            FavoriteNoteSeeder::class,
        ]);
    }
}
