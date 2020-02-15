@extends('layouts.admin')
@section('title','أستعلام|عملاء')
@section('content')


<div class="row">
    <div class="col-md-8 col-md-offset-1">
         
    <form action="{{route('getMainNot')}}" method="POST">
          {{csrf_field()}}
            <div class="form-group">
              <label for="">من تاريخ</label>
              <input type="date" name="from" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">الى تاريخ</label>
                <input type="date" name="to" id="" class="form-control">
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