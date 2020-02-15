@extends('layouts.admin')

@section('content')
@section('title','معالجة البلاغ')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('notices.update',$notice->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
       

        <div class="form-group">
            <label for="">توجيه الادارة</label>
        <textarea name="Manage_direc" id="" cols="30" rows="10" class="form-control">{{$notice->Manage_direc}}</textarea>
        </div>

        <div class="form-group">
            <label for="">تاريخ المعالجة</label>
            <input type="date" name="pro_date" id="" class="form-control" value="{{$notice->pro_date}}">
        </div>

        
        <div class="form-group">
            <label for="">حالة البلاغ</label>
            <select name="status" id="" class="form-control">
                <option value="{{$notice->status}}" selected></option>
                <option value="1">تم</option>
                <option value="2">لم يتم</option>
            </select>
        </div>


        
        <div class="form-group">
            <input type="submit" value="معالجة" class="btn btn-info">
        </div>
  </form>
    </div>
</div>


@endsection












