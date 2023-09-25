<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tutorialIds = \App\Models\Tutorial::pluck('id')->toArray();

        $posts = [
            ['tutorial_id' => $tutorialIds[0], 'title' => 'Post 1', 'content' => 'Content of Post 1'],
            ['tutorial_id' => $tutorialIds[1], 'title' => 'Post 2', 'content' => 'Content of Post 2'],
            ['tutorial_id' => $tutorialIds[2], 'title' => 'Post 3', 'content' => 'Content of Post 3'],
            ['tutorial_id' => $tutorialIds[3], 'title' => 'Post 4', 'content' => 'Content of Post 4'],
            ['tutorial_id' => $tutorialIds[0], 'title' => 'Post 5', 'content' => 'Content of Post 5'],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
