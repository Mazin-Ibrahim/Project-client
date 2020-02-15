@extends('layouts.admin')
@section('title','عرض منطقه')

@section('content')


        <div class="row" style="direction: rtl">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-body">
                    <h2>تفاصيل المنطقه</h2>
                        <ul class="list-group">
                       <h3> <li class="list-group-item"> أسم المنطقه:     {{$area->name}}</li></h3>
                        <hr>
                        <li class="list-group-item"><h3>الاحياء التي تتبع للمنطقه:</h3></li>
                        @foreach($towns as $town)
                        <li class="list-group-item">{{$town->name}}</li>
                        @endforeach
                        </ul>

                       <hr>

                    <a href="{{route('areas.index')}}" class="btn btn-info">رجوع</a>
                </div>
            </div>
        </div>

@endsection