@extends('layouts.admin')
@section('title','أضافة عميل')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('clients.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                
        <div class="form-group">
            <label for="">أسم العميل</label>
            <input type="text" name="name" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">كلمة المرور</label>
            <input type="password" name="password" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">عنوان العميل</label>
            <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
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
            <label for="">أسم الحي</label>
            <select name="town_id" id="" class="form-control">  
            </select>
        </div>

        <div class="form-group">
            <label for="">نوع الجهاز</label>
            <select name="device_id" id="" class="form-control">
                @foreach($devices as $device)
            <option value="{{$device->id}}">{{$device->name}}</option>
                @endforeach
            </select>
        </div>

        
        <div class="form-group">
            <label for=""> رقم الهاتف:1</label>
            <input type="text" name="phone1" id="" class="form-control">
        </div>


        <div class="form-group">
            <label for=""> رقم الهاتف:2</label>
            <input type="text" name="phone2" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for=""> رقم الهاتف:3</label>
            <input type="text" name="phone3" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">فترة الصيانه</label>
            <input type="text" name="days" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">تاريخ الصيانة</label>
            <input type="date" name="date" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">حالة العميل </label>
            <select name="ch" id="" class="form-control">
                <option value="1">شغال</option>
                <option value="2">معطل</option>
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

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
        $('select[name="area_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/getTown/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="town_id"]').empty();
                        $.each(data, function(key, value) {
                            
                            $('select[name="town_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="town_id"]').empty();
            }
        });
    });
</script>
@endsection









