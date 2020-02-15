@extends('layouts.admin')
@section('title','عرض البلاغات')

@section('content')


 <div class="row">
       <div class="col-md-11 col-md-offset-1" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم العميل</th>
                     <th>كود العميل</th>
                     <th>تاريخ البلاغ</th>
                     <th>محتوى البلاغ</th>
                     <th>حالة البلاغ</th>
                     <th>توجيه الادارة</th>
                     <th>تاريخ المعالجة</th>
                     
                 </tr>
             </thead>
             <tbody>
         @foreach($notices as $key => $notice)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$notice->client->name ?? ''}}</td>
                     <td>{{$notice->client->code ?? ''}}</td>
                     <td>{{$notice->date}}</td>
                     <td>{{str_limit($notice->content,10)}}</td>
                     <td>{{$notice->status()}}</td>
                     <td>{{str_limit($notice->Manage_direc,10)}}</td>
                     <td>{{$notice->pro_date}}</td>
                     @if(auth()->user()->hasPermission('edit-notice'))
                 <td>
                     <a href="{{route('notices.edit',$notice->id)}}" class="btn btn-primary">معالجة</a>
    
                </td>
                @endif
                @if(auth()->user()->hasPermission('show-notice'))
                <td>
                    <a href="{{route('notices.show',$notice->id)}}" class="btn btn-info">عرض</a>
   
               </td>
               @endif
                @if(auth()->user()->hasPermission('delete-notice'))
                <td>
                    <form action="{{route('notices.destroy',$notice->id)}}" method="POST">
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
            {{-- {{$notices->links()}} --}}
         </div>
         @if(auth()->user()->hasPermission('create-notice')) 
         <div class="col-md-2">
            <a href="{{route('notices.create')}}" class="btn btn-primary">أضافة بلاغ</a>
         </div>
         @endif

      </div>
      </div>

@endsection 