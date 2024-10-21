@extends('layouts.listLayout')
@section('title', 'ユーザー_時間割画面')

@section('scripts')
     
@endsection

@section('content')


                                        <!-- 20241015② -->
                                    <div class="month-navigation">
                                        <!-- 前月リンク -->
                                        <a href="{{ route('schedule', ['month' => \Carbon\Carbon::parse($currentMonth)->subMonth()->format('Y-m')]) }}">◀︎</a>
                                        <!-- 現在の月表示 -->
                                        {{ \Carbon\Carbon::parse($currentMonth)->format('Y年n月') }}
                                        <!-- 翌月リンク -->
                                        <a href="{{ route('schedule', ['month' => \Carbon\Carbon::parse($currentMonth)->addMonth()->format('Y-m')]) }}">▶︎</a>
                                    </div>
        
                                    <div class="schedule">
                                        @foreach ($delivery_times as $delivery_time)
                                       
                                    
                                       
                                            <div class="class-item">
                                                
                                                <p>{{ $delivery_time->delivery_from instanceof \Carbon\Carbon ? $delivery_time->
                                                    delivery_from->format('Y年m月d日') : \Carbon\Carbon::parse($delivery_time->delivery_from)->
                                                    format('Y年m月d日') }}</p>
                                                <p>{{ $delivery_time->delivery_to instanceof \Carbon\Carbon ? $delivery_time->
                                                    delivery_to->format('Y年m月d日') : \Carbon\Carbon::parse($delivery_time->delivery_to)->
                                                    format('Y年m月d日') }}</p>



                                            
                                            
                                            </div>
                                        @endforeach
                                    </div>

                          
                           
                            
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
                       
                       


                        @if(isset($grade) && is_object($grade))
                         <h1>{{ $grade->name }}のカリキュラム</h1>
                        @elseif(isset($grade) && is_iterable($grade))
                            @foreach($grade as $g)
                                <h1>{{ $g->name }}のカリキュラム</h1>
                            @endforeach
                        @endif




                        @foreach ($curriculums as $curriculum)
                            <div>
                                <!-- ↓curriculumsの方 -->
                                <h2>{{ $curriculum->title }}</h2>

                                
                                 <!-- <td>
                                    {{ $curriculum->grade->name }}             
                                 </td>

                                <td>{{ $curriculum->classes_id }}</td> -->

                                <td>
                                <!-- <td>{{ $curriculum->grade->name }}</td> gradeのnameを表示 -->
                                <!-- <a href="{{ route('grade', $curriculum->classes_id) }}" class="btn btn-primary btn-sm">{{ $curriculum->grade->name }}</a> -->
                                
                                </td>
                                <!-- ↓delivery_timesの方 -->

                                <p>配信期間： {{ $curriculum->delivery_from }} -
                                {{ $curriculum->delivery_to }}
                                </p>
                            </div>

                            
                            
                                                        
                            
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