@extends('layouts.app')

@section('content')
<div class="newslist">
    <a href="{{ route('articles_admin') }}"><h4>←戻る</h4></a>
    <div class="title"><h2>お知らせ{{ isset($article) ? '変更' : '新規登録' }}</h2></div>
    <form method="POST" action="{{ isset($article) ? route('articles_admin_update', $article) : route('articles_admin_store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif
        <div class="form-group">
            <div class="posted_date">
                <label for="posted_date">投稿日時</label><input type="date" id="posted_date" name="posted_date" value="{{ old('posted_date',isset($article) ? \Carbon\Carbon::now()->format('Y-m-d') : '') }}" required>
                @error('posted_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="title">
                <label for="title">タイトル</label><input type="text" id="title" name="title" value="{{ old('title', isset($article) ? $article->title : '') }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="article_contents">
                <label for="article_contents">本文</label><textarea id="article_contents" cols="60" rows="5" name="article_contents" required>{{ old('article_contents', isset($article) ? $article->article_contents : '') }}</textarea>
                @error('article_contents')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="submit" value="{{ isset($article) ? '変更' : '新規登録' }}">
    </form>
</div>
@endsection