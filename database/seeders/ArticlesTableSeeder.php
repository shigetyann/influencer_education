<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'id' => '1',
                'title' => '授業内容更新についてのお知らせ1',
                'posted_date' => '2024/3/20/',
                'article_contents' => '更新しました',
            ],
            [
                'id' => '2',
                'title' => '授業内容更新についてのお知らせ2',
                'posted_date' => '2024/3/20/',
                'article_contents' => '更新しました',
            ],
            [
                'id' => '3',
                'title' => '授業内容更新についてのお知らせ3',
                'posted_date' => '2024/3/20/',
                'article_contents' => '更新しました',
            ],
        ];

        \DB::table('articles')->insert($articles);
        
        foreach($articles as $article){
            Article::firstOrCreate($article);
        }
    }
}
