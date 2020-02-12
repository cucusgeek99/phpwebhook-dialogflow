<?php
   
namespace App\Http\Controllers;
   
use App\Booking;
use Illuminate\Http\Request;
use Redirect;
use PDF;
   
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bookings'] = Booking::orderBy('id','desc')->paginate(10);
   
        return view('List',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Create');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookhour' => 'required',
            'bookdate' => 'required',
            'booknb' => 'required',
        ]);
   
        Booking::create($request->all());
    
        return Redirect::to('bookings')
       ->with('success','Greate! Booking created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['booking_info'] = booking::where($where)->first();
 
        return view('Edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bookhour' => 'required',
            'bookdate' => 'required',
            'booknb' => 'required',
        ]);
         
        $update = ['bookhour' => $request->book-hour, 'booknb' => $request->book-nb];
        booking::where('id',$id)->update($update);
   
        return Redirect::to('bookings')
       ->with('success','Great! booking updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::where('id',$id)->delete();
   
        return Redirect::to('bookings')->with('success','Booking deleted successfully');
    }
     
}