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
                                                    @foreach ($deliveryTimes as $deliveryTime)
                                                        <div class="class-item">
                                                            <h4>{{ $deliveryTime->title }}</h4>
                                                            <p>{{ $deliveryTime->delivery_from->format('Y年n月j日') }} ~ {{ $deliveryTime->delivery_to->format('Y年n月j日') }}</p>
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
                        @foreach ($curriculums as $curriculum)
                            <tr>
                                <!-- ↓curriculumsの方 -->
                                <td>{{ $curriculum->title }}</td>
                                <!-- <td>{{ $curriculum->classes_id }}</td> -->


                                <td>{{ $curriculum->grade->name }}</td> <!-- gradeのnameを表示 -->
                                <!-- ↓delivery_timesの方 -->

                                <td>{{ $curriculum->delivery_from }}</td>
                                <td>{{ $curriculum->delivery_to }}</td>
                                
                       

                                             




                            
                                                        
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