@extends('layouts.admin')
@section('title','أضافة  مستخدم')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('users.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                
        <div class="form-group">
            <label for="">أسم المستخدم</label>
            <input type="text" name="name" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">كلمة المرور</label>
            <input type="password" name="password" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">تأكيد كلمة المرور</label>

            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" value="حفظ" class="btn btn-info">
        </div>
  </form>
    </div>
</div>

      

@endsection