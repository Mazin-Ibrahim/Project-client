@extends('layouts.admin')
@section('title','جميع المناطق')

@section('content')


 <div class="row">
       <div class="col-md-10 col-md-offset-1" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم المنطقه</th>
                     <th>ملاحظه</th>
                     <th>التحكم</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($areas as $key => $area)
                 <tr>
                 <td>{{$key+1}}</td>
                     <td>{{$area->name}}</td>
                     <td>{{str_limit($area->note,20)}}</td>
                     @if(auth()->user()->hasPermission('edit-area'))
                 <td>
                     <a href="{{route('areas.edit',$area->id)}}" class="btn btn-primary">تحرير</a>

                </td>
                @endif
                @if(auth()->user()->hasPermission('delete-area'))
                <td><a href="{{route('areas.show',$area->id)}}" class="btn btn-info">عرض</a></td>
                <td><form action="{{route('areas.destroy',$area->id)}}" method="POST">
                    <input type="submit" value="حذف" class="btn btn-danger">
                    {{csrf_field()}}
                   {{method_field('DELETE')}}
                 </form></td>
                 @endif
                 
                 </tr> 
            @endforeach
             </tbody>
         </table>
         <div class="text-center">
            {{$areas->links()}}
         </div>

         @if(auth()->user()->hasPermission('create-area')) 
        <div class="col-md-2">
          <a href="{{route('areas.create')}}" class="btn btn-primary">أضافة منطقه</a>
       </div>
        @endif

        {{-- @if(Session::has('success'))
            <div class="alert alert-success">
            {{Session::get('success')}}
            </div>
            {{Session::forget('success')}}
         @endif --}}


      </div>
      </div>

@endsection