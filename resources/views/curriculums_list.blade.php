@extends('layouts.app')

@section('title', '授業一覧')

@section('content')

<div id="grade-container" >
    <div>
        <button type="submit">←戻る</button>
    </div>
    <div>
        <h1>授業一覧</h1>
    </div>
    <div>
        <button onclick="location.href='{{ route('curriculums_setting') }}'">新規登録</button>
    </div>
    <div>
        <h1 class="grade-head">{{ $grade->name }}</h1>
    </div>

    <div class="container" >
    
        <div class="grade">
            @foreach($grades as $grade)
            <button class="grade-link" data-grade-id="{{ $grade->id }}">{{ $grade->name }}</button>
            @endforeach
        </div>

        <div class="table-container" id="curriculums-container">
            @foreach($curriculums as $curriculum)
                <div class="table">
                    <table>
                        <tr>
                            <th><img class="img" src="{{ asset('storage/'.$curriculum->thumbnail) }}"></th>
                        </tr>
                        <tr>
                            <th colspan="2">{{ $curriculum->title }}</th>
                        </tr>
                        <tr>
                            <th></th>
                        </tr>
                        @foreach($curriculum->deliveryTime as $deliveryTime)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($deliveryTime->delivery_from)->format('Y年m月d日 H:i') }}〜{{ \Carbon\Carbon::parse($deliveryTime->delivery_to)->format('H:i') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="edit" colspan="2">
                                <button class="edit-button" onclick="location.href='{{ route('curriculums_setting', ['id' => $curriculum->id]) }}'">授業内容編集</button>
                                <button class="edit-button" onclick="location.href='{{ route('delivery_times', ['id' => $curriculum->id]) }}'">配信日時編集</button>
                            </td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection