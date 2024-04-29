@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}"><h4>←戻る</h4></a>
    <div class="heading"><h2>パスワード変更</h2></div>
    <form method="POST" action="{{ route('updatePassword')}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="old_password" class="form-label">旧パスワード</label>
            <input type="password" class="form-control" id="old_password" name="old_password" required>
            @error('old_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">新パスワード</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
            @error('new_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="confirmation_password" class="form-label">新パスワード確認</label>
            <input type="password" class="form-control" id="confirmation_password" name="confirmation_password" required>
            @error('confirmation_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="登録">
        </div>
    </form>
</div>
@endsection
