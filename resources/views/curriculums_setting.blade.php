@extends('layouts.app')

@section('title', '授業設定')

@section('content')
<div>
    @if($curriculum && $curriculum->grade)
        <button class="return" type="submit" onclick="location.href='{{ route('curriculums_list', ['id' => $curriculum->grade->id]) }}'">←戻る</button>
    @endif
</div>

<div>
        <h1>授業設定</h1>
    </div>

    <div>
    <form action="{{ $curriculum ? route('curriculums_edit', ['id' => $curriculum->id]) : '#' }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                @if($curriculum && $curriculum->thumbnail)
                    <img src="{{ asset('storage/'.$curriculum->thumbnail) }}">
                @endif
                    <input type="file" name="thumbnail" id="thumbnail">
            
            <table class="curriculum-set">
                <tr>
                    <th>学年</th> 
                    <td>
                        <select id="grade_id" name="grade_id">
                            @foreach($grades as $grade)
                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>授業名</th>
                    <td>
                    <input type="text" id="title" name="title" value="{{ $curriculum ? $curriculum->title : '' }}">
                    </td>
                </tr>
                <tr>
                    <th>動画URL</th>
                    <td>
                    <input type="url" id="video_url" name="video_url" value="{{ $curriculum ? $curriculum->video_url : '' }}">
                    </td>
                </tr>
                <tr>
                    <th>授業概要</th>
                    <td>
                        <textarea id="description" name="description">{{ $curriculum ? $curriculum->description : '' }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="checkbox" id="alway_delivery_flg" name="alway_delivery_flg" {{ $curriculum && $curriculum->alway_delivery_flg == 1 ? 'checked' : '' }}>
                        <label>常時公開</label>
                    </td>
                </tr>
            </table>
            <div class="submit-btn">
                <button class="submit" type="submit">登録</button>
            </div>
        </form>
    </div>

@endsection