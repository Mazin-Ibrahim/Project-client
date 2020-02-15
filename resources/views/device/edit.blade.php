@extends('layouts.admin')
@section('title','تعديل بيانات الجهاز')
@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('devices.update',$device->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                
        <div class="form-group">
            <label for="">أسم الجهاز</label>
        <input type="text" name="name" id="" class="form-control" value="{{$device->name}}">
        </div>

        
        <div class="form-group">
            <input type="submit" value="تحرير" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection