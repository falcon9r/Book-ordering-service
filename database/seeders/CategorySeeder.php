<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Adventure stories',
                'description' => 'An adventure story is a genre of literature that features a protagonist going on an adventure of some kind. It is often considered to be escapist literature due to the fact that the stories sometimes take place in exotic, interesting, and dangerous locations.'
            ],
            [
                'name' => 'Classics',
                'description' => 'Expresses Artistic Quality. Classic literature is an expression of life, truth, and beauty. It must be of high artistic quality, at least for the time in which it was written. Although different styles will come and go, a classic can be appreciated for its construction and literary art.'
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Fantasy fiction is a genre of writing in which the plot could not happen in real life (as we know it, at least). Often, the plot involves magic or witchcraft and takes place on another planet or in another — undiscovered — dimension of this world.'
            ]
        ];
        foreach ($data as $datum)
        {
            Category::query()->create($datum);
        }
    }
}
