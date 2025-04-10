<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $flight = Flight::find($id);
        return view('flights.book', ['flight' => $flight]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $flight = Flight::find($request->flight_id);
        // dd($flight);
        $ticket = new Ticket();
        $ticket->flight_id = $flight->id;
        $ticket->passanger_name = $request->passanger_name;
        $ticket->passanger_phone = $request->passanger_phone;
        $ticket->seat_number = $request->seat_number;
        $ticket->save();
        return redirect()->route('flights.index')->with('success', 'New ticket has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::find($id);
        $tickets = Ticket::where('flight_id', $id)->paginate();
        // dd($tickets);
        return view('flights.ticket', ['flight' => $flight, 'tickets' => $tickets]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->is_boarding = true;
        $ticket->boarding_time = now();
        $ticket->save();
        return redirect()->back()->with('success', 'Passanger is set to board.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->back()->with('success', 'Passanger deleted!');
    }
}
