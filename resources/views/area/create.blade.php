@extends('layouts.admin')
@section('title','أضافة منطقه')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('areas.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                
        <div class="form-group">
            <label for="">أسم المنطقه</label>
            <input type="text" name="name" id="" class="form-control">
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