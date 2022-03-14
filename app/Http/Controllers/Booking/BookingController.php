<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingNow;
use App\Models\Booking;
use App\Models\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingNow $request)
    {
        

      //  try {
         
       
        $validated = $request->validated();

       $booking = new Booking();
        $booking->customer_name = $request->customer_name;
        $booking->customer_email = $request->customer_email;
        $booking->customer_phone = $request->customer_phone;
        $booking->cst_province_id  = $request->cst_province_id; 
        $booking->sprovider_id  = $request->serviceprovider_id;
        $booking->category_id = $request->category_id;
        $booking->subcategory_id = $request->subcategory_id;
        $booking->booking_date = $request->booking_date;
        $booking->save();

       // toastr()->success('Category Updated Successfully');
        // return route('book_show'.$request->serviceprovider_name);
        return view('Pages.Book_Success');

      
   /* } catch (\Exception $ex) {
        
        return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
    } */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $province = Province::all();

        $usr = User::where('name',$id)->first();   // For Service providr to get
        $user_id = $usr->id;                       // For Service providr to get
        
        $users =  User::findorfail($user_id);      // For Service providr to get
        
            
     //   $user_CST = User::where('utype', 'CST')->get();
       
        return view('Pages.Booking',compact('users', 'province', ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
