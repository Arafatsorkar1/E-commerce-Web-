<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::updateOrcreate(

            [
                'name' => 'Admin',
                'email'=> 'admin@info.com',
                'password'=> Hash::make('123456789')
            ]
        );

    }
}
