@extends('Layout')
   
@section('content')
  <a href="{{ route('bookings.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>hour</th>
                 <th>date</th>
                 <th>nb</th>
                 <th>Created at</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($bookings as $booking)
              <tr>
                 <td>{{ $booking->id }}</td>
                 <td>{{ $booking->bookhour }}</td>
                 <td>{{ $booking->bookdate }}</td>
                 <td>{{ $booking->booknb }}</td>
                 <td>{{ date('Y-m-d', strtotime($booking->created_at)) }}</td>
                 <td><a href="{{ route('bookings.edit',$booking->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('bookings.destroy', $booking->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $bookings->links() !!}
       </div> 
   </div>
 @endsection  