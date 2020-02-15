@extends('layouts.admin')
@section('title','عرض الفنيين')
@section('content')


 <div class="row">
       <div class="col-md-8 col-md-offset-1" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم الفني</th>
                     <th>حالة الفني</th>
                     <th>التحكم</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($tecnicals as $key => $tecnical)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$tecnical->name}}</td>
                     <td>{{$tecnical->stauts()}}</td>
                     @if(auth()->user()->hasPermission('edit-tecnical'))
                 <td><a href="{{route('tecnicals.edit',$tecnical->id)}}" class="btn btn-primary">تحرير</a></td>
                    @endif
                    @if(auth()->user()->hasPermission('delete-tecnical'))
                 <td><form action="{{route('tecnicals.destroy',$tecnical->id)}}" method="POST">
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
            {{$tecnicals->links()}}
         </div>

         @if(auth()->user()->hasPermission('create-tecnical')) 
         <div class="col-md-2">
           <a href="{{route('tecnicals.create')}}" class="btn btn-primary">أضافة فني</a>
        </div>
         @endif
      </div>
      </div>

@endsection