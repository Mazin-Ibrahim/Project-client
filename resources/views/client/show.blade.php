@extends('layouts.admin')
@section('title','عرض عميل')

@section('content')


        <div class="row" style="direction: rtl">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-body">
                    <h3>التفاصيل</h3>
                        <ul class="list-group">
                        <li class="list-group-item"> أسم العميل:     {{$client->name}}</li>
                        <li class="list-group-item">  كود العميل:     {{$client->code}}</li>
                        <li class="list-group-item">  منطقة السكن :     {{$client->area->name}}</li>
                        <li class="list-group-item">   الحي :     {{$client->town->name}}</li>
                        <li class="list-group-item">   نوع الجهاز :     {{$client->device->name}}</li>
                        <li class="list-group-item">    رقم الهاتف 1 :     {{$client->phone1}}</li>
                        <li class="list-group-item">    رقم الهاتف 2 :     {{$client->phone2}}</li>
                        <li class="list-group-item">     رقم الهاتف 3 :     {{$client->phone3}}</li>
                        <li class="list-group-item">    فترة الصيانه:    {{$client->days}} يوم</li>
                        <li class="list-group-item">    تاريخ الصيانه :    {{$client->date}} يوم</li>
                        <li class="list-group-item">     العميل:    {{$client->ch()}}</li>
                        </ul>

                        <hr>
                        <h4>العنوان</h4>
                    <textarea readonly cols="30" rows="10" class="form-control">{{$client->address}}</textarea>
                      
                       <hr>
                       <h4>ملاحظه</h4>
                       <textarea readonly cols="30" rows="10" class="form-control">{{$client->note}}</textarea>
                       <hr>

                    <a href="{{route('clients.index')}}" class="btn btn-info">رجوع</a>
                </div>
            </div>
        </div>

@endsection