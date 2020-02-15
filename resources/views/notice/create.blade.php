@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
                  
<form action="{{route('notices.store')}}" dir="rtl" method="POST">
                    {{csrf_field()}}

          
        <div class="form-group">
            <label for="">أسم العميل</label>
            <select name="client_id" class="form-control" id="">
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>      
        
        <div class="form-group">
            <label for="">تاريخ البلاغ</label>
            <input type="date" name="date" id="" class="form-control">
        </div>  
        
        <div class="form-group">
            <label for="">محتوى البلاغ</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

        
        
        
        <div class="form-group">
            <input type="submit" value="حفظ" class="btn btn-info">
        </div>
  </form>
    </div>
</div>


@endsection











