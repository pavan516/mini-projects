<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use DB;
use Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking');
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'message' => 'required',
            'ordertype' => 'required'
        ]);

        //create Post
        $booking = new Booking;
        $booking->name = $request->input('name');
        $booking->email = $request->input('email');
        $booking->contactno = $request->input('contactno');
        $booking->message = $request->input('message');
        $booking->ordertype = $request->input('ordertype');
        $booking->save();
        
        Mail::send('mail',['name','vikram'],function($message){
            $message->to('en.pavankumar@gmail.com','To Pavan');
            $message->subject('Test Email');
            $message->from('en.pavankumar@gmail.com','bitfumes');
        });

        return redirect('/booking')->with('success','Thanks For Booking! - Our Team Member Will Contact You Very Soon!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $post = booking::find($id);
        $post->delete();
        return redirect('/bookingposts')->with('success','Successfully Deleted Order!');
    }
}
