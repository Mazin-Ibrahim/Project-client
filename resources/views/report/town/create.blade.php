@extends('layouts.admin')
@section('title','أستعلام|عملاء')

@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
         
    <form action="{{route('getClientTown')}}" method="POST">
          {{csrf_field()}}
            <div class="form-group">
                <label for="">أدخل أسم الحي</label>
                <select name="town_id" id="" class="form-control">
                    @foreach($towns as $town)
                       <option value="{{$town->id}}">{{$town->name}}</option>
                    @endforeach
                </select>
            </div>

           

            <div class="form-group">
                <input type="submit" value="أستعلام" class="btn btn-info">
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <a href="{{route('ControlReport')}}" class="btn btn-primary">رجوع</a>
     </div>
</div>

      

@endsection