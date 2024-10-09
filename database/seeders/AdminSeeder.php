<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Promise\Create;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Hafiz Muneeb',
            'role' => '1',
            'email' => 'championsays786@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
