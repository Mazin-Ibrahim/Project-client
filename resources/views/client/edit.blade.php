@extends('layouts.admin')

@section('content')
@section('title','تعديل بيانات العميل')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('clients.update',$client->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                
        <div class="form-group">
            <label for="">أسم العميل</label>
        <input type="text" name="name" id="" class="form-control" value="{{$client->name}}">
        </div>

        <div class="form-group">
            <label for="">عنوان العميل</label>
        <textarea name="address" id="" cols="30" rows="10" class="form-control">{{$client->address}}</textarea>
        </div>

        <div class="form-group">
            <label for="">أسم المنطقه</label>
            <select name="area_id" id="" class="form-control">
            <option value="{{$client->area_id}}">{{$client->area->name}}</option>
            <option value="">-----------------</option>
                @foreach($areas as $area)
            <option value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">أسم الحي</label>
            <select name="town_id" id="" class="form-control"> 
            <option value="{{$client->town_id}}">{{$client->town->name}}</option> 
            </select>
        </div>

        <div class="form-group">
            <label for="">نوع الجهاز</label>
            <select name="device_id" id="" class="form-control">
            <option value="{{$client->device_id}}">{{$client->device->name}}</option>
            <option value="">------------------</option>
                @foreach($devices as $device)
            <option value="{{$device->id}}">{{$device->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for=""> الكود</label>
            <input type="text" name="code" id="" class="form-control" value="{{$client->code}}">
        </div>

        
        <div class="form-group">
            <label for=""> رقم الهاتف:1</label>
        <input type="text" name="phone1" id="" class="form-control" value="{{$client->phone1}}">
        </div>


        <div class="form-group">
            <label for=""> رقم الهاتف:2</label>
        <input type="text" name="phone2" id="" class="form-control" value="{{$client->phone2}}">
        </div>

        <div class="form-group">
            <label for=""> رقم الهاتف:3</label>
        <input type="text" name="phone3" id="" class="form-control" value="{{$client->phone3}}">
        </div>

        <div class="form-group">
            <label for="">فترة الصيانه</label>
        <input type="text" name="days" id="" class="form-control" value="{{$client->days}}">
        </div>

        
        <div class="form-group">
            <label for="">حالة العميل</label>
            <select name="ch" id="" class="form-control">
                <option value="{{$client->ch}}">{{$client->ch()}}</option>
                <option value="">----------</option>
                <option value="1">شغال</option>
                <option value="2">معطل</option>
            </select>
        </div>


        <div class="form-group">
            <label for="">ملاحظه</label>
        <textarea name="note" id="" cols="30" rows="10" class="form-control">{{$client->note}}</textarea>
        </div>




        
        
        <div class="form-group">
            <input type="submit" value="تحرير" class="btn btn-info">
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









