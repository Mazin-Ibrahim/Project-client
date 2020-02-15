@extends('layouts.admin')
@section('title','عرض المستخدمين')
@section('content')


 <div class="row">
       <div class="col-md-8 col-md-offset-1" style="direction: rtl">
          
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>أسم المستخدم</th>
                     <th>حالة المستخدم</th>
                     <th>التحكم</th>
                 </tr>
             </thead>
             <tbody>
         @foreach($users as $key => $user)
                 <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->staut()}}</td>
                 <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">تحرير</a></td>
                 <td><form action="{{route('users.destroy',$user->id)}}" method="POST">
                    <input type="submit" value="حذف" class="btn btn-danger">
                    {{csrf_field()}}
                   {{method_field('DELETE')}}
                 </form></td>
                 </tr>
            @endforeach
             </tbody>
         </table>
        
         <div class="text-center">
            {{$users->links()}}
         </div>

          
         <div class="col-md-2">
           <a href="{{route('users.create')}}" class="btn btn-primary">أضافة مستخدم</a>
        </div>
         
      </div>
      </div>

@endsection