<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_post = new Post;
        $new_post->title = 'Lorem ipsum';
        $new_post->slug = 'Lorem-ipsum';
        $new_post->content = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa error recusandae sapiente fugiat omnis sunt consequatur veritatis possimus, autem facere commodi cum eum ab, cupiditate magni vitae quas consequuntur magnam?';
        $new_post->save();
    }
}
