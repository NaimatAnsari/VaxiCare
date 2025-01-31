<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('bookings')
            ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
            ->join('hospitals as h', 'bookings.hospital_id', '=', 'h.id')
            ->select('bookings.*', 'c.name as child_name', 'h.name as hospital_name')
            ->get();
    
        return view('user.Appointment', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.bookappointment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Appointment::create($request->all());
        return redirect()->route('appointment.index');   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $users = Appointment::findOrFail($id); // Appointment ka record fetch karo
    return view('user.updateAppointment', compact('users')); // View ko pass karo
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $bookAppoint)
    {
        $bookAppoint->update($request->all());
        return view('user.hospital');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::find($id)->delete();
    }
}
