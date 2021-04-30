<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'id' => 1 ,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => null,
            'password' => 'admin',
        ]);
        User::create([  
            'id' => 2,
            'name' => 'Daniel',
            'email' => 'pinho_daniel098@hotmail.fr',
            'email_verified_at' => null,
            'password' => 'Daniel',
        ]);
    }
}
