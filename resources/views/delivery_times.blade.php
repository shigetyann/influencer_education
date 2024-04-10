@extends('layouts.app')

@section('title', '配信日時設定')

@section('content')


<div class="time-container">
    <div>
        <button class="return" type="submit" onclick="location.href='{{ route('curriculums_list', ['id' => $curriculum->grade->id]) }}'">←戻る</button>
    </div>

    <div>
        <h1>配信日時設定</h1>
    </div>

    <div class="set-form">
        <form action="{{ route('times_set', ['id' => $curriculum->id]) }}" method="post" enctype="multipart/form-data">        
            @csrf
            @method('PUT')
            <div class="time-set">
                <table id="tbl" class="set-table">
                        <tr>
                            <th>{{ $curriculum->title }}</th>
                            <th><input type="hidden" name="curriculums_id" value="{{ $curriculum->id }}"></th>
                        </tr>
                        <tr>
                        @if ($delivery_time)
                            <td><input type="text" name="delivery_from" value="{{ old('delivery_from', ($delivery_time ? ($delivery_time->delivery_from ? $delivery_time->delivery_from->format('Y-m-d') : '') : '') }}" placeholder="年月日"></td>
                            <td><input type="text" name="delivery_from_time" value="{{ old('delivery_from_time', ($delivery_time ? ($delivery_time->delivery_from ? $delivery_time->delivery_from->format('H:i') : '') : '') }}" placeholder="日時"></td>
                            @if ($errors->has('delivery_from'))
                                <p class="error">{{ $errors->first('delivery_from') }}</p>
                            @endif
                            <td>～</td>
                            <td><input type="text" name="delivery_to" value="{{ old('delivery_to', ($delivery_time ? ($delivery_time->delivery_to ? $delivery_time->delivery_to->format('Y-m-d') : '') : '') }}" placeholder="年月日"></td>
                            <td><input type="text" name="delivery_to_time" value="{{ old('delivery_to_time', ($delivery_time ? ($delivery_time->delivery_to ? $delivery_time->delivery_to->format('H:i') : '') : '') }}" placeholder="日時"></td>
                            @if ($errors->has('delivery_to'))
                                <p class="error">{{ $errors->first('delivery_to') }}</p>
                            @endif
                        @else
                            <td><input type="text" name="delivery_from" placeholder="年月日" value="{{ old('delivery_from' }}"></td>
                            <td><input type="text" name="delivery_from_time" placeholder="日時" value="{{ old('delivery_from' }}"></td>
                            @if ($errors->has('delivery_from'))
                                <p class="error">{{ $errors->first('delivery_from') }}</p>
                            @endif
                            <td>～</td>
                            <td><input type="text" name="delivery_to" placeholder="年月日" value="{{ old('delivery_to' }}"></td>
                            <td><input type="text" name="delivery_to_time" placeholder="日時" value="{{ old('delivery_to' }}"></td>
                            @if ($errors->has('delivery_to'))
                                <p class="error">{{ $errors->first('delivery_to') }}</p>
                            @endif
                        @endif
                            <td class="mark"><button class="subtruct" type="button" value="ー" onclick="del(this)">ー</button></td>
                        </tr>
                        <tr></tr>
                </table>
                        <div class="mark">
                            <button class="add" type="button" value="✛" onclick="add()">✛</button>
                        </div>

                        <div class="time-submit">
                            <button class="time-btn" type="submit" value="登録">登録</button>
                        </div>
            </div>
        </form>
    </div>
</div>

@endsection