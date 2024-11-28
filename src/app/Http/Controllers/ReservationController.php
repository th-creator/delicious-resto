<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $reservations = Reservation::with('user')->get();

        return view('reservations.all', compact('reservations'));
    }

    public function index()
    {
        $reservations = Reservation::where('user_id',auth()->id())->get();

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new reservation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = $request->validate([
            'name' => 'required',
            'num_person' => 'required',
            'phone' => 'required',
            'time' => 'required',
        ]);
        Log::alert($request->name);
        $reservation['state'] = 0;
        $reservation['user_id'] = auth()->id();
        Reservation::create($reservation);

        return redirect()->route('reservations.index')
                        ->with('success','Reservation created successfully.');
    }

    /**
     * Display the specified reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit',compact('reservation'));
    }

    /**
     * Update the specified reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'num_person' => 'required',
            'phone' => 'required',
            'user_id' => 'required',
            'time' => 'required',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')
                        ->with('success','Reservation updated successfully');
    }
    public function toggle(Request $request,$id)
    {
        $data = $request->validate([
            'state' => 'required',
        ]);
        
        Reservation::where('id',$id)->update($data);
        Log::alert($id);

        return redirect('all/reservations')
                        ->with('success','Reservation updated successfully');
    }

    /**
     * Remove the specified reservation from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        if (auth()->user()->role == 'user') {
            return redirect()->route('reservations.index')
                            ->with('success','Reservation deleted successfully');
        } else {
            return redirect('all/reservations')
                            ->with('success','Reservation deleted successfully');
        }
    }
}
