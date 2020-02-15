@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('ClientMains.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}

          
        <div class="form-group">
            <label for="">أسم العميل</label>
            <select name="client_id" class="form-control" id="">
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>      
        
        <div class="form-group">
            <label for="">تاريخ الصيانه</label>
            <input type="date" name="date" id="" class="form-control">
        </div>  
        
        <div class="form-group">
            <label for="">حالة الصيانة</label>
            <textarea name="status" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="">نوع الصيانة</label>
            <select name="maintenance_id" class="form-control" id="">
                @foreach($maintenances as $maintenance)
               <option value="{{$maintenance->id}}">{{$maintenance->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">ملاحظة</label>
            <textarea name="note" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

        
        <div class="form-group">
            <label for="">قيمة الصيانة</label>
            <input type="number" name="amm" id="" class="form-control">
        </div> 

        <div class="form-group">
            <label for="">تخفيض  قيمة الصيانة</label>
            <input type="number" name="disc_amm" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">أسم الفني</label>
            <select name="tecnical_id" id="" class="form-control"> 
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
            <input type="submit" value="حفظ" class="btn btn-info">
        </div>
  </form>
    </div>
</div>


@endsection











