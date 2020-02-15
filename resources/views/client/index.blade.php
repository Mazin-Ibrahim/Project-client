@extends('layouts.admin')
@section('title','عرض العملاء')

@section('content')


 <div class="row">
    
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <div class="col-md-4">
                    <th>عددالحسابات النشطه {{$clientsCountTurnOn}}</th>
                    </div>
                    <div class="col-md-4">
                    <th>عددالحسابات المعطله {{$clientsCountTurnOf}}</th>
                    </div>
                    <div class="col-md-4">
                    <th>عددالحسابات {{$clientsCount}}</th>
                    </div>
                </tr>
            </thead>
        </table>
    </div>
</div>
   
       <div class="row" style="direction: rtl">
         
        
        
          <clients></clients>
         
        <div class="text-center">
            @if($clients->count() > 0)
          <a href="{{route('allClientPrint')}}" class="btn btn-success">طباعة</a>
            @endif
          {{-- {{$clients->links()}} --}}
        </div>

        @if(auth()->user()->hasPermission('create-client')) 
        <div class="col-md-2">
          <a href="{{route('clients.create')}}" class="btn btn-primary">أضافة عميل</a>
       </div>
        @endif


      </div>
     

@endsection