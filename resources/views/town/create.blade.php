@extends('layouts.admin')
@section('title','أضافة حي')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('towns.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                
        <div class="form-group">
            <label for="">أسم الحي</label>
            <input type="text" name="name" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">أسم المنطقه</label>
            <select name="area_id" id="" class="form-control">
                @foreach($areas as $area)
            <option value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">ملاحظه</label>
            <textarea name="note" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        
        
        <div class="form-group">
            <input type="submit" value="حفظ" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection