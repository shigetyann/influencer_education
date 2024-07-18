@extends('layouts.listLayout')
@section('title', 'ユーザー_時間割画面')

@section('scripts')
     
@endsection

@section('content')

   
                <!-- データ -->
                <div class="links" id="educationtable">
                    <table>
                        <tbody>
                        @foreach ($curriculums as $curriculum)
                            <tr>
                            <!-- ↓curriculumsの方 -->
                                <td>{{ $curriculum->title }}</td>
                                <td>{{ $curriculum->classes_id }}</td>
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