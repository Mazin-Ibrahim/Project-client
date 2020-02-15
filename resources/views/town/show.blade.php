@extends('layouts.admin')
@section('title','عرض حي')
@section('content')


        <div class="row" style="direction: rtl">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-body">
                    <h3>التفاصيل</h3>
                        <ul class="list-group">
                        <li class="list-group-item"> أسم الحي:     {{$town->name}}</li>
                        <li class="list-group-item"> أسم المنطقه التي يتبع لها الحي:     {{$town->area->name}}</li>
                        </ul>

                        <hr>
                         <h4>ملاحظه</h4>
                    <textarea readonly cols="30" rows="10" class="form-control">{{$town->note}}</textarea>
                      
                       <hr>

                    <a href="{{route('towns.index')}}" class="btn btn-info">رجوع</a>
                </div>
            </div>
        </div>

@endsection