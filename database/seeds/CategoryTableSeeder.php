<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Antipasto','Primo','Secondo','Contorno','Bevande'];

        foreach ($categories as $category) {
            $new_category = new Category();

            $new_category->name = $category;
            $new_category->slug = Str::of($category)->slug('-');

            $new_category->save();
        }
    }
}
