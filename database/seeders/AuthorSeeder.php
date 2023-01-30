<?php

namespace Database\Seeders;

use App\Models\Author\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'A.A. ATTANASIO',
            'A.A. MILNE'
        ];
        foreach ($data as $datum)
        {
            Author::query()->create([
                'name' => $datum
            ]);
        }
    }
}
