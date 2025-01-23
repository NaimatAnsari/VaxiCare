<?php

namespace App\Http\Controllers;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('admin.vaccine' , compact('vaccines'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-vaccine');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $picturePath = null ;
        if ($request->hasFile('image')) {
            $picturePath = $request->file('image')->store('vaccines', 'public');
        }

        Vaccine::create([
            'vaccine_name' => $request->vaccine_name,
            'description' => $request->description,
            'availability_status' => $request->	availability_status,
            'image' => $picturePath,
        ]);

        return view('admin.vaccine');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
