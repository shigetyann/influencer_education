@extends('layouts.app')

@section('content')
<div class="newslist">
    <a href="{{ route('articles_admin') }}"><h4>←戻る</h4></a>
    <div class="title"><h2>お知らせ{{ isset($article) ? '変更' : '新規登録' }}</h2></div>
    <form method="POST" action="{{ isset($article) ? route('articles_admin_update', $article) : route('articles_admin_store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif
        <div class="form-group">
            <div class="posted_date">
                <label for="posted_date">投稿日時</label><input type="date" id="posted_date" name="posted_date" value="{{ isset($article) ? \Carbon\Carbon::now()->format('Y-m-d') : '' }}" required>
            </div>
        </div>
        <div class="form-group">
            <div class="title">
                <label for="title">タイトル</label><input type="text" id="title" name="title" value="{{ isset($article) ? $article->title : '' }}" required>
            </div>
        </div>
        <div class="form-group">
            <div class="article_contents">
                <label for="article_contents">本文</label><textarea id="article_contents" cols="60" rows="5" name="article_contents" required>{{ isset($article) ? $article->article_contents : '' }}</textarea>
            </div>
        </div>
        <input type="submit" value="{{ isset($article) ? '変更' : '新規登録' }}">
    </form>
</div>
@endsection
