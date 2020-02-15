@extends('layouts.admin')
@section('title','أضافة فني جديد')
@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('tecnicals.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                
        <div class="form-group">
            <label for="">أسم الفني</label>
            <input type="text" name="name" id="" class="form-control">
        </div>
         
        <div class="form-group">
            <label for="">كلمة المرور</label>
            <input type="password" name="password" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">حالة الفني</label>
            <select name="status" id="" class="form-control">
                <option value="0">نشط</option>
                <option value="1">مغلق</option>
            </select>
        </div>
        
        <div class="form-group">
            <input type="submit" value="حفظ" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection