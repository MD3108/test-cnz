<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::create([
            //-- Main --//
            'name' => 'My first Combo Note',
            'notation' => '{ "array": [ "2xL", "2xM", "2xH"] }' ,
            //-- Fighters --//
            //'fighter_name' => 'SSJ Goku',
            //'fighter_img' => '/storage/images/fighters/ssj-goku.png',
            //'assist-1_name' => 'SSJ Vegeta',
            //'assist-1_img' => '/storage/images/fighters/ssj-vegeta.png',
            //'assist-1' => 'A',
            //'assist-2_name' => 'SSJ Trunks',
            //'assist-2_img' => '/storage/images/fighters/ssj-trunks.png',
            //'assist-2' => 'A',

            //-- Détails --//
            'damage' => 2620,
            'ki_start' => 0,
            'ki_end' => 0.5,
            'difficulty' => 'easy',
            'youtube_url' => 'https://youtu.be/IK68AZ87mRU',

            //-- User --//
            'user_id' => 1,
        ]);
    }
}
