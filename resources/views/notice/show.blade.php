@extends('layouts.admin')
@section('title','عرض بلاغ')

@section('content')
 

        <div class="row" style="direction: rtl">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-body">
                    <h3>التفاصيل</h3>
                        <ul class="list-group">
                        <li class="list-group-item">  أسم العميل:     {{$notice->client->name ?? ''}}</li>
                        <li class="list-group-item"> كود العميل :     {{$notice->client->code ?? ''}}</li>
                        <li class="list-group-item"> تاريخ البلاغ  :     {{$notice->date}}</li>
                        <li class="list-group-item">  حالة البلاغ :     {{$notice->status()}}</li>
                        <li class="list-group-item">   تاريخ المعالجه :     {{$notice->pro_date}}</li>
                        </ul>

                        <hr>
                         <h4>محتوى البلاغ</h4>
                    <textarea readonly cols="30" rows="10" class="form-control">{{$notice->content}}</textarea>
                      
                       <hr>

                       <hr>
                         <h4>توجيه الاداره</h4>
                    <textarea readonly cols="30" rows="10" class="form-control">{{$notice->Manage_direc}}</textarea>
                      
                       <hr>

        

                    <a href="{{route('notices.index')}}" class="btn btn-info">رجوع</a>
                </div>
            </div>
        </div>

@endsection