<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        body {
            font-family: 'XB Riyaz' ;
            font-size: 18px;

        }
        .table {
          width: 100%;
    margin-bottom: 1rem;
    color: #212529;
  }
  .table th{

  }
  .table th,
  .table td {
     padding: 0.75rem;
     vertical-align: top;
     border-bottom: 1px solid #dee2e6;
  }
  
  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }
  
  .table tbody + tbody {
    border-top: 2px solid #dee2e6;
  }
  
  .center{
        text-align: center;
  }
  .mt20{
      margin-top: -20px;
  }

    </style>

    <title>Document</title>
</head>
<body>
    

 
  
    
       <div class="col-md-11 " style="direction: rtl">
        
        
          
         <table class="table">
           <caption>جميع العملاء على حسب المنطقة</caption>
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
                     <th>تاريخ الصيانة</th>
                     {{-- <th>ملاحظه</th> --}}
                     <th>رقم الهاتف</th>
                     <th>حالة الحساب</th>
                     {{-- <th class="text-center">التحكم</th> --}}
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
                     {{-- <td>{{str_limit($client->note,15)}}</td> --}}
                     <td>{{$client->phone1}}</td>
                     <td>{{$client->ch()}}</td>
    
                 {{-- <td>
                     <a href="{{route('clients.edit',$client->id)}}" class="btn btn-primary">تحرير</a> 
                </td>
                <td><a href="{{route('clients.show',$client->id)}}" class="btn btn-primary">عرض</a></td>
                <td><form action="{{route('clients.destroy',$client->id)}}" method="POST">
                    <input type="submit" value="حذف" class="btn btn-danger">
                    {{csrf_field()}}
                   {{method_field('DELETE')}}
                 </form></td> --}}
                 </tr>
            @endforeach
             </tbody>
         </table>


</body>
</html>