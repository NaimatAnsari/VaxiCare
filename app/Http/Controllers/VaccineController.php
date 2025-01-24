<?php

namespace App\Http\Controllers;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function edit(Vaccine $vaccine)
    {
        return view('admin.edit-vaccine', compact('vaccine'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Vaccine $vaccine)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $picturePath = $vaccine->image; // Retain old image by default
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Delete old image if exists
        if ($vaccine->image) {
            Storage::disk('public')->delete($vaccine->image);
        }

        // Store new image
        $picturePath = $request->file('image')->store('vaccines', 'public');
    }

    // Update vaccine data
    $vaccine->update([
        'vaccine_name' => $request->vaccine_name,
        'description' => $request->description,
        'availability_status' => $request->availability_status,
        'image' => $picturePath,
    ]);

    // Redirect to the vaccine list page
    return redirect()->route('vaccine.index')->with('success', 'Vaccine updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $vaccine = Vaccine::findOrFail($id);

        // Check if the user has a picture and delete it from storage
        if ($vaccine->image) {
            Storage::disk('public')->delete($vaccine->image);
        }

        // Delete the user
        $vaccine->delete();

        // Redirect to the users list with success message
        return redirect()->route('vaccine.index');
    }
}
