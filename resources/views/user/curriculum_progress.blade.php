@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home') }}"><h4>←戻る</h4></a>
    <div class="mb-3">
        <img src="{{ asset($user->profile_image) }}" alt="プロフィール画像" class="profile_image" width="100px" height="100px">
        <h4>{{ $user->name }}さんの授業進捗</h4>
        <h4>{{ $user->grade->name }}</h4>
    </div>
    <div class="grade-container">
        @foreach ($grades as $grade)
            <div class="curriculum-container">
                <p>{{ $grade->name }}</p>
                @if (isset($curriculumsByGrade[$grade->id]))
                    @foreach ($curriculumsByGrade[$grade->id] as $curriculum)
                        <div class="curriculum-title">
                            @if (in_array($curriculum->id, $progressStatus))
                                <h6 class='curriculum-clear'>受講済み</h6>
                                <a>{{ $curriculum->title }}</a>
                            @else
                                <p>{{ $curriculum->title }}</p>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>この学年にはカリキュラムがありません。</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
