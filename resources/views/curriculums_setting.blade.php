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
                    <img class="img" src="{{ asset('storage/'.$curriculum->thumbnail) }}">
                @endif
                    <input type="file" name="thumbnail" id="thumbnail">
            
            <table class="curriculum-set">
                <tr>
                    <th>学年</th> 
                    <td>
                        <select id="grade_id" name="grade_id">
                            @foreach($grades as $grade)
                            <option value="{{$grade->id}}" {{$curriculum && $curriculum->grade_id == $grade->id ? 'selected' : ''}}>{{$grade->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>授業名</th>
                    <td>
                    <input type="text" id="title" name="title" value="{{ old('title', $curriculum ? $curriculum->title : '') }}">
                    @if ($errors->has('title'))
                        <p class="error">{{ $errors->first('title') }}</p>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>動画URL</th>
                    <td>
                    <input type="url" id="video_url" name="video_url" value="{{ old('video_url', $curriculum ? $curriculum->video_url : '') }}">
                    @if ($errors->has('video_url'))
                        <p class="error">{{ $errors->first('video_url') }}</p>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>授業概要</th>
                    <td>
                        <textarea id="description" name="description">{{ old('description', $curriculum ? $curriculum->description : '') }}</textarea>
                        @if ($errors->has('description'))
                            <p class="error">{{ $errors->first('description') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="checkbox" id="alway_delivery_flg" name="alway_delivery_flg" {{ old('alway_delivery_flg', ($curriculum && $curriculum->alway_delivery_flg == 1)) ? 'checked' : '' }}>
                        <label>常時公開</label>
                        @if ($errors->has('alway_delivery_flg'))
                            <p class="error">{{ $errors->first('alway_delivery_flg') }}</p>
                        @endif
                    </td>
                </tr>
            </table>
            <div class="submit-btn">
                <button class="submit" type="submit">登録</button>
            </div>
        </form>
    </div>

@endsection