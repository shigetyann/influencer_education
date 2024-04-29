@extends('layouts.app')
@section('content')
<div class="newslist">
    <a href="{{ route('home') }}"><h4>←戻る</h4></a>
    <div class="title"><h2>お知らせ一覧</h2></div>
    <a href="{{ route('articles_admin_create')}}" class="btn btn-success btn-sm mx-1 register-button">新規登録</a>
    <table id="newstable">
        <thead>
            <th>投稿日時</th>
            <th>タイトル</th>
            <th>操作</th>
        </thead>
        <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年m月d日') }}</td>
            <td>{{ $article -> title }}</td>
            <td>
                <a href="{{ route('articles_admin_edit', $article->id) }}" class="btn btn-primary btn-sm mx-1">編集</a>
                <button type="button" class="btn btn-danger btn-sm mx-1 delete-button" data-toggle="modal" data-target="#deleteModal{{ $article->id }}">削除</button>
            </td>
        </tr>

        <div class="modal fade" id="deleteModal{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">お知らせの削除</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        本当にこのお知らせを削除しますか？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                        <form action="{{ route('articles_admin_destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">はい</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        </tbody>
    </table>
</div>

@endsection
