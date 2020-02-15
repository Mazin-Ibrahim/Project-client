@extends('layouts.admin')
@section('title','تعديل بيانات المستخدم')
@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('users.update',$user->id)}}" dir="rtl" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                
        <div class="form-group">
            <label for="">أسم المستخدم</label>
        <input type="text" name="name" id="" class="form-control" value="{{$user->name}}">
        </div>
 
        <div class="form-group">
            <label for="">حالة المستخدم</label>
            <select name="status" id="" class="form-control">
                <option value="{{$user->status}}" selected></option>
                <option value="0">نشط</option>
                <option value="1">مغلق</option> 
            </select>
        </div>
        
        
        {{-- <table class="table">
            <thead>
                <tr>
                    @foreach($permissions as $permission)
                     <th>{{$permission->display_name}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    @foreach($permissions as $permission)
                     <td>
                        
                     <input type="checkbox" name="check[]" id="" value="{{$permission->id}}" {{$user->hasPermission($permission->name) ? 'checked' : ''}}><h4></h4>
                         
                     </td>
                    @endforeach
                </tr>
                
            </tbody>
        </table> --}}

        <div class="col-md-8 col-md-offset-2">
            <div class="card-body">
                    <ul class="list-group">
                    <hr>
                    <li class="list-group-item"><h3>صلاحيات المستخدمين</h3></li>
                    <hr>
                    @foreach($permissions as $permission)
                    <li class="list-group-item" style="background-color:#f2e9e9;">
                        {{$permission->display_name}}   <input type="checkbox" name="check[]" id="" value="{{$permission->id}}" {{$user->hasPermission($permission->name) ? 'checked' : ''}}>
                        </li><h4></h4>
                    @endforeach
                    </ul>

                   <hr>
                <div class="form-group">
                    <input type="submit" value="تحرير" class="btn btn-info">
                </div>
                
            </div>
        </div>
        
  </form>
    </div>
</div>



@endsection