<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Children;
use App\Models\Vaccine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Current logged-in user
        $user = Auth::user();
    
        // If the user is a parent, show only their appointments
        if ($user->role === 'Parent') {
            $users = DB::table('bookings')
                ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
                ->join('users as h', 'bookings.hospital_id', '=', 'h.id')
                ->join('vaccines as v', 'bookings.vaccine_type', '=', 'v.id')
                ->join('users as p', 'bookings.parent_id', '=', 'p.id')
                ->select('bookings.*', 'c.name as child_name', 'h.fullname as h_name', 'v.vaccine_name as vaccine_name', 'p.fullname as parent_name')
                ->where('bookings.parent_id', $user->id) // ✅ Parent sirf apni appointments dekh sake
                ->get();
        } 
        // If the user is a hospital, show only their received appointments
        elseif ($user->role === 'Hospital') {
            $users = DB::table('bookings')
                ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
                ->join('users as h', 'bookings.hospital_id', '=', 'h.id')
                ->join('vaccines as v', 'bookings.vaccine_type', '=', 'v.id')
                ->join('users as p', 'bookings.parent_id', '=', 'p.id')
                ->select('bookings.*', 'c.name as child_name', 'h.fullname as h_name', 'v.vaccine_name as vaccine_name', 'p.fullname as parent_name')
                ->where('bookings.hospital_id', $user->id) // ✅ Hospital sirf apni received requests dekh sake
                ->get();
        } 
        else {
            return abort(403, 'Unauthorized Access'); // ✅ Agar koi aur user hai, access deny
        }
    
        return view('user.Appointment', compact('users'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $child = Children::where('parent_id', Auth::user()->id)->get();
        //     $hospital = User::where('role','Hospital')->get();
        //     $vaccine = Vaccine::where('availability_status','Available')->get();


        // return view('user.bookappointment',["child"=>$child , "hospital"=>$hospital , "vaccines"=>$vaccine]);
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
    public function update(Request $request, $id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = $request->status;
    $appointment->save();

    // Hospital user hone par hospital page par redirect kare
    if (Auth::user()->role === 'Hospital') {
        return redirect()->back()->with('success', 'Appointment status updated!');

    }

    return redirect()->route('appointment.index')->with('success', 'Appointment status updated!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appointment::find($id)->delete();
    }
}
