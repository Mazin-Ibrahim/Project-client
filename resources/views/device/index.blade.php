@extends('layouts.admin')
@section('title','عرض جميع الاجهزه')

@section('content')


 <div class="row">
       <div class="col-md-8 col-md-offset-1" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم الجهاز</th>
                     <th>التحكم</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($devices as $key => $device)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$device->name}}</td>
                     @if(auth()->user()->hasPermission('edit-device'))
                 <td>
                     <a href="{{route('devices.edit',$device->id)}}" class="btn btn-primary">تحرير</a>
    
                </td>
                @endif
                @if(auth()->user()->hasPermission('delete-device'))
                <td>
                    <form action="{{route('devices.destroy',$device->id)}}" method="POST">
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
            {{$devices->links()}}
         </div>

         @if(auth()->user()->hasPermission('create-device')) 
         <div class="col-md-2">
           <a href="{{route('devices.create')}}" class="btn btn-primary">أضافة  جهاز</a>
        </div>
         @endif

      </div>
      </div>

@endsection