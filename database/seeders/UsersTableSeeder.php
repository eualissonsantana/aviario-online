<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aviário Online',
            'username' => 'admin',
            'email' =>  'contato@aviario.online.com',
            'ehGerente' => 1,
            'password' => Hash::make('info@2020'),
        ]);
    }
}
