<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 2)->create([
            'parent_id' => $this->getRandomParentId()
        ]);
    }

    private function getRandomParentId()
    {
        return Category::inRandomOrder()->first();
    }
}
