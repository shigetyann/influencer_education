@extends('layouts.app')

@section('content')
<div class="notice">
    <a href="{{ route('user_notice') }}"><h4>←戻る</h4></a>
    <div class="articleContents">
        <p class="date">{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年m月d日') }}</p>
        <h3 class="title">{{ $article -> title }}</h3>
        <p class="contents">{{ $article -> article_contents }}</p>
    </div>
</div>
@endsection
