@extends('layouts.listLayout')
@section('title', 'ユーザー_時間割画面')

@section('scripts')
     
@endsection

@section('content')



   
                <!-- データ -->
                <div class="links" id="educationtable">
                    <table class="table table-hover" id = "fav-table">
                        <thead>
                            <tr>
                                <!-- <th>ID</th>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>メーカー名</th>
                                <th></th>
                                <th></th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($curriculums as $curriculum)
                            <tr>
                                <!-- ↓curriculumsの方 -->
                                <td>{{ $curriculum->title }}</td>
                                <!-- <td>{{ $curriculum->classes_id }}</td> -->
                                <!-- ↓delivery_timesの方 -->
                                <td>{{ $curriculum->delivery_from }}</td>
                                <td>{{ $curriculum->delivery_to }}</td>
                                
                            <!-- 詳細ボタン -->


                                
                                <!-- 詳細ボタン -->
                            <!-- <td>
                                <form class="form-inline" action="{{ route('grade', $curriculum->id) }}" method="POST">
                                @csrf
                                <div class="grade">
                                    <input type="submit" value="{{ $grades->name }}" class="btn btn-info">

                                </div>
                                </form>

                            </td>
                             -->
                           
                            
                                                        
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between pt-3">
                     <a href="{{ route('curriculum') }}" class="btn btn-outline-secondary" role="button">
                        <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('戻る') }}
                     </a>
            
                </div>
               
       

@endsection