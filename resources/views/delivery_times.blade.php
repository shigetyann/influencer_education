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
                        </tr>
                        <tr>
                            <td><input type="text" name="delivery_from" value="{{ $delivery_time->delivery_from->format('Y-m-d') }}" placeholder="年月日"></td>
                            <td><input type="text" name="delivery_from" value="{{ $delivery_time->delivery_from->format('H:i') }}" placeholder="日時"></td>
                            <td>～</td>
                            <td><input type="text" name="delivery_to" value="{{ $delivery_time->delivery_to->format('Y-m-d') }}" placeholder="年月日"></td>
                            <td><input type="text" name="delivery_to" value="{{ $delivery_time->delivery_to->format('H:i') }}" placeholder="日時"></td>
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