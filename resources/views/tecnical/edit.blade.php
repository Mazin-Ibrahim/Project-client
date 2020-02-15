@extends('layouts.admin')
@section('title','تعديل بيانات الفني')
@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('tecnicals.update',$tecnical->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                
        <div class="form-group">
            <label for="">أسم الفني</label>
        <input type="text" name="name" id="" class="form-control" value="{{$tecnical->name}}">
        </div>
 
        <div class="form-group">
            <label for="">حالة الفني</label>
            <select name="status" id="" class="form-control">
                <option value="{{$tecnical->status}}" selected></option>
                <option value="0">نشط</option>
                <option value="1">مغلق</option>
            </select>
        </div>
        
        <div class="form-group">
            <input type="submit" value="تحرير" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection