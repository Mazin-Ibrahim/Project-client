@extends('layouts.admin')
@section('title','التحكم')

@section('content')


 <div class="row">

       <div class="col-md-10 col-md-offset-1" style="direction: rtl">
          
        <div class="text-center">
            
            <br><br>
        </div>
        <div class="text-center">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{route('tecnicals.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$tecnicals}}</span>
                    </div>
                    <div class="desc"> الفنيين </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{route('devices.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$devices}}</span>
                    </div>
                    <div class="desc">الاجهزه </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 bule" href="{{route('maintenances.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$maintenances}}</span>
                    </div>
                    <div class="desc">أنواع الصيانات</div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{route('areas.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$areas}}</span>
                    </div>
                    <div class="desc"> المناطق </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="{{route('towns.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$towns}}</span>
                    </div>
                    <div class="desc"> الاحياء</div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 " href="{{route('clients.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$clients}}</span>
                    </div>
                    <div class="desc"> العملاء</div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 dark" href="{{route('ClientMains.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549">{{$cms}}</span>
                    </div>
                    <div class="desc"> صيانات العملاء</div>
                </div>
            </a>
        </div>

        </div>

      </div>
      </div>

@endsection