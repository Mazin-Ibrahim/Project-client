@extends('layouts.admin')
@section('title','تعديل صيانة عميل')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('ClientMains.update',$cm->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
        
        <div class="form-group">
            <label for="">تاريخ الصيانه</label>
            <input type="date" name="date" id="" class="form-control" value="{{$cm->date}}">
        </div>  
        
        <div class="form-group">
            <label for="">ملاحظة الصيانة</label>
        <textarea name="status" class="form-control" id="" cols="30" rows="10">{{$cm->status}}</textarea>
        </div>

        <div class="form-group">
            <label for="">نوع الصيانة</label>
            <select name="maintenance_id" class="form-control" id="">
            <option value="{{$cm->maintenance_id}}" selected></option>
                @foreach($maintenances as $maintenance)
               <option value="{{$maintenance->id}}">{{$maintenance->name}}</option>
                @endforeach
            </select>
        </div>

        
        <div class="form-group">
            <label for="">قيمة الصيانة</label>
        <input type="number" name="amm" id="" class="form-control" value="{{$cm->amm}}">
        </div> 

        <div class="form-group">
            <label for=""> خصم</label>
        <input type="number" name="disc_amm" id="" class="form-control" value="{{$cm->disc_amm}}">
        </div>

        

        <div class="form-group">
            <label for="">أسم الفني</label>
            <select name="tecnical_id" id="" class="form-control"> 
                <option value="{{$cm->tecnical_id}}" selected></option>
                @foreach($tecnicals as $tecnical)
                <option value="{{$tecnical->id}}">{{$tecnical->name}}</option>
                 @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">عملية الصيانة</label>
            <select name="done" id="" class="form-control">
                <option value="1">مؤجلة</option>
                <option value="2">تمت</option>
            </select>
        </div>

        
        <div class="form-group">
            <input type="submit" value="تحرير" class="btn btn-info">
        </div>
  </form>
    </div>
</div>


@endsection











