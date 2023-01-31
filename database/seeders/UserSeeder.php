<?php

namespace Database\Seeders;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::query()->create([
            'name' => "Mirzorasul Danierov",
            'email_verified_at' => Carbon::now(),
            'email' => 'falcon.9roc@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
