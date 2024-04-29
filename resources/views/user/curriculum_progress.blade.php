@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}"><h4>←戻る</h4></a>
    <div class="mb-3">
        <img src="{{ asset($user->profile_image) }}" alt="プロフィール画像" class="profile_image" width="100px" height="100px">
        <h4>{{ $user->name }}さんの授業進捗</h4>
        <h4>現在の学年：{{ $user->grade->name }}</h4>
    </div>
    @foreach ($grades as $grade)
        <p>学年名: {{ $grade->name }}</p>
        @foreach ($curriculums as $curriculum)
            <p>授業名: {{ $curriculum->title }}</p>
            @if ($isProgress)
                <p>受講済み</p>
            @else
                <p>未受講</p>
            @endif
        @endforeach
    @endforeach
</div>
@endsection
