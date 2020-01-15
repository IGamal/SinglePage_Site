<?php

use App\Models\Category;
use App\Models\Like;
use App\Models\Question;
use App\Models\Reply;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Question::truncate();
        Reply::truncate();
        Category::truncate();
        Like::truncate();

        $usersQuantity = 50;
        $questionsQuantity = 35;
        $repliesQuantity = 100;
        $categoriesQuantity = 10;

        factory(User::class, $usersQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();
        factory(Question::class, $questionsQuantity)->create();
        factory(Reply::class, $repliesQuantity)->create()->each(function ($reply)
        {
            return $reply->likes()->save(factory(Like::class)->make());
        });
    }
}
