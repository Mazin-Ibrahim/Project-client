@extends('layouts.admin')
@section('title','تعديل نوع الصيانة')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('maintenances.update',$maintenance->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                
        <div class="form-group">
            <label for="">نوع الصيانه</label>
            <input type="text" name="name" id="" class="form-control" value="{{$maintenance->name}}">
        </div>

        <div class="form-group">
            <label for="">المبلغ</label>
        <input type="number" name="amm" id="" class="form-control" value="{{$maintenance->amm}}">
        </div>
        
        <div class="form-group">
        <input type="submit" value="تحرير" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection