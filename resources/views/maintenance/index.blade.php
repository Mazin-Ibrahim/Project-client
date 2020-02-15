@extends('layouts.admin')
@section('title','عرض أنوع الصيانة')

@section('content')


 <div class="row">
       <div class="col-md-8 col-md-offset-1" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>نوع الصيانه</th>
                     <th>المبلغ</th>
                     <th>التحكم</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($maintenances as $key => $maintenance)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$maintenance->name}}</td>
                     <td>{{$maintenance->amm}} جنيه</td>
                     @if(auth()->user()->hasPermission('edit-maintenance'))
                 <td>
                     <a href="{{route('maintenances.edit',$maintenance->id)}}" class="btn btn-primary">تحرير</a>
                     
                    </td>
                    @endif
                    @if(auth()->user()->hasPermission('delete-maintenance'))
                    <td>
                        <form action="{{route('maintenances.destroy',$maintenance->id)}}" method="POST">
                            <input type="submit" value="حذف" class="btn btn-danger">
                            {{csrf_field()}}
                           {{method_field('DELETE')}}
                         </form>
                    </td>
                    @endif
                 </tr>
            @endforeach
             </tbody>
         </table>

         <div class="text-center">
            {{$maintenances->links()}}
         </div>

         @if(auth()->user()->hasPermission('create-maintenance')) 
         <div class="col-md-2">
           <a href="{{route('maintenances.create')}}" class="btn btn-primary">أضافة نوع صيانة</a>
        </div>
         @endif
      </div>
      </div>

@endsection