@extends('Layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Booking</a></h2>
<br>
 
<form action="{{ route('Bookings.store') }}" method="POST" name="add_Booking">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>bookhour</strong>
            <input type="text" name="bookhour" class="form-control" placeholder="Enter bookhour">
            <span class="text-danger">{{ $errors->first('bookhour') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Booking date</strong>
            <input type="text" name="bookdate" class="form-control" placeholder="Enter Booking Code">
            <span class="text-danger">{{ $errors->first('bookdate') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>booknb</strong>
            <textarea class="form-control" col="4" name="booknb" placeholder="Enter booknb"></textarea>
            <span class="text-danger">{{ $errors->first('booknb') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection