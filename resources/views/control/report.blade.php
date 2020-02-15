@extends('layouts.admin')
@section('title','التقارير')


@section('content')


 <div class="row">

       <div class="col-md-10 col-md-offset-1" style="direction: rtl">
          
        <div class="text-center">
            
            <br><br>
        </div>
        <div class="text-center">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{route('repoetDate')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549"></span>
                    </div>
                    <div class="desc"> صيانات الفتره </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{route('showMainDone')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549"></span>
                    </div>
                    <div class="desc"> صيانات الفتره التي تمت </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{route('showMainNot')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549"></span>
                    </div>
                    <div class="desc"> صيانات الفتره التي  لم تتم </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="{{route('showClientTown')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549"></span>
                    </div>
                    <div class="desc">العملاء حسب الحي </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 bule" href="{{route('showClientArea')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549"></span>
                    </div>
                    <div class="desc">العملاء حسب المنطقه</div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 dark" href="{{route('clients.index')}}">
                <div class="visual">
                    
                </div>
                <div class="details">
                    <div class="number">
                    <span data-counter="counterup" data-value="549"></span>
                    </div>
                    <div class="desc"> جميع العملاء </div>
                </div>
            </a>
        </div>

        </div>

      </div>
      </div>

@endsection