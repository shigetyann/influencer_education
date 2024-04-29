@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <a href="{{ route('articles_admin')}}" class="btn btn-success btn-sm mx-1">管理者側記事一覧</a>
                    <a href="{{ route('user_notice')}}" class="btn btn-primary btn-sm mx-1">ユーザー側記事一覧</a>
                    <a href="{{ route('profile')}}" class="btn btn-secondary btn-sm mx-1">ユーザープロフィール</a>
                    <a href="{{ route('curriculumProgress')}}" class="btn btn-info btn-sm mx-1">ユーザー進捗</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection