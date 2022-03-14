<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\User;
use Illuminate\Http\Request;

class SproviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "ooi";
     //   return view ('ServiceProvider.SProvider_Profile');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*  $sp = User::findorFail($id);
        return view('ServiceProvider.Sprovider_profile')->with($id); */

        $sprov = User::where('name', $id)->first();
        $sprov_id = $sprov->id;

      //  $serrviceProvider = User::findorFail($sprov_id)->where('utype','CST')->get();

          // get customer that booking in this service provider
       $get_customer = Booking::where('sprovider_id', $sprov_id)->get();
       // return $get_customer;
       
       return view('ServiceProvider.Sprovider_profile',compact('get_customer', 'sprov'));

    // $get_Cst_belongsto_Svp = Booking::findorFail();

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

      // get all Service Provider to admin page show
  /*  public function getserviceprovider()
    {
     // $getallSProvider = User::wher('utype', "SVP")->get();
     return view('AdminPages.All_Service_Providers');
    } */
}
