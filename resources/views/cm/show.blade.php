@extends('layouts.admin')
@section('title','عرض صيانة عميل')

@section('content')
 

        <div class="row" style="direction: rtl">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-body">
                    <h3>التفاصيل</h3>
                        <ul class="list-group">
                        <li class="list-group-item"> تاريخ التركيب:     {{$cm->date}}</li>
                        <li class="list-group-item"> أسم العميل :     {{$cm->client->name}}</li>
                        <li class="list-group-item"> كود العميل :     {{$cm->code}}</li>
                        <li class="list-group-item"> نوع الصيانة:     {{$cm->maintenance->name ?? ''}}</li>
                        <li class="list-group-item"> قيمة الصيانة :     {{$cm->amm}}</li>
                        <li class="list-group-item"> الخصم  :     {{$cm->disc_amm}}</li>
                        <li class="list-group-item"> الصافي  :     {{$cm->end_cost}}</li>
                        <li class="list-group-item"> عملية الصيانة  :     {{$cm->done()}}</li>
                        <li class="list-group-item"> أسم الفني :     {{$cm->tecnical->name ?? ''}}</li>
                        </ul>

                        <hr>
                         <h4>ملاحظة</h4>
                    <textarea readonly cols="30" rows="10" class="form-control">{{$cm->status}}</textarea>
                      
                       <hr>

                    <a href="{{route('ClientMains.index')}}" class="btn btn-info">رجوع</a>
                </div>
            </div>
        </div>

@endsection