<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    public function articleShowList(){
        $articles = DB::table('articles')->get();
        return view('admin/articles_admin',['articles' => $articles]);
    }

    public function userArticleShowList(){
        if (auth()->check()) {
            $articles = DB::table('articles')->get();
            return view('user/notice', ['articles' => $articles]);
        } else {
            return redirect()->route('login');
        }
    }

    public function noticeList($id){
        $article = Article::findOrFail($id);
        return view('user/notice_list',['article' => $article]);
    }

    public function create()
    {
        return view('admin/articles_edit');
    }

    public function edit(Article $article)
    {
        return view('admin/articles_edit', compact('article'));
    }

    public function saveArticle(Request $request, Article $article = null)
    {
        $request->validate([
            'title' => 'required|max:255',
            'posted_date' => 'required|date',
            'article_contents' => 'required',
        ]);

        if ($article === null) {
            $article = new Article;
        }

        $article->title = $request->title;
        $article->posted_date = $request->posted_date;
        $article->article_contents = $request->article_contents;
        $article->save();

        return redirect()->route('articles_admin');
    }

        public function destroy(Article $article)
    {
        if($article != null){
            $article->delete();
        }
        return redirect()->route('articles_admin');
    }


}
