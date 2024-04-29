@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}"><h4>←戻る</h4></a>
    <table id="newstable">
        <thead>
            <th>投稿日時</th>
            <th>タイトル</th>
            <th>記事</th>
        </thead>
        <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年m月d日') }}</td>
            <td><a href="{{ route('notice_list', $article->id) }}">{{ Str::limit($article->title,20) }}</a></td>
            <td>{{ Str::limit($article -> article_contents,50)}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
