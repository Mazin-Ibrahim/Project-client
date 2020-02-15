@extends('layouts.admin')
@section('title','تعديل المنطقه')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('areas.update',$area->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                
        <div class="form-group">
            <label for="">أسم المنطقه</label>
        <input type="text" name="name" id="" class="form-control" value="{{$area->name}}">
        </div>

        <div class="form-group">
            <label for="">ملاحظه</label>
        <textarea name="note" id="" cols="30" rows="10" class="form-control">{{$area->note}}</textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" value="تحرير" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection