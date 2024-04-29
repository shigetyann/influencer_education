@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}"><h4>←戻る</h4></a>
    <div class="heading"><h2>プロフィール変更</h2></div>
    <form method="POST" action="{{ route('updateProfile')}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
        <img src="{{ asset($user->profile_image) }}" alt="プロフィール画像" class="profile_image" width="100px" height="100px">
            <label for="profile_image" class="form-label">プロフィール画像</label>
            <div class="custom-file-upload">
                <input id="profile_image" type="file" name="profile_image" class="form-control">
                <label for="profile_image" class="custom-file-label">ファイルを選択</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="user_name" class="form-label">ユーザーネーム</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="user_kana" class="form-label">カナ</label>
            <input type="text" class="form-control" id="name_kana" name="name_kana" value="{{ $user->name_kana }}" required>
        </div>
        <div class="mb-3">
            <label for="user_address" class="form-label">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <a href="{{ route('updatePassword') }}"><h4>パスワード変更</h4></a>
        </div>

        <input type="submit" value="登録">
    </form>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
@endsection
