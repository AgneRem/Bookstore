<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Http\Request;
use App\Mail\ReservationConfirmed;
use App\Mail\ReservationAdmin;
use Illuminate\Support\Facades\Mail;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservations = Reservation::all();
      return view('admin.reservation.index', compact('reservations'));
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

      public function store(StoreReservationRequest $request){

        $reservation = new Reservation();
        $reservation->user_id = $request->user()->id;
        $reservation->title = $request->title;
        $reservation->save();
        Mail::to($request->user())->send(new ReservationConfirmed($reservation));

        return redirect('/')->with(['message'=>'Your reservation was successful! Please notice that we keep it for 2 days, if you need it for longer time, please contact us']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
      $reservation->delete();
      return redirect('admin/reservations')->with(['message'=>'Reservation is deleted']);
    }
}
