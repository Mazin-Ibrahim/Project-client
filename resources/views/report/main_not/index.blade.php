@extends('layouts.admin')
@section('title','عرض صيانات العملاء')
@section('content')


 <div class="row">
       <div class="col-md-12" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>تاريخ الصيانة</th>
                     <th>كود العميل</th>
                     <th>ملاحظة</th>
                     <th>نوع الصيانة</th>
                     <th>قيمة الصيانة</th>
                     <th>خصم</th>
                     <th>الصافي</th>
                     <th>عملية الصيانة</th>
                     <th>أسم الفني</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($cms as $key => $cm)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$cm->date}}</td>
                     <td>{{$cm->code}}</td>
                     <td>{{$cm->status}}</td>
                     <td>{{$cm->maintenance->name ?? ''}}</td>
                     <td>{{$cm->amm}}</td>
                     <td>{{$cm->disc_amm}}</td>
                     <td>{{$cm->end_cost}}</td>
                     <td>{{$cm->done()}}</td>
                     <td>{{$cm->tecnical->name ?? ''}}</td>
                
                 <td>
                     <a href="{{route('ClientMains.edit',$cm->id)}}" class="btn btn-primary">تحرير</a>
                     
                </td>
                <td><a href="{{route('ClientMains.show',$cm->id)}}" class="btn btn-primary">عرض</a></td>
                <td><form action="{{route('ClientMains.destroy',$cm->id)}}" method="POST">
                    <input type="submit" value="حذف" class="btn btn-danger">
                    {{csrf_field()}}
                   {{method_field('DELETE')}}
                 </form></td>
                 </tr>
            @endforeach
             </tbody>
         </table>
         <div class="text-center">
            <a href="{{route('ControlReport')}}" class="btn btn-info">رجوع</a>
              @if($cms->count() > 0)
              <a href="{{route('byMainNotPrint')}}" class="btn btn-success">طباعة</a>
              @endif
            
         </div>

      </div>
      </div>

@endsection