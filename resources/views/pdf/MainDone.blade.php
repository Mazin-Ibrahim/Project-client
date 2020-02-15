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
    

 
 <div class="row">
    <div class="col-md-12" style="direction: rtl">
       
      <table class="table">
        <caption class="">تقرير عن صايانات العملاء التي تمت</caption>
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
              </tr>
         @endforeach
          </tbody>
      </table>
      

   </div>
   </div>


</body>
</html>