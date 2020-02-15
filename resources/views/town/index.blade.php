@extends('layouts.admin')
@section('title','عرض الاحياء')
@section('content')

 
 <towns></towns>

 @if(auth()->user()->hasPermission('create-town')) 
 <div class="col-md-2">
   <a href="{{route('towns.create')}}" class="btn btn-primary">أضافة حي</a>
</div>
 @endif
@endsection