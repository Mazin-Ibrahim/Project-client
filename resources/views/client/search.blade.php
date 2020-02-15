@extends('layouts.admin')
@section('title','عرض عميل')

@section('content')


 <div class="row">
    <div class="col-md-4">
       <div class="col-md-11 " style="direction: rtl">
        
        
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم العميل</th>
                     <th> كود العميل</th>
                     <th>منطقة السكن</th>
                     <th>الحي</th>
                     <th>العنوان</th>
                     <th>نوع الجهاز</th>
                     <th>فترة الصيانه</th>
                     <th>تاريخ التركيب</th>
                     <th>ملاحظه</th>
                     <th>رقم الهاتف</th>
                     <th>حالة الحساب</th>
                     <th class="text-center">التحكم</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($clients as $key => $client)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$client->name}}</td>
                     <td>{{$client->code}}</td>
                     <td>{{$client->area->name}}</td>
                     <td>{{$client->town->name}}</td>
                     <td>{{str_limit($client->address,15)}}</td>
                     <td>{{$client->device->name}}</td>
                     <td>{{$client->days}} يوم</td>
                     <td>{{$client->date}}</td>
                     <td>{{str_limit($client->note,15)}}</td>
                     <td>{{$client->phone1}}</td>
                     <td>{{$client->ch()}}</td>
    
                 <td>
                     <a href="{{route('clients.edit',$client->id)}}" class="btn btn-primary">تحرير</a> 
                </td>
                <td><a href="{{route('clients.show',$client->id)}}" class="btn btn-primary">عرض</a></td>
                <td><form action="{{route('clients.destroy',$client->id)}}" method="POST">
                    <input type="submit" value="حذف" class="btn btn-danger">
                    {{csrf_field()}}
                   {{method_field('DELETE')}}
                 </form></td>
                 </tr>
            @endforeach
             </tbody>
         </table>
         <div class="text-center">
            <a href="{{route('clients.index')}}" class="btn btn-info">رجوع</a>
            {{$clients->links()}}
         </div>


      </div>
      </div>

@endsection